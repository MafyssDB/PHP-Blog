<?php
/**
 * @var $connect
 *
 */

$posts = getPosts($connect);
$categories = getCategories($connect);
$users = getUsers($connect);

require_once 'templates/index.php';

