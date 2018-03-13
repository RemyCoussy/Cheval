<?php
require 'header.php';

echo '<button>Ajouter une ligne</button>';
echo '<button id="deletebutton">Supprimer la selection</button>';

echo '<table class="table table-hover table-striped table-bordered"><thead><tr><th></th>';
/* Affichage nom des colonnes */
foreach($data['columns'] as $column){
	echo '<th>' . $column['Field'] . '</th>';
}

echo "<th>Options</th></tr></thead>";

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
    echo '<td><a href="/edit.php?id=' . "$table[0]" . '">Edit</a></td></tr>';
}

echo "</table>";

require 'footer.php';
?>