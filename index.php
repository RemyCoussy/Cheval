<?php
require 'header.php';
session_start();
session_destroy();
?>
<body>
<div id="logindiv" align="center">
	<h1>Connexion</h1>
	<form id="loginform" method="POST">
		<input id="name" type="text" name="name" placeholder="Nom d'utilisateur">
		<input id="password" type="password" name="password" placeholder="Mot de passe">
		<input id="loginbutton" type="button" name="submit" value="Se connecter">
	</form>
</div>
</body>
<?php
require 'footer.php';
?>