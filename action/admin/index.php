<?php
/**
 * @var $connect
 */

$posts = getPosts($connect);
$users = getUsers($connect);
$categories = getCategories($connect);

$postsCount = count($posts);
$usersCount = count($users);
$categoriesCount = count($categories);

require_once ROOT . '/templates/admin/index.php';
