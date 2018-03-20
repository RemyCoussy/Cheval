<?php
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=chevaux', $_SESSION['user'], $_SESSION['pass']);


    $delete=$pdo->prepare("DELETE FROM ".$_SESSION['currenttable']." where ".$_SESSION['namecolumn']."=".$_POST['id']);
    if($delete->execute())
    {
    	$statement = $pdo->prepare("INSERT INTO ".$_SESSION['currenttable']." values (".$_POST['values'].")");
if($statement->execute())
{
	echo "1";
}
else{
	echo "Error de insert";
}
    }
    else
    {
    	echo "Error de efface";
    }
