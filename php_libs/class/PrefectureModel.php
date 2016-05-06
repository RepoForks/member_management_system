<?php

class PrefectureModel extends BaseModel {

	public function get_prefecture_data(){
		$prefecture_array = [];
		try {
			$sql = "SELECT * FROM prefecture ";
			$stmh = $this->pdo->query($sql);
			while ($row = $stmh->fetch(PDO::FETCH_ASSOC)){
				$prefecture_array[$row['id']] = $row['prefecture'];
			} 
		}catch (PDOException $Exception){
			print "エラー：" . $Exception->getMessage();
		}
		return $prefecture_array;
	}
}

?>