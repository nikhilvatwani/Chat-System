<?php
	session_start();
	class user{
		private $UserId,$UserName,$UserPassword,$UserRole;

		public function getUserId(){
			return $this->UserId;
		}
		public function setUserId($UserId){
			$this->UserId = $UserId;
		}
		public function getUserName(){
			return $this->UserName;
		}
		public function setUserName($UserName){
			$this->UserName = $UserName;
			//var_dump($this->$ChatUserId);
		}
		public function getUserPassword(){
			return $this->UserPassword;
		}
		public function setUserPassword($UserPassword){
			$this->UserPassword = $UserPassword;
		}
		public function getUserRole(){
			return $this->UserRole;
		}
		public function setUserRole($UserRole){
			$this->UserRole = $UserRole;
		}

	}


	class chat{
		private $ChatId,$ChatUserId,$ChatText;

		public function getChatId(){
			return $this->ChatId;
		}
		public function setChatId($ChatId){
			$this->ChatId = $ChatId;
		}
		public function getChatUserId(){
			return $this->ChatUserId;
		}
		public function setChatUserId($ChatUserId){
			$this->ChatUserId = $ChatUserId;
			//var_dump($this->$ChatUserId);
		}
		public function getChatText(){
			return $this->ChatText;
		}
		public function setChatText($ChatText){
			$this->ChatText = $ChatText;
		}

		public function insertChatMessage($id){
			include 'conn_pdo.php';
			$req = $conn->prepare("INSERT INTO chat (ChatUserId,ChatText) VALUES(:ChatUserId,:ChatText)");

			$req->execute(array('ChatUserId'=>$this->getChatUserId(),'ChatText'=>$this->getChatText()));
			$idLast = $conn->lastInsertId();
			$C = $conn->prepare("SELECT * FROM message WHERE id = ".$id);
			$C->execute();
			while($d = $C->fetch()){
				//var_dump("UPDATE message SET chat_id = '".$d['chat_id'].','.$idLast."' WHERE id =".$id);
				//die();
				$r = $conn->prepare("UPDATE message SET chat_id = '".$d['chat_id'].','.$idLast."' WHERE id =".$id);

				$r->execute();
			}
		}

		public function DisplayMessage($data){
			include 'conn_pdo.php';
			$ChatReq = $conn->prepare("SELECT * FROM chat WHERE ChatId IN (".$data.")ORDER BY ChatId ASC");
			$ChatReq->execute();
			while($DataChat = $ChatReq->fetch()){
				$UserReq = $conn->prepare('SELECT * FROM credintials WHERE id=:UserId');
				$UserReq->execute(array(
					'UserId'=>$DataChat['ChatUserId']
					));
				$DataUser = $UserReq->fetch();
				if($DataUser["id"]==$_SESSION["UserId"]){

				?>

				<label class='label label-success' style="float:right;padding-top:10px;padding-bottom:10px;padding-right:30px;padding-left:10px"><?php echo $DataChat['ChatText']?></label>
				<br><br>
				<?php
					}else{
				?>
				<label class='label label-danger' style="float:left;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:30px"><?php echo $DataChat['ChatText']?></label>
				<br><br>
				<?php		
					}
				?>
				
				<?php
			}
		}
	}

?>