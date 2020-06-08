<?php
include_once("bd.php");

if(!empty($_GET['id']))
{
	$query = mysql_query("SELECT * FROM users WHERE `id` = '{$_GET['id']}'");
    $array = mysql_fetch_array($query);
	if ($array['progres'] != '1'){
		
	$rep = $array['progres'] - 1;
	if($rep == '1'){$newst = 'Пользователь';}
	if($rep == '2'){$newst = 'Проверенный';}
	if($rep == '3'){$newst = 'VIP';}
	if($rep == '4'){$newst = 'Moderator';}
$min = mysql_query("UPDATE users SET progres='$rep' WHERE `id` = '{$_GET['id']}'");
$minst = mysql_query("UPDATE users SET status='$newst' WHERE `id` = '{$_GET['id']}'");
if($min == true){
	$_SESSION['status'] = $newst;
echo "<meta http-equiv='Refresh' content='0; URL=viewuser.php?id=".$_GET['id']."'>Успех!";
}
else{
echo "<meta http-equiv='Refresh' content='0; URL=viewuser.php?id=".$_GET['id']."'>Error!";
}
	}else{
		echo "Дальше нельзя";
	}
}
?>