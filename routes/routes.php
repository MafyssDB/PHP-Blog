<?php

$routers = [
    'login' => 'action/auth/login.php',
    'register' => 'action/auth/register.php',
    'logout' => 'action/auth/logout.php',

    'posts' => 'action/main/posts.php',
    'create' => 'action/main/create.php',
    'show' => 'action/main/show.php',
    'edit' => 'action/main/edit.php',
    'delete' => 'action/main/delete.php',

    'filterPost' => 'action/main/filterPost.php',
];

$routersAdmin = [
    'categories_index' => 'action/admin/category/index.php',
    'categories_create' => 'action/admin/category/create.php',
    'categories_edit' => 'action/admin/category/edit.php',
    'categories_delete' => 'action/admin/category/delete.php',

    'users_index' => 'action/admin/user/index.php',
    'users_edit' => 'action/admin/user/edit.php',
    'users_delete' => 'action/admin/user/delete.php',

    'posts_index' => 'action/admin/post/index.php',
    'posts_create' => 'action/admin/post/create.php',
    'posts_show' => 'action/admin/post/show.php',
    'posts_edit' => 'action/admin/post/edit.php',
    'posts_delete' => 'action/admin/post/delete.php',

];

