<?php
if (isset($_POST['login'])) { $login = $_POST['login']; if ($login == '') { unset($login);} } //заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (isset($_POST['password'])) { $password=$_POST['password']; if ($password =='') { unset($password);} }
if (isset($_POST['age'])) { $age=$_POST['age']; if ($age =='') { unset($age);} }
if (isset($_POST['name'])) { $name=$_POST['name']; if ($name =='') { unset($name);} }
if (isset($_POST['lastname'])) { $lastname=$_POST['lastname']; if ($lastname =='') { unset($lastname);} }
if (isset($_POST['aboutme'])) { $aboutme=$_POST['aboutme']; if ($aboutme =='') { unset($aboutme);} }
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную

if (empty($login) or empty($password) or empty($age) or empty($name) or empty($lastname)) //если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
{
exit ("Вы ввели не всю информацию, венитесь назад и заполните все поля!<a href='javascript:history.go(-1)'>Назад</a>");
}
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);

$age = stripslashes($age);
$age = htmlspecialchars($age);

$name = stripslashes($name);
$name = htmlspecialchars($name);

$last = stripslashes($lastname);
$last = htmlspecialchars($lastname);

$lastname = stripslashes($lastname);
$lastname = htmlspecialchars($lastname);

$aboutme = stripslashes($aboutme);

$password = stripslashes($password);
$password = htmlspecialchars($password);

//удаляем лишние пробелы
$login = trim($login);
$password = trim($password);
$age = trim($age);
$name = trim($name);
$lastname = trim($lastname);
$aboutme = trim($aboutme);

// подключаемся к базе
include ("bd.php");// файл bd.php должен быть в той же папке, что и все остальные, если это не так, то просто измените путь 

// проверка на существование пользователя с таким же логином
$result = mysql_query("SELECT id FROM users WHERE login='$login'",$db);
$myrow = mysql_fetch_array($result);
if (!empty($myrow['id'])) {
exit ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
}

// если такого нет, то сохраняем данные
$date = date("d-m-Y в H:i:s");
$result2 = mysql_query ("INSERT INTO users (date,login,name,lastname,age,ip,password,aboutme) VALUES('$date','$login','$name','$lastname','$age','".$_SERVER['REMOTE_ADDR']."','$password','$aboutme')");
// Проверяем, есть ли ошибки
if ($result2=='TRUE')
{
echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='../index.php'>Главная страница</a>";
}

else {
echo "Ошибка! Вы не зарегистрированы.";
     }
?>