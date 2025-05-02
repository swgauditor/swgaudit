<?php

header('Content-Type: application/json');

$response = [];

if (isset($_POST['username']) && isset($_POST['password'])) {
    if (!empty($_POST['username']) && !empty($_POST['password'])) {
        $response['status'] = 'success';
        $response['message'] = 'Form submission successful.';
        $response['data'] = [
            'username' => $_POST['username'],
            'password' => $_POST['password']
        ];
    } else {
        http_response_code(400);
        $response['status'] = 'error';
        $response['message'] = 'Username and password cannot be empty.';
    }
} else {
    http_response_code(400);
    $response['status'] = 'error';
    $response['message'] = 'Invalid input.';
}

echo json_encode($response);
?>