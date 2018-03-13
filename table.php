<?php
require 'header.php';

$id = $_GET[id];

session_start();
$pdo = new PDO('mysql:host=localhost;dbname=cheval', $_SESSION['user'], $_SESSION['pass']);

/* Requête nom des colonnes */
$statement = $pdo->query('DESCRIBE ' . $id);
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

/* Requête données */
$sql = "SELECT * FROM $id";
$statement = $pdo->prepare($sql);
$statement->execute();
$tables = $statement->fetchAll(PDO::FETCH_NUM);
$num = $statement->columnCount();


/* Affichage nom des colonnes */
echo '<table class="table table-hover table-striped table-bordered"><thead><tr>';

foreach($result as $column){
	echo '<th>'.$column['Field'].'</th>';
}

echo "</tr></thead>";

/* Affichage données */
foreach($tables as $table){
	echo '<tr>';
	for($i=0;$i<$num;$i++){
		if($table[$i] === NULL){
			echo '<td>NULL</td>';
		}else{
			echo '<td>'.$table[$i].'</td>';
		}
    }
    echo '</tr>';
}

echo "</table>";

require 'footer.php';
?>