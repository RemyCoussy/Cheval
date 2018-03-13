<?php
session_start();

require 'util.php';
require 'model/table.php';
$data['columns'] = getColumns();
$data['data'] = getData();
getBlock('view/table.php', $data);
?>