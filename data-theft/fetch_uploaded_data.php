<?php
header('Content-Type: application/json');

$applog = 'app.log';
$logger = fopen($applog, 'a');

function logMessage($message) {
    global $logger;
    $timestamp = date('Y-m-d H:i:s');
    fwrite($logger, $timestamp . ' - ' . $message . "\n");
}

$uploadsDir = __DIR__ . '/uploads';
if (!file_exists($uploadsDir)) {
    mkdir($uploadsDir, 0755, true);
    logMessage("Created uploads directory: $uploadsDir");
}

try {
    if (!isset($_GET['id'])) {
        throw new Exception('Missing ID parameter');
    }

    $id = preg_quote($_GET['id'], '/');
    logMessage("Processing request for ID: $id");
    $logFile = '/var/log/named/query.log';
    $log = file_get_contents($logFile);
    
    // Get entries from last 10 minutes
    $tenMinutesAgo = strtotime('-10 minutes');
    $recentLog = '';
    $lines = file($logFile);
    
    foreach ($lines as $line) {
        // Parse log timestamp - assumes format like "DD-Mon-YYYY HH:MM:SS.mmm"
        $logDate = strtotime(substr($line, 0, 20));
        if ($logDate >= $tenMinutesAgo) {
            $recentLog .= $line;
        }
    }
    
    if (!$recentLog) {
        echo json_encode(['success' => false, 'message' => 'No recent DNS queries found']);
        exit;
    }

    // Updated regex to match multiple data chunks
    preg_match_all('/queries: info: client @[^\s]+ [^#]+#\d+ \(' . $id . '\.(\d+)\.([a-z0-9\.]+)\.swgaudit\.com\): query: ' . $id . '\.\1\.\2\.swgaudit\.com IN [A].*/', $recentLog, $matches);

    logMessage("Found " . count($matches[1]) . " DNS query matches");
    
    // Create array of chunks with chunk numbers as keys to handle duplicates
    $tempChunks = array();
    for ($i = 0; $i < count($matches[1]); $i++) {
        $chunkNo = (int)$matches[1][$i];
        if (!isset($tempChunks[$chunkNo])) {
            $tempChunks[$chunkNo] = strtolower(str_replace('.', '', $matches[2][$i]));
            // logMessage("Processing chunk " . $chunkNo);
        } else {
            // logMessage("Discarding duplicate chunk " . $chunkNo);
        }
    }

    // Convert to final chunks array format
    $chunks = array();
    foreach ($tempChunks as $number => $data) {
        $chunks[] = array(
            'number' => $number,
            'data' => $data
        );
    }
    logMessage("Created " . count($chunks) . " unique data chunks");

    // First chunk (0) contains metadata
    $metadata = null;
    foreach ($chunks as $chunk) {
        if ($chunk['number'] === 0) {
            try {
                logMessage("Processing metadata chunk: " . json_encode($chunk, true));
                $metadataBase32 = $chunk['data'];
                $metadataStr = base32_decode($metadataBase32);
                logMessage("Decoded metadata string: " . $metadataStr);
                $metadata = json_decode($metadataStr, true);
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new Exception('JSON decode failed: ' . json_last_error_msg());
                }
                logMessage("Successfully parsed metadata: " . json_encode($metadata, true));
                break;
            } catch (Exception $e) {
                logMessage("Failed to process metadata: " . $e->getMessage());
                throw new Exception('Failed to process metadata: ' . $e->getMessage());
            }
        }
    }

    if (!$metadata || !isset($metadata['name'])) {
        logMessage("Invalid metadata. Chunks found: " . json_encode($chunks, true));
        throw new Exception('Invalid or missing metadata in chunks');
    }

    // Filter out metadata chunk and sort remaining chunks
    $dataChunks = array_filter($chunks, function($chunk) {
        return $chunk['number'] !== 0;
    });
    
    usort($dataChunks, function($a, $b) {
        return $a['number'] - $b['number'];
    });
    logMessage("Sorted " . count($dataChunks) . " data chunks");

    // Extract and combine data chunks
    $orderedData = array_map(function($chunk) {
        return $chunk['data'];
    }, $dataChunks);

    $combinedData = implode('', $orderedData);
    logMessage("Combined data length: " . strlen($combinedData));
    
    // Decode the base32 data
    $fileData = base32_decode($combinedData);
    
    // Generate safe filename
    $filename = preg_replace('/[^a-zA-Z0-9_.-]/', '_', $metadata['name']);
    $filepath = $uploadsDir . '/' . uniqid() . '_' . $filename;
    
    // Save the file
    if (file_put_contents($filepath, $fileData) === false) {
        logMessage("Failed to save file to: $filepath");
        throw new Exception('Failed to save file');
    }
    logMessage("Successfully saved file to: $filepath");
    
    // Generate public URL with full domain
    $fileUrl = 'https://data-theft.swgaudit.com/uploads/' . basename($filepath);
    logMessage("Generated public URL: $fileUrl");

    echo json_encode([
        'success' => true,
        'message' => 'File reconstructed successfully',
        'fileUrl' => $fileUrl,
        'filename' => $metadata['name'],
        'type' => $metadata['type']
    ]);

} catch (Exception $e) {
    logMessage("Error: " . $e->getMessage(), isset($idLogger) ? $idLogger : null);
    echo json_encode([
        'success' => false,
        'message' => 'Error processing data: ' . $e->getMessage()
    ]);
} finally {
    fclose($logger);
    if (isset($idLogger)) {
        fclose($idLogger);
    }
}

function base32_decode($input) {
    $input = strtoupper($input);
    $output = '';
    $v = 0;
    $vbits = 0;
    
    for ($i = 0; $i < strlen($input); $i++) {
        $v = ($v << 5) | strpos('ABCDEFGHIJKLMNOPQRSTUVWXYZ234567', $input[$i]);
        $vbits += 5;
        while ($vbits >= 8) {
            $output .= chr(($v >> ($vbits - 8)) & 255);
            $vbits -= 8;
        }
    }
    return $output;
}
?>