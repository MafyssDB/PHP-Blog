<?php

function dd($value)
{
    var_dump($value);
    die;
}


function clearData($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = strip_tags($data);
    $data = htmlspecialchars($data);
    return $data;
}

function redirect($path)
{
    header('Location: ' . $path);
    die();
}

function upload(): string
{
    if (!is_dir('../images')) {
        mkdir('../images', 0777, true);
    }

    $img = $_FILES['image']['tmp_name'];
    $size_img = getimagesize($img);
    $width = $size_img[0];
    $height = $size_img[1];
    $mime = $size_img['mime'];

    switch ($size_img['mime']) {
        case 'image/jpeg':
            $src = imagecreatefromjpeg($img);
            $ext = "jpg";
            break;
        case 'image/gif':
            $src = imagecreatefromgif($img);
            $ext = "gif";
            break;
        case 'image/png':
            $src = imagecreatefrompng($img);
            $ext = "png";
            break;
    }

    $wNew = 420;
    $hNew = floor($height / ($width / $wNew));
    $dest = imagecreatetruecolor($wNew, $hNew);

    imagecopyresampled($dest, $src, 0, 0, 0, 0, $wNew, $hNew, $width, $height);

    $filename = "photo-" . rand(1,10000) . "-" . time() . '.' . $ext;
    $fullFilename = ROOT . "/images/" . $filename;

    switch ($mime) {
        case 'image/jpeg':
            imagejpeg($dest, $fullFilename, 100);
            break;
        case 'image/gif':
            imagegif($dest, $fullFilename);
            break;
        case 'image/png':
            imagepng($dest, $fullFilename);
            break;
    }

    return $filename;
}

function getCategories($connect):array
{
    $sql = "SELECT * FROM categories";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPosts($connect):array
{
    $sql = "SELECT * FROM posts ORDER BY id DESC";
    $stmt = $connect->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getPost($connect, $id):array
{
    $sql = "SELECT * FROM posts WHERE id = :id ";
    $stmt = $connect->prepare($sql);
    $stmt->execute([
        'id' =>$id
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUserPost($connect, $id, $userId):array
{
    $sql = "SELECT * FROM posts WHERE id = :id AND userId = :userId";
    $stmt = $connect->prepare($sql);
    $stmt->execute([
        'id' => $id,
        'userId' => $userId,
    ]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getUsers($connect):array
{
    $sql = "SELECT * FROM users";
    $stmt = $connect->prepare($sql);
    $stmt->execute([]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getComments($connect, $postId)
{
    $sql = "SELECT * FROM comments WHERE postId = :postId";
    $stmt = $connect->prepare($sql);
    $stmt->execute(['postId' => $postId]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function checkId($path):int
{
    $id = $_GET['id'] ?? null;
    if (!$id) {
        redirect($path);
    }
    return $id;
}


function checkUser($connect):array
{
    if(empty($_SESSION['userId'])) {
       redirect('/?act=login');
    }
    $userId = $_SESSION['userId'];

    $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
    $stmt = $connect->prepare($sql);
    $stmt->execute([
        'id' => $userId,
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$user){
        redirect('/?act=login');
    }
    return $user;

}

function checkAdmin($connect, $userId):bool
{
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $connect->prepare($sql);
    $stmt->execute([
       'id' => $userId
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && $user['is_admin'] === 1){
        return true;
    }else{
        return false;
    }
}

function checkEmail($connect, $email):bool
{
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $connect->prepare($sql);
    $stmt->execute([
        'email' => $email
    ]);
    $emailUsers = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($emailUsers)){
        return true;
    }else{
        return false;
    }
}



