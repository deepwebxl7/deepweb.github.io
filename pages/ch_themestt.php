<?php
include_once("bd.php");

if(!empty($_GET['id']))
{
	$query = mysql_query("SELECT * FROM themes WHERE `id` = '{$_GET['id']}'");
    $array = mysql_fetch_array($query);
	if($array['status'] == 'none'){$st = 'true';}
	else{$st = 'none';}
$min = mysql_query("UPDATE themes SET status='$st' WHERE `id` = '{$_GET['id']}'");
if($min == true){
echo "<meta http-equiv='Refresh' content='0; URL=../index.php?id=".$_GET['id']."'>Успех!";
}
else{
echo "<meta http-equiv='Refresh' content='0; URL=viewtheme.php?id=".$_GET['id']."'>Error!";
}
}
?>