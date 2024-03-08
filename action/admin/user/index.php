<?php

/**
 * @var $connect
 */

$users = getUsers($connect);

require_once ROOT . '/templates/admin/user/index.php';
