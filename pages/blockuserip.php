<?php include("bd.php");
header("Content-type: text/html; charset=UTF-8");
//**********************************************
		$ip = $_GET['ip'];
		$r = mysql_query("SELECT id FROM blockedip WHERE ip='$ip'",$db);
$myrow = mysql_fetch_array($r);
if (!empty($myrow['id'])) {
exit ("Уже.");
}
		$result = mysql_query("INSERT INTO blockedip (ip) VALUE ('$ip')");
		if($result == true){
			echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Заблокан"; //Ваше сообшение успешно отправлено
		}else{
			echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Ошибка базы данных"; //Сообщение не отправлено. Ошибка базы данных
		}
?>    