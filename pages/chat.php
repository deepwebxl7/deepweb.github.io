<?php include("bd.php");
header("Content-type: text/html; charset=UTF-8");
//**********************************************
if(empty($_POST['js'])){
	if($_POST['text'] != '' && $_POST['author'] !=''){
		$author = $_POST['author'];
		$author = addslashes($author);
		$author = htmlspecialchars($author);
		$author = stripslashes($author);
		$author = mysql_real_escape_string($author);
		
		$text = $_POST['text'];
		$text = addslashes($text);
		$text = htmlspecialchars($text);
		$text = stripslashes($text);
		$text = mysql_real_escape_string($text);

		$date = date("d-m-Y");
		$time = date("H:i");
		$result = mysql_query("INSERT INTO chat (author, text, date, time) VALUES ('$author', '$text', '$date', '$time')");
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
	if($_POST['text'] != '' && $_POST['author'] != ''){

		$author = $_POST['author']; 
		$author = addslashes($author);
		$author = htmlspecialchars($author);
		$author = stripslashes($author);
		$author = mysql_real_escape_string($author);
		
		$text = $_POST['text'];
		$text = addslashes($text);
		$text = htmlspecialchars($text);
		$text = stripslashes($text);
		$text = mysql_real_escape_string($text);

		$date = date("d-m-Y");
		$time = date("H:i");
		$result = mysql_query("INSERT INTO chat (author, text, date, time) VALUES ('$author', '$text', '$date', '$time')");
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