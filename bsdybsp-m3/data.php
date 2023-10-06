<?php
$title = 'Главная';
$is_auth = rand(0, 1);
$user_name = 'Глеб'; // укажите здесь ваше имя
require_once('functions.php');
$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];
$lots = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 10999,
        'photo'=> 'img/lot-1.jpg',
        'dateEnd'=> '2023-09-20',
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => 159999,
        'photo'=> 'img/lot-2.jpg',
        'dateEnd'=> '2023-09-13',

    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => 8000,
        'photo'=> 'img/lot-3.jpg',
        'dateEnd'=> '2023-09-14',
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => 10999,
        'photo'=> 'img/lot-4.jpg',
        'dateEnd'=> '2023-09-15',
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => 7500,
        'photo'=> 'img/lot-5.jpg',
        'dateEnd'=> '2023-09-16',
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => 5400,
        'photo'=> 'img/lot-6.jpg',
        'dateEnd'=> '2023-09-27',
    ],

]
?>

