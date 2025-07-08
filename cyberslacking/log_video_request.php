<?php
// log_video_request.php - Logs video requests for security testing

header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405);
    echo json_encode(['error' => 'Method not allowed']);
    exit;
}

// Get JSON input
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!$data) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid JSON data']);
    exit;
}

// Add server-side information
$logEntry = [
    'timestamp' => date('Y-m-d H:i:s'),
    'client_timestamp' => $data['timestamp'] ?? null,
    'ip_address' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
    'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? 'unknown',
    'category' => $data['category'] ?? 'unknown',
    'video_id' => $data['videoId'] ?? 'unknown',
    'referrer' => $data['referrer'] ?? 'unknown',
    'request_uri' => $_SERVER['REQUEST_URI'] ?? 'unknown',
    'http_host' => $_SERVER['HTTP_HOST'] ?? 'unknown'
];

// Create logs directory if it doesn't exist
$logDir = 'logs';
if (!is_dir($logDir)) {
    mkdir($logDir, 0755, true);
}

// Log to file
$logFile = $logDir . '/video_requests_' . date('Y-m-d') . '.log';
$logLine = json_encode($logEntry) . "\n";

if (file_put_contents($logFile, $logLine, FILE_APPEND | LOCK_EX) !== false) {
    echo json_encode(['success' => true, 'message' => 'Request logged successfully']);
} else {
    http_response_code(500);
    echo json_encode(['error' => 'Failed to write to log file']);
}
?>
