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
$encoded = base64_encode($input);

echo json_encode([
    "output" => "work",
    "content" => [
        "real text" => $input,
        "encode base64" => $encoded
    ]
], JSON_PRETTY_PRINT);