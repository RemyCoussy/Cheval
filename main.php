<?php
require 'util.php';
require 'model/main.php';
$data['tables'] = getTables();
getBlock('view/main.php', $data);
?>