<?php
//Запускаем Сессию
session_start();
include ("bd.php");
$ofline = "ofline";
$login = $_SESSION['login'];
$lastto = date("d-m-Y в H:i");
$tp = mysql_query("UPDATE users SET lastto='$lastto' WHERE login='$login'");
$up = mysql_query("UPDATE users SET online='$ofline' WHERE login='$login'");
//Уничтожаем переменные в сессиях
unset($_SESSION['password']);
unset($_SESSION['login']); 
unset($_SESSION['id']);
session_destroy();
//Отправляем пользователя на главную страницу.
exit("<html><head><title>Загрузка..</title><meta http-equiv='Refresh' content='0; URL=../index.php'></head></html>");
?>