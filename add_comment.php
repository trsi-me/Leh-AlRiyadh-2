<?php
// ملف إضافة التعليقات
// Add comment file

header('Content-Type: text/html; charset=utf-8');

require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $message = trim($_POST['message'] ?? '');
    
    // التحقق من البيانات
    if (empty($name) || empty($message)) {
        header('Location: index.php?error=empty_fields');
        exit;
    }
    
    // تنظيف البيانات من HTML
    $name = htmlspecialchars($name, ENT_QUOTES, 'UTF-8');
    $message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
    
    // التحقق من طول النص
    if (strlen($name) > 255) {
        header('Location: index.php?error=name_too_long');
        exit;
    }
    
    if (strlen($message) > 5000) {
        header('Location: index.php?error=message_too_long');
        exit;
    }
    
    try {
        $stmt = $pdo->prepare("INSERT INTO comments (name, message) VALUES (:name, :message)");
        $stmt->execute([
            ':name' => $name,
            ':message' => $message
        ]);
        
        header('Location: index.php?success=comment_added#comments');
        exit;
    } catch(PDOException $e) {
        header('Location: index.php?error=database_error');
        exit;
    }
} else {
    header('Location: index.php');
    exit;
}
?>

