<?php
    session_start();
    include 'conn.php';
    $_SESSION["UserId"] = 9;
    $_SESSION["role"] = 10;
    $_SESSION["p_id"] = 4;
    $name = null;
	 if($_SESSION['role'] == 10)
	    $name = mysqli_query($conn,"SELECT * FROM `credintials` WHERE `id`=".$_SESSION["p_id"]);
	else if($_SESSION['role'] == 20)
	  $name = mysqli_query($conn,"SELECT * FROM `credintials` WHERE `id`=".$_SESSION["c_id"]);
	  $_SESSION["username"]= mysqli_fetch_assoc($name)["username"];
    //$_SESSION["c"] = ;
    include "conn.php";
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style type="text/css">
    	.in{
    		display:inline;
    	}
    	.in1{
    		display:inline-block;
    	}
    	#rounded_image{
    		height:50px;
    		width:50px;
    	}
    	.header_chat{
    		height:10vh;
    		width:100%;
    		background-color: #EEE;
    		padding-top:10px;
    	}
    	.main_body_chat{
    		background-image: url("images/whatsapp_bg.jpg");
    		height:80vh;
    		width:100%;
    		padding-left: 100px;
    		padding-right: 100px;
    		padding-top: 20px;
    	}
    	.footer_chat{
    		position: fixed;
    		height:10vh;
    		width:100%;
    		background-color: #EEE;
    		padding:20px;
    	}
    	.row{
    		margin-left: 0px;
    		margin-right: 0px;
    	}
    </style>
    <script type="text/javascript">
			$(document).ready(function(){
				$('#ChatText').keyup(function(e){
					if(e.keyCode ==13){
						//alert('hi');
						var ChatText = $('#ChatText').val();
						$.ajax({
							type:'POST',
							url:'InsertMessage.php?id='+<?php echo $_GET['id']?>,
							data:{ChatText:ChatText},
							success:function(){
								$('#ChatMessages').load('DisplayMessages.php?id='+<?php echo $_GET['id']?>);
								$('#ChatText').val('');
							}
						})

					}
				});
				setInterval(function(){
					$('#ChatMessages').load('DisplayMessages.php?id='+<?php echo $_GET['id']?>);
				},1500);

				$('#ChatMessages').load('DisplayMessages.php?id='+<?php echo $_GET['id']?>);
			});
		</script>
</head>
<body>
	<div class="row header_chat">
		<div class="col-lg-12">
			<div class="back">
				<div>
					<img src="images/iste_blue.png" class="img-rounded in" id="rounded_image">
					<h3 class="in"><?php 
					echo mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM `credintials` WHERE id=".$_GET['p_id']))["username"]?></h3>
				</div>
			</div>
		</div>
	</div>
	<div class="row main_body_chat" id="ChatMessages">
	</div>
	<div class="row footer_chat">
		<div>
			<div class="form-group in1" >
			    <input type="text" class="form-control" id="ChatText" placeholder="Type a message" style="width:89vw">
			</div>
			<button type="submit" class="btn btn-default in1">Submit</button>
		</div>
	</div>
</body>
</html>