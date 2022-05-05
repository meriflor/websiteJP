<?php
	$conn = new PDO( 'mysql:host=localhost;dbname=user_form', 'root', '');
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>