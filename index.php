<?php
session_start();

require __DIR__ . '/config/db.php';
require __DIR__ . '/config/config.php';
require __DIR__ . '/config/functions.php';
require __DIR__ . '/routes/routes.php';

//if (isset($_SESSION['userId'])){
//    $isAdmin =  checkAdmin($connect,$_SESSION['userId']);
//}

$categories = getCategories($connect);

if (isset($_REQUEST['act']) && isset($routers[$_REQUEST['act']])) {
    require_once $routers[$_REQUEST['act']];
} else {
    require_once 'action/main/index.php';
}

