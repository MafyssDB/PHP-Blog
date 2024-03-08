<?php
$db_host = 'localhost';
$db_name = 'newBlog';
$db_username = 'root';
$db_password = '';


try{
    $connect = new PDO("mysql:host=$db_host;dbname=$db_name;", $db_username, $db_password);
}catch(PDOException $exception){
    echo "Error: {$exception->getMessage()}";
}