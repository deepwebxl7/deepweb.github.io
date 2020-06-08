<?php include("bd.php");
header("Content-type: text/html; charset=UTF-8");
//**********************************************
if(empty($_POST['js'])){
	if($_POST['text1'] != '' && $_POST['author'] !='' && $_POST['text2'] !='' && $_POST['thname'] !=''){
		$author = $_POST['author'];
		$author = addslashes($author);
		$author = htmlspecialchars($author);
		$author = stripslashes($author);
		$author = mysql_real_escape_string($author);
		
		$text1 = $_POST['text1'];
		$text1 = addslashes($text1);
		$text1 = stripslashes($text1);
		$text1 = mysql_real_escape_string($text1);
				
		$text2 = $_POST['text2'];
		$text2 = addslashes($text2);
		$text2 = stripslashes($text2);
		$text2 = mysql_real_escape_string($text2);
						
		$thname = $_POST['thname'];
		$thname = addslashes($thname);
		$thname = htmlspecialchars($thname);
		$thname = stripslashes($thname);
		$thname = mysql_real_escape_string($thname);

		$datetime = date("d-m-Y в H:i");
		$result = mysql_query("INSERT INTO news (author,thname, text1, text2, datetime) VALUES ('$author','$thname', '$text1', '$text2', '$datetime')");
		if($result == true){
			echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Ваше сообшение успешно отправлено"; //Ваше сообшение успешно отправлено
		}else{
			echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Сообщение не отправлено. Ошибка базы данных"; //Сообщение не отправлено. Ошибка базы данных
		}
	}else{
		echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Нельзя отправлять пустые сообщения"; //Нельзя отправлять пустые сообщения
	}
}

//**************************************** Если отключен JavaScript ************************************

if($_POST['js'] == 'no'){
	if($_POST['text1'] != '' && $_POST['author'] !='' && $_POST['text2'] !='' && $_POST['thname'] !=''){
		$author = $_POST['author'];
		$author = addslashes($author);
		$author = htmlspecialchars($author);
		$author = stripslashes($author);
		$author = mysql_real_escape_string($author);
		
		$text1 = $_POST['text1'];
		$text1 = addslashes($text1);
		$text1 = htmlspecialchars($text1);
		$text1 = stripslashes($text1);
		$text1 = mysql_real_escape_string($text1);
				
		$text2 = $_POST['text2'];
		$text2 = addslashes($text2);
		$text2 = htmlspecialchars($text2);
		$text2 = stripslashes($text2);
		$text2 = mysql_real_escape_string($text2);
						
		$thname = $_POST['thname'];
		$thname = addslashes($thname);
		$thname = htmlspecialchars($thname);
		$thname = stripslashes($thname);
		$thname = mysql_real_escape_string($thname);

		$datetime = date("d-m-Y в H:i");
		$result = mysql_query("INSERT INTO news (author,thname, text1, text2, datetime) VALUES ('$author','$thname', '$text1', '$text2', '$datetime')");
		if($result == true){
			echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Ваше сообшение успешно отправлено"; //Ваше сообшение успешно отправлено
		}else{
			echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Сообщение не отправлено. Ошибка базы данных"; //Сообщение не отправлено. Ошибка базы данных
		}
	}else{
		echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Нельзя отправлять пустые сообщения"; //Нельзя отправлять пустые сообщения
	}
}
?>     	