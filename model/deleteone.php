<?php
session_start();
$dsn = 'mysql:host=localhost;dbname=chevaux';
$dblink = new PDO($dsn, $_SESSION['user'], $_SESSION['pass']);
$id=$_GET['id'];
$table=$_GET['table'];

$delete_query=$dblink->prepare("DELETE FROM ".$table." where ".$_SESSION['namecolumn']."=".$id);
	if($delete_query->execute())
	{
		header("Location: /Cheval/table.php?id=".$table);
	}
	else
	{
		echo "2";
	}
