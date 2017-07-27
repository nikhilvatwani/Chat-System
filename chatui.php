<?php
    session_start();
    $_SESSION["UserId"] = 9;
    $_SESSION["role"] = 10;
    $_SESSION["p_id"] = 4;
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
    	#rounded_image{
    		height:40px;
    		width:40px;
    	}
    	.hr_line{
    		width:80%;
    		height:1px;
    		background-color: #EEE;
    		margin-left:4vw;
    	}
    	.back:hover{
    		background-color: #EEE;
    		text-decoration: none;
    	}
    	.back{
    		padding:20px;
    	}
    	.iframe_chat{
    		width:100%;
    		height:100vh;
    	}
    	a:hover{
    		text-decoration: none;
    	}
    </style>
    <script type="text/javascript">
    	function checkUser(){
    //console.log('here');
     $.ajax({
            type:"GET",
            url:"http://localhost/advaced/backend/web/index.php?r=site/check&username="+$("input[name=uname]").val(),
            success:function(msg){
              msg = eval(msg);
                if(msg == 'true'){
                  send();
                }
                else if(msg == 'false'){
                  $('.err').text('enter valid values');
                }
                else if(msg == 'exists'){
                  $('.err').text('Chat Already Exists');
                }
              }
          }) 
   }

      function send(){
        if($("input[name=uname]").val() != '' && $("input[name=msg]").val() != '')
          $.ajax({
            type:"GET",
            url:"http://localhost/advaced/backend/web/index.php?r=site/send&username="+$("input[name=uname]").val()+"&msg="+$("input[name=msg]").val(),
            success:function(){
                location.reload();
              }
          })
      }
    </script>
</head>
<body>
	<div class="row">
		<div class="col-lg-12">
			<div class="col-lg-3" style="height:100vh">
				<?php 
			        if($_SESSION["role"] == 10){
			          $data = mysqli_query($conn,"SELECT * FROM `message` WHERE `c_id`=".$_SESSION["UserId"]);
			        }
			        else if($_SESSION["role"] == 20){
			          $data = mysqli_query($conn,"SELECT * FROM `message` WHERE `p_id`=".$_SESSION["UserId"]);
			        }
			        if($data != NULL){
			        ?>
			          <h1>Chat History:</h1>
			          <hr>
			        <?php
			        }
			          foreach ($data as $key => $value) {
			          	if($_SESSION["role"] == 10){
			         ?>
			          <a href="chattingui.php?id=<?php echo $value['id']?>&p_id=<?php echo $value['p_id']?>" target="chats_frame">
			          <?php
			        }

			        else if($_SESSION["role"] == 20){
			        	?>
			        	<a href="chattingui.php?id=<?php echo $value['id']?>&p_id=<?php echo $value['c_id']?>" target="chats_frame">
			        <?php
			          
			        }
			        ?>

			              <div class="row chats"><div class="back">
					<div>
						<img src="images/iste_blue.png" class="img-rounded in" id="rounded_image"><h4 class="in">

			        <?php
			        $name = null;
			          if($_SESSION['role'] == 10)
			            $name = mysqli_query($conn,"SELECT * FROM `credintials` WHERE `id`=".$value["p_id"]);
			        else if($_SESSION['role'] == 20)
			          $name = mysqli_query($conn,"SELECT * FROM `credintials` WHERE `id`=".$value["c_id"]);
			          echo mysqli_fetch_assoc($name)["username"];
			        ?>
			              </h4>
					</div>
					
				</div></div></a><div class="hr_line"></div>
			              
			        <?php
			          }
			        ?>
				<!--<div class="back">
					<div>
						<img src="images/iste_blue.png" class="img-rounded in" id="rounded_image">
						<h4 class="in">Nikhil Vatwani</h4>
					</div>
					<div class="hr_line"></div>
				</div>-->
			</div>
			<div class="col-lg-9" style="border-right: 2px solid #EEE;height:100vh;padding:0px">
				<iframe src="temp.php" class="iframe_chat" name="chats_frame"></iframe>
			</div>
		</div>
	</div>
</body>
</html>