<?php include("bd.php");
header("Content-type: text/html; charset=UTF-8");
//**********************************************
	if($_POST['razdel'] != '' && $_POST['author'] !='' && $_POST['maintext'] !='' && $_POST['name'] !=''){
		$author = $_POST['author'];
		$author = addslashes($author); 
		$author = htmlspecialchars($author);
		$author = stripslashes($author);
		$author = mysql_real_escape_string($author);
		
		$razdel = $_POST['razdel'];
		$razdel = addslashes($razdel);
		$razdel = stripslashes($razdel);
		$razdel = mysql_real_escape_string($razdel);
		
					$query1 = mysql_query("SELECT * FROM pages WHERE name='$razdel'");
    $r = mysql_fetch_array($query1);
	if(!empty($r['id'])){
		
		$maintext = $_POST['maintext'];
		$maintext = addslashes($maintext);
		$maintext = stripslashes($maintext);
		$maintext = mysql_real_escape_string($maintext);
						
		$name = $_POST['name'];
		$name = addslashes($name);
		$name = htmlspecialchars($name);
		$name = stripslashes($name);
		$name = mysql_real_escape_string($name);

		$datetime = date("d-m-Y в H:i");
		$result = mysql_query("INSERT INTO themes (author,name,razdel,maintext, datetime) VALUES ('$author','$name', '$razdel', '$maintext', '$datetime')");
		if($result == true){
			echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Тема создана"; //Ваше сообшение успешно отправлено
		}else{
			echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Сообщение не отправлено. Ошибка базы данных"; //Сообщение не отправлено. Ошибка базы данных
		}
				}else{
					echo "выберите из выше заданных вариантов!";
				}
	}else{
		echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Нельзя отправлять пустые сообщения"; //Нельзя отправлять пустые сообщения
	}

?>     	