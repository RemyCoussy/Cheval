<?php
require 'header.php';

/* Affichage nom des colonnes */
echo '<table class="table table-hover table-striped table-bordered"><thead><tr>';

foreach($data['columns'] as $column){
	echo '<th>'.$column['Field'].'</th>';
}

echo "</tr></thead>";

/* Affichage données */
foreach($data['data'] as $table){
	echo '<tr>';
	for($i=0;$i<$_SESSION['num'];$i++){
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