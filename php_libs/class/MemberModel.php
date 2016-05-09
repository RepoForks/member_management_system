<?php 

class MemberModel extends BaseModel {

	public function regist_member($userdata){
		try {
			$this->pdo->beginTransaction();
			$sql = "INSERT INTO member ( username, password, last_name, first_name, birthday, prefecture, reg_date ) VALUES ( :username, :password, :last_name, :first_name, :birthday, :prefecture, now() ) ";
			$stmh = $this->pdo->prepare($sql);
			$stmh->bindValue(':username', $userdata['username'], PDO::PARAM_STR);
			$stmh->bindValue(':password', $userdata['password'], PDO::PARAM_STR);
			$stmh->bindValue(':last_name', $userdata['last_name'], PDO::PARAM_STR);
			$stmh->bindValue(':first_name', $userdata['first_name'], PDO::PARAM_STR);
			$stmh->bindValue(':birthday', $userdata['birthday'], PDO::PARAM_STR);
			$stmh->bindValue(':prefecture', $userdata['prefecture'], PDO::PARAM_INT);
			$stmh->execute();
			$this->pdo->commit();
		}catch(PDOException $Exception){
			$this->pdo->rollBack();
			print "エラー：" . $Exception->getMessage();
		}
	}

	public function check_username($userdata){
		try {
			$sql = "SELECT * FROM member WHERE username = :username";
			$stmh = $this->pdo->prepare($sql);
			$stmh->execute();
			$count = $stmh->rowCount();
		}catch(PDOException $Exception){
			print "エラー：". $Exception->getMessage();
		}
		if($count >= 1){
			return true;
		}else{
			return false;
		}
	}

	public function get_authinfo($username){
		$data = [];
		try {
			$sql = "SELECT * FROM member WHERE username = :username limit 1";
			$stmh = $this->pdo->prepare($sql);
			$stmh->bindValue(':username', $username, PDO::PARAM_STR);
			$stmh->execute();
			$data = $stmh->fetch(PDO::FETCH_ASSOC); 
		}catch(PDOException $Exception){
			print "エラー：".$Exception->getMessage();
		}
		return $data;
	}

	public function get_member_data_id($id){
		$data = [];
		try {
			$sql = "SELECT * FROM member WHERE id = :id limit 1";
			$stmh = $this->pdo->prepare($sql);
			$stmh->bindValue(':id', $id, PDO::PARAM_INT);
			$stmh->execute();
			$data = $stmh->fetch(PDO::FETCH_ASSOC);
		}catch(PDOException $Exception){
			print "エラー：" . $Exception->getMessage();
		}
		return $data;
	}

	public function modify_member($userdata){
		try {
			$this->pdo->beginTransaction();
			$sql = "UPDATE member SET 
					username = :username,
					password = :password,
					last_name = :last_name,
					first_name = :first_name,
					birthday = :birthday,
					prefecture = :prefecture 
					WHERE id = :id";
			$stmh = $this->pdo->prepare($sql);
			$stmh->bindValue(':username', $userdata['username'], PDO::PARAM_STR);
			$stmh->bindValue(':password', $userdata['password'], PDO::PARAM_STR);
			$stmh->bindValue(':last_name', $userdata['last_name'], PDO::PARAM_STR);
			$stmh->bindValue(':first_name', $userdata['first_name'], PDO::PARAM_STR);
			$stmh->bindValue(':birthday', $userdata['birthday'], PDO::PARAM_STR);
			$stmh->bindValue(':prefecture', $userdata['prefecture'], PDO::PARAM_INT);
			$stmh->execute();
			$this->pdo->commit();
		}catch(PDOException $Exception){
			$this->pdo->rollBack();
			print "エラー：" . $Exception->getMessage();
		}
	}

	public function delete_member($id){
		try {
			$this->pdo->beginTransaction();
			$sql = "DELETE FROM member WHERE id = :di";
			$stmh = $this->pdo->prepare($sql);
			$stmh->bindValue(':id', $id, PDO::PARAM_INT);
			$stmh->execute();
			$this->$pod->commit();
		} catch(PDOException $Exception){
			$this->pdo->rollBack();
			print "エラー：" . $Exception->getMessage();
		}
	}

	public function get_member_list($search_key){
		$sql = <<<EOS
SELECT 
		m.id as id,
		m.username as username,
		m.password as password,
		m.last_name as last_name,
		m.first_name as first_name,
		m.birthday as birthday,
		p.prefecture as prefecture,
		m.reg_date as reg_date
FROM
		member m,
		prefecture p
WHERE
		m.prefecture = p.id
EOS;

		if($search_key != ""){
			$sql .= "AND (m.last_name like :last_name OR m.first_name like :first_name ) ";
		}

		try {
			$stmh = $this->pdo->prepare($sql);
			if($search_key != ""){
				$search_key = '%'. $search_key . '%';
				$stmh->bindValue(':last_name', $search_key, PDO::PARAM_STR);
				$stmh->bindValue(':first_name', $search_key, PDO::PARAM_STR);
			}
			$stmh->execute();
			$count = $stmh->rowCount();
			$i = 0;
			while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
				foreach($row as $key => $value){
					$data[$i][$key] = $value;
				}
				$i++;
			}
		}catch(PDOException $Exception){
			print "エラー：" . $Exception->getMessage();
		}
		return [$data, $count];
	}
}

?>