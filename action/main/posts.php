<?php
/**
 * @var $connect
 */
$user = checkUser($connect);

$sql = "SELECT * FROM posts WHERE userId = :userId ORDER BY id DESC";
$stmt = $connect->prepare($sql);
$stmt->execute([
    'userId' => $user['id'],
]);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once 'templates/posts.php';
