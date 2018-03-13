<?php
session_start();

require 'util.php';
require 'model/table.php';
$data['columns'] = getColumns();
$data['data'] = getData();
$_SESSION['namecolumn']=$data['columns'][0]['Field'];
getBlock('view/table.php', $data);
?>