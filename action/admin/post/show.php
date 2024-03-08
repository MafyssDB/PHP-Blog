<?php

/**
 * @var $connect
 */

$id = checkId('/admin/?act=posts_index');


$sql = "SELECT * FROM posts WHERE id = :id";
$stmt = $connect->prepare($sql);
$stmt->execute([
    'id' => $id,
]);
$post = $stmt->fetch(PDO::FETCH_ASSOC);


require_once ROOT . '/templates/admin/post/show.php';
