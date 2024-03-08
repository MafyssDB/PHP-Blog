<?php
/**
 * @var $connect
 */

$error = [];

$id = checkId('/admin/?act=categories_index');

if (!empty($_POST)){
    $name = clearData($_POST['name']) ?? null;
    if (empty($name)){
        $error['name'] = 'Поле обязательно для заполнения';
    }else{
        $sql = "UPDATE categories SET name =:name WHERE id =:id";
        $stmt = $connect->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'id' => $id,
        ]);
        redirect('/admin/?act=categories_index');
    }
}

require_once ROOT . '/templates/admin/category/edit.php';
