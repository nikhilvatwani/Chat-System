<?php
	try{
		$conn = new PDO("mysql:host=localhost;dbname=chat_system","root","");
	}catch(Exception $e){
		die('cannot connect');
	}
?>