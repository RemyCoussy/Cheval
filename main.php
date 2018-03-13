<?php
require 'header.php';
session_start();
$pdo = new PDO('mysql:host=localhost;dbname=cheval', $_SESSION['user'], $_SESSION['pass']);
// $sth = $dbh->query("SELECT *  FROM information_schema.tables WHERE table_type='base table' AND ");
// foreach ($sth as $row){
// 	echo "<tr><td>";
// 	print_r($row[2]);
// 	echo "</td>";
// 	echo "<td>";
// 	print_r($row[3]);
// 	echo "</td></tr>";
// }
// echo "</table>";
$sql = "SHOW TABLES";
 
//Prepare our SQL statement,
$statement = $pdo->prepare($sql);
 
//Execute the statement.
$statement->execute();
 
//Fetch the rows from our statement.
$tables = $statement->fetchAll(PDO::FETCH_NUM);
 
echo '<table class="table">';

//Loop through our table names.
foreach($tables as $table){
    //Print the table name out onto the page.
    echo '<tr><td><a href="/Cheval/table.php?id='.$table[0].'">'.$table[0].'</a></td></tr>';
}

echo "</table>";

require 'footer.php';
?>