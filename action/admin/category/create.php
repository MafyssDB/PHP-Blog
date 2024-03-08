<?php
/**
 * @var $connect
 */

$error = [];

if (!empty($_POST)){
    $name = clearData($_POST['name']);
    if (empty($name)){
        $error['name'] = 'Поле обязательно для заполения';
    }else{
        $sql = "INSERT INTO categories (name) VALUES (:name)";
        $stmt = $connect->prepare($sql);
        $stmt->execute([
            'name' => $name
        ]);
        redirect('/admin/?act=categories_index');
    }
}

require_once ROOT . '/templates/admin/category/create.php';

