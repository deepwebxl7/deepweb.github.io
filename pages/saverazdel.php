<?php include("bd.php");
header("Content-type: text/html; charset=UTF-8");
//**********************************************
	if($_POST['name'] != '' && $_POST['text'] !='' && $_POST['name'] !=''){
		
		$name = $_POST['name'];
		$name = addslashes($name);
		$name = stripslashes($name);
		$name = mysql_real_escape_string($name);
				
		$text = $_POST['text'];
		$text = addslashes($text);
		$text = stripslashes($text);
		$text = mysql_real_escape_string($text);
						
		$result = mysql_query("INSERT INTO pages (name,description) VALUES ('$name','$text')");
		if($result == true){
			echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Раздел создан"; //Ваше сообшение успешно отправлено
		}else{
			echo "<meta http-equiv='Refresh' content='0; URL=../index.php'> Ошибка базы данных"; //Сообщение не отправлено. Ошибка базы данных
		}
	}else{
		echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Нельзя отправлять пустоту"; //Нельзя отправлять пустые сообщения
	}

?>     	