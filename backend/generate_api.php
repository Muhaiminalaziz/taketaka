<?php
function generateApi($status, $code, $message, $data) {
    $api = [
        "status" => $status,
        "code" => $code,
        "message" => $message,
        "data" => ($data) ? $data : []
    ];

    header('Content-Type: application/json; charset=utf-8');
    return $api;
}
?>