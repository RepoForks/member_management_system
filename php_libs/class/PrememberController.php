<?php 

class PrememberController extends BaseController {
	public function run(){
		if(isset($_GET['username']) && isset($_GET['link_pass'])){
			$PrememberModel = new PrememberModel();
			$userdata = $PrememberModel->check_premember($_GET['username'], $_GET['link_pass']);
			if(!empty($userdata) && count($userdata) >= 1 ){
				$PrememberModel->delete_premember_and_regist_member($userdata);
				$this->title = '登録完了画面';
				$this->message = '登録を完了しました。トップページよりログインしてください。';
			}else{
				$this->title = 'エラー画面';
				$this->message = 'このURLは無効です。';
			}
		}else{
			$this->title = 'エラー画面';
			$this->message = 'このURLは無効です。';
		}
		$this->file = 'premember.tpl';
		$this->view_display();
	}
}

?>