<?php 

class SystemModel extends BaseModel {

	public function get_authinfo($username){
		$data = [];
		try {
			$sql = "SELECT * FROM system WHERE username = :username limit 1";
			$stmh = $this->pdo->prepare($sql);
			$stmh->execute();
			$data = $stmh->fetch(PDO::FETCH_ASSOC);
		}catch (PDOException $Exception){
			print "エラー：" . $Exception->getMessage();
		}
		return $data;
	}
}

?>