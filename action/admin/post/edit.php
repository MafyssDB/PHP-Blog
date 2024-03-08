<?php
/**
 * @var $connect
 */

$error = [];

$categories = getCategories($connect);
$id = checkId('/admin/?act=posts_index');
$post = getPost($connect, $id);

if (!empty($_POST)) {
    $title = clearData($_POST['title']);
    $content = clearData($_POST['content']);
    $categoryId = clearData($_POST['category_id']);
    $categoryId = $categoryId ?: null;

    $image = upload();
    @unlink(ROOT . "/images/" . $post['image']);

    if (empty($title)){
        $error['title'] = 'Поле обязательно для заполнения';
    }elseif (empty($content)){
        $error['content'] = 'Поле обязательно для заполнения';
    }else{
        try {
            $sql = "UPDATE posts SET title = :title, content = :content, image = :image, category_id = :category_id WHERE id = :id";
            $stmt = $connect->prepare($sql);
            $stmt->execute([
                'title' => $title,
                'content' => $content,
                'image' => $image,
                'category_id' => $categoryId,
                'id' => $id,
            ]);

            redirect('/admin/?act=posts_show&id=' . $post['id'] );
        }catch (PDOException $exception){

        }
    }
}

require_once ROOT . '/templates/admin/post/edit.php';
