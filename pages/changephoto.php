<?php  
session_start();    
////////Изменение Фото
 	 	include ("bd.php");
    if (isset($_POST['photo'])){//Если существует 
    $photo = $_POST['photo'];
    $photo = stripslashes($photo);
    $photo = htmlspecialchars($photo);
    $photo = trim($photo);//удаляем все лишнее

    $id = $_POST['id'];
    $id = stripslashes($id);
    $id = htmlspecialchars($id);
    $id = trim($id);
   
    if ($photo == '') {
        exit("Вы не ввели...<br><a href='../index.php'>Вернуться назад</a>");
    }
    $up = mysql_query("UPDATE users SET photo='$photo' WHERE id='$id'");//обновляем 
    if ($up == true) {
		  $_SESSION['photo']=$photo; 
        echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Успешно";
    }else{
		echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Что-то пошло не так";
	}
	}else{
		echo "Global error";
	}
?>