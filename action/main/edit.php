<?php
/**
 * @var $connect
 */

$error = [];
$id = checkId('/?act=posts');
$user = checkUser($connect);
$post = getUserPost($connect, $id, $user['id']);
$categories = getCategories($connect);

if (!empty($_POST)) {
    $title = clearData($_POST['title']);
    $content = clearData($_POST['content']);
    $categoryId = clearData($_POST['category_id']);
    $categoryId = $categoryId ?: null;

    if (!empty($_FILES['image']['size'])){
        $image = upload();
        @unlink(ROOT . "/images/" . $post['image']);
    }else{
        $image = $post['image'];
    }

    if (empty($title)){
        $error['title'] = 'Поле обязательно для заполнения';
    }elseif (empty($content)){
        $error['content'] = 'Поле обязательно для заполнения';
    }else{
        try {
            $sql = "UPDATE posts SET title = :title, content = :content, image = :image, category_id = :category_id, userId = :userId WHERE id = :id";
            $stmt = $connect->prepare($sql);
            $stmt->execute([
                'title' => $title,
                'content' => $content,
                'image' => $image,
                'category_id' => $categoryId,
                'id' => $id,
                'userId' => $user['id'],
            ]);

            redirect('/?act=show&id=' . $post['id'] );
        }catch (PDOException $exception){

        }
    }
}

require_once 'templates/edit.php';
