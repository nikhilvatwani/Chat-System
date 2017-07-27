<?php
	include 'classes.php';
	include 'conn.php';
	$data = mysqli_query($conn,"SELECT * FROM `message` WHERE `id`=".$_GET['id']);
	$data = mysqli_fetch_assoc($data);
	
    $data= $data["chat_id"];
	$chat = new chat();
	$chat->DisplayMessage($data);
?>