<?php
require_once ('helpers.php');
require_once ('functions.php');
require_once ('init.php');

if (!isset($_GET['id'])) {
    $detail_lot = include_template('404.php',['categories' => getCategories($con)]);
}

$lots = lot_detail($con, $_GET['id']);

if (http_response_code() === 404) {
    $detail_lot = include_template('404.php',['categories' => getCategories($con)]);
}else{
    $detail_lot = include_template('lot.php', ['categories' => getCategories($con),
    'lots' => $lots]);
}

$detail_lot = print(include_template('layout.php', [
    'is_auth' => $is_auth,
    'user_name' => $user_name,
    'title' => $lots['name'],
    'categories' => getCategories($con),
    'main' => $detail_lot]));