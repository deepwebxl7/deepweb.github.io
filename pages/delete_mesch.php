<?php
include_once("bd.php");

if(!empty($_GET['id']))
{
$del = mysql_query("DELETE FROM chat WHERE `id` = '{$_GET['id']}'");
if($del == true){
echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Delete!";
}
else{
echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Error!";
}
}else{
	echo "Global error!";
}
?>