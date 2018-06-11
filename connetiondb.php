<?php
require_once "config.php";
require_once "authtest.php";

$mysqli = new mysqli('localhost','bookshopuser','123456','bookshop');
if(mysqli_connect_errno())
{
    printf("Не вдалося підключитися до БД: %s\n",mysqli_connect_error());
    exit();
}
$mysqli->set_charset("utf8"); //Для Стаса
$auth=new AuthClass($mysqli);
?>