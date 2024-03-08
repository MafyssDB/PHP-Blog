<?php
/**
 * @var $connect
 */
$id = checkId('/admin/?act=posts_index');
$post = getPost($connect, $id);

@unlink(ROOT . "/images/" . $post['image']);

$sql = "DELETE FROM posts WHERE id = :id";
$stmt = $connect->prepare($sql);
$stmt->execute([
   'id' =>$id,
]);


redirect('/admin/?act=posts_index');
