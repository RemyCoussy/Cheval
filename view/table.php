<?php
require 'header.php';

//echo '<button id="addbutton"><a href="/Cheval/new.php">Ajouter une ligne</a></button>';
echo '<button id="deletebutton">Supprimer la selection</button>';

echo '<table class="table table-hover table-striped table-bordered"><thead><tr><th></th>';
/* Affichage nom des colonnes */
foreach($data['columns'] as $column){

	echo '<th>' . $column['Field'] . '</th>';
}
$count=0;
echo "<th>Options</th></tr></thead>";
echo "<form id='ajoutform'><tr><th></th>";
foreach($data['columns'] as $column){
	$count++;
	if($count==1)
	{
		echo '<th></th>';
	}
	else{
		echo '<th><input type="text" name="'.$column['Field'].'" id="'.$column['Field'].'>"></th>';
	}
	
}
echo '<th><button id="addbutton">Ajouter</button></th></tr></form>';

/* Affichage données */
foreach($data['data'] as $table){

	echo '<tr><td><input type="checkbox" name="delete" value=' . "$table[0]" . '></td>';
	for($i=0;$i<$_SESSION['num'];$i++){
		if($table[$i] === NULL){

			echo '<td>NULL</td>';
		}else{

			echo '<td>' . $table[$i] . '</td>';
		}
    }
    echo '<td><a href="/edit.php?id=' . "$table[0]" . '"><i class="far fa-edit"></i></a><a href="/Cheval/model/deleteone.php?id='.$table[0].'&table='.$_GET['id'].'"><i class="far fa-trash-alt"></i></a></td></tr>';
}

echo "</table>";

require 'footer.php';
?>