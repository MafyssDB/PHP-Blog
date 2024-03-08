<?php
/**
 * @var $connect
 */


$id = checkId('/admin/?act=categories_index');

$sql = "DELETE FROM categories WHERE id = :id";
$stmt = $connect->prepare($sql);
$stmt->execute([
    'id' =>$id,
]);

redirect('/admin/?act=categories_index');

