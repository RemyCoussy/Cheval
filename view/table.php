<?php
require 'header.php';

//echo '<button id="addbutton"><a href="/Cheval/new.php">Ajouter une ligne</a></button>';
echo '<button id="deletebutton">Supprimer la selection</button>';

echo '<table class="table table-hover table-striped table-bordered"><thead><tr><th></th>';
/* Affichage nom des colonnes */
foreach($data['columns'] as $column){

	echo '<th>' . $column['Field'] . '</th>';
}
$count=-1;
echo "<th>Options</th></tr></thead>";
echo "<form id='ajoutform' action='/Cheval/model/new.php' method='post'><tr><th></th>";
foreach($data['columns'] as $column){
	$count++;
	if($count==0)
	{
		echo '<th></th>';
	}
	else{
		echo '<th><input type="text" class="no" name="'.$count.'" id="'.$column['Field'].'>"></th>';
	}
	
}
echo '<th><button id="addbutton">Ajouter</button></th></tr></form>';

/* Affichage données */
//echo '<form method="post" action="/Cheval/model/update.php">';
foreach($data['data'] as $table){

	echo '<tr id="edit'.$table[0].'"><td><input type="checkbox" name="delete" value=' . "$table[0]" . '></td>';
	for($i=0;$i<$_SESSION['num'];$i++){
		
		if($table[$i] === NULL){
			echo '<td><input type="text" name="" value="NULL"></td>';
		}else{
			if($i==0){
				echo '<td>' . $table[$i] . '</td>';
			}
			else{
				echo '<td><input type="text" name="" value="' . $table[$i] . '"></td>';
			}
		}		
    }
    
    echo '<td><a href="#" onclick="edit('.$table[0].');"><i class="far fa-edit"></i></a><a href="/Cheval/model/deleteone.php?id='.$table[0].'&table='.$_GET['id'].'"><i class="far fa-trash-alt"></i></a></td></tr>';
}

echo "</table>";
$_SESSION['currenttable']=$_GET['id'];

require 'footer.php';
?>