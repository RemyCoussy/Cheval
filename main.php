<?php
session_start();
if(isset($_SESSION['user'])){
	require 'util.php';
	require 'model/main.php';
	$data['tables'] = getTables();
	getBlock('view/main.php', $data);
}
else{
	header('Location: /index.php');
}
?>