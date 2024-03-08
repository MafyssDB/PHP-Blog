<?php
/**
 * @var $connect
 */

$id = checkId($connect);
$user = checkUser($connect);
$post = getUserPost($connect, $id, $user['id']);

@unlink(ROOT . "/images/" . $post['image']);

$sql = "DELETE FROM posts WHERE id = :id AND userId = :userId";
$stmt = $connect->prepare($sql);
$stmt->execute([
   'id' => $id,
   'userId' => $user['id'],
]);

redirect('/?act=posts');
