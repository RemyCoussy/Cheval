<?php
session_start();
$dsn = 'mysql:host=localhost;dbname=chevaux';
$dblink = new PDO($dsn, $_SESSION['user'], $_SESSION['pass']);
$id=$_POST['id'];
$array=$_POST['selected'];
$number=count($array);

for ($i=0; $i < $number; $i++) { 
	$delete_query=$dblink->prepare("DELETE FROM ".$id." where ".$_SESSION['namecolumn']."=".$array[$i]);
	$delete_query->execute();
}
echo "1";