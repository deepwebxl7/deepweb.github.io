<?php
include_once("bd.php");

if(!empty($_GET['id']))
{
$del = mysql_query("DELETE FROM news WHERE `id` = '{$_GET['id']}'");
if($del == true){
echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Delete!";
}
else{
echo "<meta http-equiv='Refresh' content='0; URL=../index.php'>Error!";
}
}
?>