<?php
/**
 * @var $connect
 */
$categories = getCategories($connect);

require_once ROOT . '/templates/admin/category/index.php';

