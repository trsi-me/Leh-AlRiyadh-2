<?php
// إعدادات الاتصال بقاعدة البيانات
// Database connection settings

$host = 'localhost';
$dbname = 'leh_alriyadh';
$username = 'root'; // غيّر حسب إعداداتك
$password = ''; // غيّر حسب إعداداتك

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    die("خطأ في الاتصال بقاعدة البيانات: " . $e->getMessage());
}
?>

