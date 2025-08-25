<?php
// Security headers
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submitted_name = isset($_POST['name']) ? htmlspecialchars(trim($_POST['name'])) : '';
    $submitted_password = isset($_POST['password']) ? htmlspecialchars(trim($_POST['password'])) : '';

    if (!empty($submitted_name) && !empty($submitted_password)) {
        error_log("Phishing simulation: Name - {$submitted_name}");
        
        // For regular form submissions, redirect back with the data
        header('Location: /phishing/?name=' . urlencode($submitted_name) . '&password=' . urlencode($submitted_password));
        exit;
    } else {
        // For regular form submissions, redirect back with error
        header('Location: /phishing/?error=missing_fields');
        exit;
    }
}
?>