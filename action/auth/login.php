<?php
/**
 * @var $connect
 */
$error = [];

if(!empty($_POST)){
    $email = clearData($_POST['email']) ?? null;
    $password = clearData($_POST['password']) ?? null;

    if(empty($email)){
        $error['email'] = 'Поле обязательно для заполнения';
    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'Формат Email не верный!';
    }
    if(empty($password)){
        $error['password'] = 'Поле обязательно для заполнения';
    }

    if (empty($error)) {
        $sql = "SELECT * FROM users WHERE email = :email LIMIT 1";
        $stmt = $connect->prepare($sql);
        $stmt->execute([
            'email' => $email,
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (empty($user)){
            $error['authError'] = 'Пользователь не найден';
        }elseif (password_verify($password, $user['password'])){
            $_SESSION['userId'] = $user['id'];
            redirect('/');
        }else{
            $error['authError'] = 'Неверный пароль';
        }
    }
}

require_once 'templates/auth/login.php';