<?php

/**
 * @var $connect
 */
$posts = getPosts($connect);

require_once ROOT . '/templates/admin/post/index.php';

