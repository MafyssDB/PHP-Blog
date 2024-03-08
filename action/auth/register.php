<?php
/** @var $connect */

if(!empty($_POST)){
    $name = clearData($_POST['name']) ?? null;
    $email = clearData($_POST['email']) ?? null;
    $password = clearData($_POST['password']) ?? null;
    $passwordConfirm = clearData($_POST['passwordConfirm']) ?? null;
    
    if(empty($name)){
        $error['name'] = 'Поле обязательно для заполнения';
    }

    if(empty($email)){
        $error['email'] = 'Поле обязательно для заполнения';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'Формат Email не верный!';
    }elseif (checkEmail($connect,$email)){
        $error['email'] = 'Пользователь с таким Email уже есть';
    }

    if(empty($password)){
        $error['password'] = 'Поле обязательно для заполнения';
    }elseif(mb_strlen($password) <= 3 || mb_strlen($password) >= 16){
        $error['password'] = 'Длина пароля должна быть от 4 до 16';
    }

    if(empty($passwordConfirm)){
        $error['passwordConfirm'] = 'Поле обязательно для заполнения';
    }
    if($password !== $passwordConfirm){
        $error['passwordError'] = 'Пароли не совпадают';
    }

    if (empty($error)){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)";

        $stmt = $connect->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
        redirect('/?act=login');
    }

}

require_once 'templates/auth/register.php';
