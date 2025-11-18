<?php
header("Content-Type: application/json; charset=UTF-8");

if (!isset($_GET["text"])) {
    echo json_encode([
        "output" => "fail",
        "content" => [
            "issue" => "no text provided"
        ]
    ], JSON_PRETTY_PRINT);
    exit;
}

$input = $_GET["text"];

// cek valid base64
$isValid = base64_decode($input, true);

if ($isValid === false) {
    echo json_encode([
        "output" => "fail",
        "content" => [
            "real text" => $input,
            "issue" => "invalid base64"
        ]
    ], JSON_PRETTY_PRINT);
    exit;
}

$decoded = base64_decode($input);

echo json_encode([
    "output" => "work",
    "content" => [
        "real text" => $input,
        "decode base64" => $decoded
    ]
], JSON_PRETTY_PRINT);