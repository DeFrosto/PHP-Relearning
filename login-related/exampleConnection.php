<?php
// @created 09/19/2019
if (!defined('ver')) {
    http_response_code(403);
    exit();
}

$S = "SERVER";
$U = "USERNAME";
$P = "PASSWORD";
$D = "DATABASE";

$conn = null;

try {
    $conn = new PDO("mysql:host=$S;dbname=$D", $U, $P);
} catch (PDOException $e) {
    die("Connection failure! Error: " . $e->getMessage() . "<br/>");
}
