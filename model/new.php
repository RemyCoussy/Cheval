<?php
session_start();
$count=count($_POST);
$pdo = new PDO('mysql:host=localhost;dbname=chevaux', $_SESSION['user'], $_SESSION['pass']);
$ids="'";
    for ($i=1; $i <= $count; $i++) { 
        $ids=$ids.$_POST[$i]."','";
    }
    $new=substr_replace($ids, "", -2);
$statement = $pdo->prepare("INSERT INTO ".$_SESSION['currenttable']." values (null,".$new.")");
if($statement->execute())
{
	header("Location: /Cheval/table.php?id=".$_SESSION['currenttable']);
}
else{
	echo "2";
}