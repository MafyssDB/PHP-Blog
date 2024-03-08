<?php
/**
 * @var $connect
 */

$error = [];

$id = checkId('/admin/?act=users_index');


$sql = "SELECT * FROM users WHERE id = :id";
$stmt = $connect->prepare($sql);
$stmt->execute([
    'id' =>$id,
]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!empty($_POST)){
    $name = clearData($_POST['name']) ?? null;
    if (empty($name)){
        $error['name'] = 'Поле обязательно для заполения';
    }else{
        if (isset($_POST['isAdmin']) && $_POST['isAdmin'] === 'on'){
            $isAdmin = 1;
        }else{
            $isAdmin = 0;
        }
        $sql = "UPDATE users SET name = :name, is_admin = :is_admin WHERE id = :id";
        $stmt = $connect->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'is_admin' => $isAdmin,
            'id' => $id,
        ]);
        redirect('/admin/?act=users_index');
    }
}



require_once ROOT . '/templates/admin/user/edit.php';
