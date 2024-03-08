<?php
/**
 * @var $connect
 */
session_start();

require  '../config/config.php';
require ROOT . '/config/db.php';
require ROOT . '/config/functions.php';
require ROOT . '/routes/routes.php';


if (checkAdmin($connect, $_SESSION['userId'])){
    if (isset($_REQUEST['act']) && isset($routersAdmin[$_REQUEST['act']])) {
        require_once ROOT . '/' . $routersAdmin[$_REQUEST['act']];
    } else {
        require_once ROOT . '/action/admin/index.php';
    }

}else {
    redirect('/');
}

