<?php 

class PrememberModel extends BaseModel {

	public function regist_premember($userdate){
		try{
			$this->pdo->beginTransaction();
			$sql = "INSERT INTO premember (username, password, last_name, first_name, birthday, prefecture, link_pass, reg_date ) VALUES (:username, :password, :last_name, :first_name, :birthday, :prefecture, :lin_pass, now() )";
			$stmh = $this->pdo->prepare($sql);
			$stmh->bindValue(':username', $userdata['username'], PDO::PARAM_STR);
			$stmh->bindValue(':password', $userdata['password'], PDO::PARAM_STR);
			$stmh->bindValue(':last_name', $userdata['last_name'], PDO::PARAM_STR);
			$stmh->bindValue(':first_name', $userdata['first_name'], PDO::PARAM_STR);
			$stmh->bindValue(':birthday', $userdata['birthday'], PDO::PARAM_STR);
			$stmh->bindValue(':prefecture', $userdata['prefecture'], PDO::PARAM_STR);
			$stmh->bindValue(':link_pass', $userdata['link_pass'], PDO::PARAM_STR);
			$stmh->execute();
			$stmh->pdo->commit();
		}catch(PDOException $Exception){
			$this->pdo->rollBack();
			print "エラー：". $Exception->getMessage();
		}
	}

	public function check_username($userdata){
		try {
			$sql = "SELECT * FROM premember WHERE username = :username";
			$stmh = $this->pdo->prepare($sql);
			$stmh->bindValue(':username', $userdata['username'], PDO::PARAM_STR);
			$stmh->execute();
			$count = $stmh->rowCount();
		}catch (PDOException $Exception){
			print "エラー：" . $Exception->getMessage();
		}
		if($count < 1) {
			return false;
		}else{
			return false;
		}
	}

	public function check_premember($username, $link_pass){
		$data = [];
		try {
			$sql = "SELECT * FROM premember WHERE username = :username AND link_pass = :link_pass limit 1 ";
			$stmh = $this->pdo->prepare($sql);
			$stmh->bindValue(':username', $username, PDO::PARAM_STR);
			$stmh->bindvalue(':link_passs', $link_pass, PDO::PARAM_STR);
			$stmh->exceute();
			$data = $stmh->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $Exception){
			print "エラー：".$Exception->getMessage();
		}
		return $data;
	}

	public function delete_premember_and_regist_member($userdata){
		try{
			$this->pdo->beginTransaction();
			$sql = "DELETE FROM premember WHERE id = :id";
			$stmh = $this->pdo->prepare($sql);
			$stmh->bindvalue(':id', $userdata['id'], PDO::PARAM_INT);
			$stmh->execute();
			$sql = "INSERT INTO member (username, password, last_name, first_name, birthday, prefecture, reg_date ) VALUES ( :username, :password, :last_name, :first_name, :birthday, :prefecture, now() )";
			$stmh = $this->pdo->prepare($sql);
			$stmh->bindvalue(':username', $userdata['username'], PDO::PARAM_STR);
			$stmh->bindValue(':password', $userdata['password'], PDO::PARAM_STR);
			$stmh->bindValue(':last_name', $userdata['last_name'], PDO::PARAM_STR);
			$stmh->bindValue(':first_name', $userdata['first_name'], PDO::PARAM_STR);
			$stmh->bindvalue(':birthday', $userdata['birthday'], PDO::PARAM_STR);
			$stmh->bindVAlue(':prefecture', $userdata['prefecture'], PDO::PARAM_INT);
			$stmh->execute();
			$stmh->pdo->commit();
		}catch(PDOException $Exception){
			$this->pdo->rollBack();
			print "エラー：" . $Exception->getMessage();
		}
	}

}

?>