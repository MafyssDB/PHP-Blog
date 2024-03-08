<?php

/**
 * @var $connect
 */

$id = checkId('/admin/?act=users_index');

$sql = "DELETE FROM users WHERE id = :id";
$stmt = $connect->prepare($sql);
$stmt->execute([
    'id' =>$id,
]);

redirect('/admin/?act=users_index');

