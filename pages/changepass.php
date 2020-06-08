<?php      
////////Изменение Пароля
 
	include ("bd.php");
    if (isset($_POST['lpassword'] ) and isset($_POST['password']) and isset($_POST['cpassword'])){//Если существует пароль
    $lpassword = $_POST['lpassword'];
    $lpassword = stripslashes($lpassword);
    $lpassword = htmlspecialchars($lpassword);
    $lpassword = trim($lpassword);//удаляем все лишнее
	
	$password = $_POST['password'];
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = trim($password);//удаляем все лишнее
		
	$cpassword = $_POST['cpassword'];
    $cpassword = stripslashes($cpassword);
    $cpassword = htmlspecialchars($cpassword);
    $cpassword = trim($cpassword);//удаляем все лишнее
	
	if (isset($_POST['id'])){//Если существует пароль
    $id = $_POST['id'];
    $id = stripslashes($id);
    $id = htmlspecialchars($id);
    $id = trim($id);//удаляем все лишнее
	
    $query = mysql_query("SELECT password FROM users WHERE id='$id'");
    $array = mysql_fetch_array($query);
	if ($password == $cpassword) {
 if($array['password']==$lpassword){
	 
    if (isset($_POST['password'])){//Если существует пароль
    $password = $_POST['password'];
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    $password = trim($password);//удаляем все лишнее
   
    if ($password == '') {
        exit("Вы не ввели пароль<br><a href='../index.php'>Вернуться назад</a>");
    }
 
    $up = mysql_query("UPDATE users SET password='$password' WHERE id='$id'");//обновляем пароль
    if ($up == true) {
        echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Успешно";
    }
	}}
		else{
		echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Пароль неверный";
				}}else{
					        exit("Пароли не совпадают<br><a href='../index.php'>Вернуться назад</a>");
				}
	}}
?>