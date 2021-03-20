<?php

//////////Регулярное выражение/////////////
/* $string ='Ученик сидит за партой';
$patern= '/Ученик/';

$result = preg_match($patern,$string);
var_dump($result); */

/* $string = '21-11-2021';
$patern= '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
$replacement = 'Год $3, месяц $2, день $1';
echo preg_replace($patern,$replacement,$string); */


//1.общие настройки
ini_set('display_errors',1);
error_reporting(E_ALL);

// 2. подключение файлов системы
// define('ROOT',dirname(__FILE__));
// Корневая директория проекта C:\xampp\htdocs\eshop
const ROOT = __DIR__;

require_once(ROOT.'/component/router.php');

//3. подключение БД

//4. вызов Router. Создаем объект класса Router и вызываем метод run()
$router = new Router();
$router->run();

?>