<?php
require 'header.php';
 
echo '<table class="table table-hover table-striped table-bordered">';

//Loop through our table names.
foreach($data['tables'] as $table){
    //Print the table name out onto the page.
    echo '<tr><td><a href="/Cheval/table.php?id='.$table[0].'">'.$table[0].'</a></td></tr>';
}

echo "</table>";

require 'footer.php';
?>