<?php  
session_start();    
////////Изменение Пароля
 	 	include ("bd.php");
    if (isset($_POST['aboutmech'])){//Если существует 
    $aboutmech = $_POST['aboutmech'];
    $aboutmech = stripslashes($aboutmech);
    $aboutmech = htmlspecialchars($aboutmech);
    $aboutmech = trim($aboutmech);//удаляем все лишнее
   
    $id = $_POST['id'];
    $id = stripslashes($id);
    $id = htmlspecialchars($id);
    $id = trim($id);
   
    if ($aboutmech == '') {
        exit("Вы не ввели...<br><a href='changepass.php'>Вернуться назад</a>");
    }
 
    $up = mysql_query("UPDATE users SET aboutme='$aboutmech' WHERE id='$id'");//обновляем 
    if ($up == true) {
		  $_SESSION['aboutme']=$aboutmech; 
        echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Успешно";
    }else{
		echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Что-то пошло не так";
	}
	}
?>