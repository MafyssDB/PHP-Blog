<?php
/**
 * @var $connect
 */

$error = [];

$categories = getCategories($connect);


if (!empty($_POST)) {
    $title = clearData($_POST['title']);
    $content = clearData($_POST['content']);
    if (!empty($_FILES['image']['size'])) {
        $image = upload();
    }else{
        $image = null;
    }
    $categoryId = clearData($_POST['category_id']);
    $categoryId = $categoryId ?: null;
    $userId = $_SESSION['userId'];

    if (empty($title)){
        $error['title'] = 'Поле обязательно для заполнения';
    }elseif (empty($content)){
        $error['content'] = 'Поле обязательно для заполнения';
    }else{
        try {
            $sql = "INSERT INTO posts (title, content, category_id, image, userId, createdAt) VALUES (:title, :content, :category_id, :image, :userId, NOW())";
            $stmt = $connect->prepare($sql);
            $stmt->execute([
                'title' => $title,
                'content' => $content,
                'image' => $image,
                'category_id' => $categoryId,
                'userId' => $userId,
            ]);

            redirect('/admin/?act=posts_index');
        }catch (PDOException $exception){

        }
    }
}

require_once ROOT . '/templates/admin/post/create.php';
