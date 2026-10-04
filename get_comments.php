<?php
// ملف عرض التعليقات
// Get comments file

require_once 'config.php';

try {
    $stmt = $pdo->query("SELECT * FROM comments ORDER BY created_at DESC LIMIT 50");
    $comments = $stmt->fetchAll();
    
    if (empty($comments)) {
        echo '<p style="text-align: center; color: var(--color5); padding: 20px;">لا توجد تعليقات بعد. كن أول من يعلق!</p>';
    } else {
        foreach ($comments as $comment) {
            $date = date('Y-m-d H:i', strtotime($comment['created_at']));
            echo '<div class="comment-item">';
            echo '<div class="comment-header">';
            echo '<span class="comment-author">' . htmlspecialchars($comment['name'], ENT_QUOTES, 'UTF-8') . '</span>';
            echo '<span class="comment-date">' . $date . '</span>';
            echo '</div>';
            echo '<div class="comment-text">' . nl2br(htmlspecialchars($comment['message'], ENT_QUOTES, 'UTF-8')) . '</div>';
            echo '</div>';
        }
    }
} catch(PDOException $e) {
    echo '<p style="text-align: center; color: red; padding: 20px;">حدث خطأ في تحميل التعليقات</p>';
}
?>

