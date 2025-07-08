<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

// Handle preflight requests
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    exit(0);
}

// Custom base32 encoding function with lowercase characters
function base32Encode($data) {
    $alphabet = "abcdefghijklmnopqrstuvwxyz234567";
    $bytes = unpack('C*', $data);
    $result = "";
    $buffer = 0;
    $bitsLeft = 0;

    foreach ($bytes as $byte) {
        $buffer = ($buffer << 8) | $byte;
        $bitsLeft += 8;

        while ($bitsLeft >= 5) {
            $result .= $alphabet[($buffer >> ($bitsLeft - 5)) & 31];
            $bitsLeft -= 5;
        }
    }

    if ($bitsLeft > 0) {
        $result .= $alphabet[($buffer << (5 - $bitsLeft)) & 31];
    }

    return $result;
}

// Function to chunk encoded data
function chunkString($str, $size) {
    return str_split($str, $size);
}

// Function to simulate DNS tunneling requests
function simulateDNSTunneling($chunks, $filename) {
    $results = [];
    $totalChunks = count($chunks);
    
    foreach ($chunks as $index => $chunk) {
        // Simulate the DNS request to subdomain
        $subdomain = $chunk . '.swgaudit.com';
        $url = "https://{$subdomain}/exfiltrate?chunk={$index}&total={$totalChunks}&filename=" . urlencode($filename);
        
        // Log the simulated request
        $logEntry = [
            'timestamp' => date('Y-m-d H:i:s'),
            'chunk_index' => $index,
            'total_chunks' => $totalChunks,
            'subdomain' => $subdomain,
            'url' => $url,
            'chunk_size' => strlen($chunk),
            'filename' => $filename
        ];
        
        $results[] = $logEntry;
        
        // Simulate network delay
        usleep(100000); // 100ms delay
    }
    
    return $results;
}

// Handle file upload
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Check if file was uploaded
        if (!isset($_FILES['file']) || $_FILES['file']['error'] !== UPLOAD_ERR_OK) {
            throw new Exception('File upload failed');
        }

        $file = $_FILES['file'];
        $filename = $file['name'];
        $tmpName = $file['tmp_name'];
        $fileSize = $file['size'];

        // Validate file type
        $allowedTypes = ['pdf', 'jpg', 'jpeg', 'png', 'gif', 'txt', 'doc', 'docx'];
        $fileExtension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));
        
        if (!in_array($fileExtension, $allowedTypes)) {
            throw new Exception('Invalid file type. Supported types: .pdf, .img, .txt, .docx');
        }

        // Validate file size (max 10MB for simulation)
        if ($fileSize > 10 * 1024 * 1024) {
            throw new Exception('File too large. Maximum size is 10MB for simulation purposes.');
        }

        // Read file content
        $fileContent = file_get_contents($tmpName);
        if ($fileContent === false) {
            throw new Exception('Failed to read file content');
        }

        // Encode file using custom base32
        $encodedData = base32Encode($fileContent);

        // Create chunks for DNS tunneling (63 characters per chunk for DNS compatibility)
        $chunks = chunkString($encodedData, 63);

        // Simulate DNS tunneling
        $tunnelingResults = simulateDNSTunneling($chunks, $filename);

        // Create upload directory if it doesn't exist
        $uploadDir = 'uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        // Save file temporarily (will be deleted after 10 minutes)
        $savedFilename = uniqid() . '_' . $filename;
        $savedPath = $uploadDir . $savedFilename;
        
        if (!move_uploaded_file($tmpName, $savedPath)) {
            throw new Exception('Failed to save uploaded file');
        }

        // Schedule file deletion after 10 minutes
        $deleteTime = time() + (10 * 60); // 10 minutes from now
        $deleteScript = "<?php if (file_exists('$savedPath') && time() >= $deleteTime) { unlink('$savedPath'); } ?>";
        file_put_contents('delete_' . uniqid() . '.php', $deleteScript);

        // Log the simulation
        $logData = [
            'timestamp' => date('Y-m-d H:i:s'),
            'filename' => $filename,
            'file_size' => $fileSize,
            'encoded_size' => strlen($encodedData),
            'total_chunks' => count($chunks),
            'simulation_results' => $tunnelingResults,
            'saved_path' => $savedPath,
            'delete_time' => date('Y-m-d H:i:s', $deleteTime)
        ];

        $logFile = 'logs/simulation_' . date('Y-m-d') . '.log';
        if (!is_dir('logs')) {
            mkdir('logs', 0755, true);
        }
        file_put_contents($logFile, json_encode($logData) . "\n", FILE_APPEND | LOCK_EX);

        // Return success response
        echo json_encode([
            'success' => true,
            'message' => 'File processed successfully for DNS tunneling simulation',
            'data' => [
                'filename' => $filename,
                'file_size' => $fileSize,
                'encoded_size' => strlen($encodedData),
                'total_chunks' => count($chunks),
                'simulation_completed' => true,
                'delete_time' => date('Y-m-d H:i:s', $deleteTime)
            ]
        ]);

    } catch (Exception $e) {
        http_response_code(400);
        echo json_encode([
            'success' => false,
            'error' => $e->getMessage()
        ]);
    }
} else {
    // Handle GET request for exfiltration endpoint simulation
    $chunk = $_GET['chunk'] ?? '';
    $total = $_GET['total'] ?? '';
    $filename = $_GET['filename'] ?? '';
    
    // Log the simulated exfiltration request
    $logData = [
        'timestamp' => date('Y-m-d H:i:s'),
        'type' => 'dns_exfiltration_simulation',
        'chunk_index' => $chunk,
        'total_chunks' => $total,
        'filename' => $filename,
        'subdomain' => $_SERVER['HTTP_HOST'] ?? 'unknown',
        'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
        'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown'
    ];
    
    $logFile = 'logs/exfiltration_' . date('Y-m-d') . '.log';
    if (!is_dir('logs')) {
        mkdir('logs', 0755, true);
    }
    file_put_contents($logFile, json_encode($logData) . "\n", FILE_APPEND | LOCK_EX);
    
    // Return simulation response
    echo json_encode([
        'success' => true,
        'message' => 'DNS tunneling simulation request received',
        'chunk' => $chunk,
        'total' => $total,
        'filename' => $filename
    ]);
}

// Cleanup old delete scripts (optional maintenance)
$deleteFiles = glob('delete_*.php');
foreach ($deleteFiles as $deleteFile) {
    include $deleteFile;
    if (filemtime($deleteFile) < time() - 3600) { // Remove delete scripts older than 1 hour
        unlink($deleteFile);
    }
}
?>
