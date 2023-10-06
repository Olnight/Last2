<?php
require_once ('functions.php');
$is_auth = rand(0, 1);
$user_name = 'Глеб'; // укажите здесь ваше имя
const UPLOADS_PATH = __DIR__ . '/uploads/';
const DATABASE = 'dgaesjkj_m3';
const HOST = 'localhost';
const USER = 'dgaesjkj';
const PASSWORD = 'KH3jzi';

$con = mysqli_connect(HOST, USER, PASSWORD,DATABASE);
mysqli_set_charset($con, 'utf8');
if (!$con){
    printf('Ошибка подключения: ' . mysqli_connect_error());
} else{
    printf('Соединение установлено');
}