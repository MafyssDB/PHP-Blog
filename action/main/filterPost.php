<?php
/**
 * @var $connect
 */
$id = checkId('/');
$users = getUsers($connect);


$sql = "SELECT * FROM posts WHERE category_id = :category_id ORDER BY id DESC";
$stmt = $connect->prepare($sql);
$stmt->execute([
   'category_id' => $id
]);
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

require_once 'templates/index.php';

