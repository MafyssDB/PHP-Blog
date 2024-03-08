<?php
/**
 * @var $connect
 */
$id = checkId('/');
$post = getPost($connect, $id);
$users = getUsers($connect);
$categories = getCategories($connect);
$comments = getComments($connect, $id);


if (!empty($_POST)){
    $comment = clearData($_POST['comment']);
    $userId = $_SESSION['userId'];
    $sql = "INSERT INTO comments (userId, comment, postId, createdAt) VALUES (:userId, :comment, :postId, NOW())";
    $stmt = $connect->prepare($sql);
    $stmt->execute([
        'userId' => $userId,
        'comment' => $comment,
        'postId' => $id,
    ]);
    redirect('/?act=show&id=' . $id);
}

require_once 'templates/show.php';
