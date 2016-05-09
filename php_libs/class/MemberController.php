<?php 

class MemberController extends BaseController {

	public function run(){
		$this->auth = new Auth();
		$this->auth->set_authname(_MEMBER_AUTHINFO);
		$this->auth->set_sessname(_MEMBER_SESSNAME);
		$this->auth->start();

		if($this->auth->check()){
			$this->menu_member();
		}else{
			$this->menu_guest();
		}
	}

	public function menu_member(){
		switch ($this->type){
			case "logout":
				$this->auth->logout();
				$this->screen_login();
				break;
			case "modify":
				$this->screen_modify();
				break;
			case "delete":
				$this->screen_delete();
				break;
			default:
				$this->screen_top();
		}
	}

	public function menu_guest(){
		switch($this->type){
			case "regist":
				$this->screen_regist();
				break;
			case "authenticate":
				$this->do_authenticate();
				break;
			default:
				$this->screen_login();
		}
	}
	
	public function screen_login(){
		$this->form->addElement('text', 'username', 'ユーザ名', ['size' => 15, 'maxlength' => 50]);
		$this->form->addElement('password', 'password', 'パスワード', ['size' => 15, 'maxlength' => 50]);
		$this->form->addElement('submit', 'submit', 'ログイン');
		$this->title = 'ログイン画面';
		$this->next_type = 'authenticate';
		$this->file = "login.tpl";
		$this->view_display();
	}

	public function do_authenticate(){
		$MemberModel = new MemberModel();
		$userdata = $MemberModel->get_authinfo($_POST['username']);
		if(!empty($userdata['password']) && $this->auth->check_password($_POST['password'], $userdata['password'])){
			$this->auth->auth_ok($userdata);
			$this->screen_top();
		}else{
			$this->auth_error_mess = $this->auth->auth_no();
			$this->screen_login();
		}
	}

	public function screen_top(){
		$this->view->assign('last_name', $_SESSION[_MEMBER_AUTHINFO]['last_name']);
		$this->view->assign(('first_name'), $_SESSION[_MEMBER_AUTHINFO]['first_name']);
		$this->title = '会員トップ画面';
		$this->file = 'member_top.tpl';
		$this->view_display();
	}


	public function screen_regist($auth = ""){
		$pos_btn = "";
		$neg_btn = "";
		$this->file = "memberinfo_form.tpl";

		$date_defaults = [
			'Y' => date('Y'),
			'm' => date('m'),
			'd' => date('d')
		];

		$this->form->setDefaults(['birthday' => $date_defaults]);
		$this->make_form_controle();

		if(!$this->form->validate()){
			$this->action = "form";
		}

		if($this->action == 'form'){
			$this->title = '新規登録画面';
			$this->next_type = 'regist';
			$this->next_action = 'confirm';
			$pos_btn = '確認画面へ';
		}else if($this->action == 'confirm'){
			$this->title = '確認画面';
			$this->next_type = 'regist';
			$this->action = 'complete';
			$this->form->freeze();
			$pos_btn = '登録する';
			$neg_btn = '戻る';
		}else if($this->action == 'complete' && isset($_POST['neg_submit']) && $_POST['neg_submit'] == '戻る'){
			$this->title = '新規登録画面';
			$this->next_type = 'regist';
			$this->next_action = 'confirm';
			$pos_btn = '確認画面へ';
		}else if($this->action == "complete" && isset($_POST['pos_submit']) && $_POST['pos_submit'] == '登録する'){
			$PrememberModel = new PrememberModel();
			$MemberModel = new MemberModel();
			$userdata = $this->form->getSubmitValues();
			if($MemberModel->check_username($userdata) || $PrememberModel->check_username($userdata)){
				$this->title = '新規登録画面';
				$this->message = "メールアドレスは登録済みです。";
				$this->next_type = 'regist';
				$this->next_aciton = 'confirm';
				$pos_btn = '確認画面へ';
			}else{
				if($this->is_system && is_object($auth)){
					$userdata['password'] = $auth->get_hashed_password($userdata['password']);
				}else{
					$userdata['password'] = $this->$auth->get_hashed_password($userdata['password']);
				}
				$userdata['birthday'] = sprint(
					"%04d%02d%02d",
					$userdata['birthday']['Y'],
					$userdata['birthday']['m'],
					$userdata['birthday']['d']
				);
				if($this->is_system){
					$MemberModel->regist_member($userdata);
					$this->title = '登録完了画面';
					$this->message = "登録完了しました。";
				}else{
					$userdata['link_pass'] = hash('sha256', uniqid(rand(),1));
					$PrememberModel->regist_premember($userdata);
					$this->mail_to_premember($userdata);
					$this->title = "メール送信完了画面";
					$this->message = "登録されたメールアドレスへ確認メールを送信しました。<br>";
					$this->message .= "メールの本文に記載されているURLにアクセスして登録を完了してください。<br>";
				}
				$this->file =  "message.tpl";
			}
		}
		$this->form->addElement('submit', 'pos_submit', $pos_btn);
		$this->form->addElement('submit', 'neg_submit', $neg_btn);
		$this->form->addElement('reset', 'reset', '取り消し');
		$this->view_display();
	}

	public function screen_modify($auth = ""){
		$pos_btn = "";
		$neg_btn = "";
		$this->file = "memberinfor_form.tpl";

		$MemeberModel = new MemberModel();
		$PrememberModel = new PrememberModel();
		if($this->is_system && $this->action == "form"){
			$_SESSION[_MEMBER_AUTHINFO] = $MemberModel->get_member_data_id($_GET['id']);
		}

		$data_defaults = [
			'Y' => substr($_SESSION[_MEMBER_AUTHINFO]['birthday'], 0, 4),
			'm' => substr($_SESSION[_MEMBER_AUTHINFO]['birthday'], 4, 2),
			'd' => substr($_SESSION[_MEMBER_AUTHINFO]['birthday'], 6, 2)
		];
		$this->form->setDefaults(
			[
				'username' => $_SESSION[_MEMBER_AUTHINFO]['username'],
				'last_name' => $_SESSION[_MEMBER_AUTHINFO]['last_name'],
				'first_name' => $_SESSION[_MEMBER_AUTHINFO]['first_name'],
				'prefecture' => $_SESSION[_MEMBER_AUTHINFO]['prefecture'],
				'birthday' => $date_defaults
			]
		);
		
		$this->make_form_controle();

		if(!$this->form->validate()){
			$this->action = "form";
		}

		if($this->action == "form"){
			$this->title = '更新画面';
			$this->next_type = 'modify';
			$this->next_aciton = 'confirm';
			$pos_btn = '確認画面へ';
		}else if($this->action == 'confirm'){
			$this->title = '確認画面';
			$this->next_type = 'modify';
			$this->next_action = 'complete';
			$this->form->freeze();
			$pos_btn = '更新する';
			$neg_btn = '戻る';
		}else if($this->action == 'complete' && isset($_POST['neg_submit']) && $_POST['neg_submit'] == '戻る'){
			$this->title = "更新画面";
			$this->next_type = 'modify';
			$this->action = 'confirm';
			$pos_btn = '確認画面へ';
		}else if($this->action == 'complete' && isset($_POST['pos_submit']) && $_POST['pos_submit'] == '戻る'){
			$userdata = $this->form->getSubmitValues();
			if(($MemberModel->check_username($userdata) || $PrememberModel->check_username($userdata)) && ($_SESSION[_MEMBER_AUTHINFO]['username'] != $userdata['username'])){
				$this->next_type = 'modify';
				$this->next_action = 'confirm';
				$this->title = '更新画面';
				$this->message = "メールアドレスは登録済みです。";
				$pos_btn = '確認画面へ';
			}else{
				$this->title = '更新完了画面';
				$userdata['id'] = $_SESSION[_MEMBER_AUTHINFO]['id'];
				if($this->is_system && is_object($auth)){
					$userdata['password'] = $auth->get_hashed_password($userdata['password']);
				}else{
					$userdata['password'] = $this->auth->get_hashed_password($userdata['password']);
				}
				$userdata['birthday'] = sprintf("%04d%02d%02d",
										$userdata['birthday']['Y'],
										$userdata['birthday']['m'],
										$userdata['birthday']['d']);
				$MemberModel->modify_member($userdata);
				$this->message = "会員情報を修正しました。";
				$this->file = "message.tpl";
				if($this->is_system){
					unset($_SESSION[_MEMBER_AUTHINFO]);
				}else{
					$_SESSION[_MEMBER_AUTHINFO] = $MemberModel->get_member_data_id($_SESSION[_MEMBER_AUTHINFO]['id']);
				}
			}
		}

		$this->form->addElement('submit', 'pos_submit', $pos_btn);
		$this->form->addElement('submit', 'neg_submit', $neg_btn);
		$this->form->addElement('reset', "reset", '取り消し');
		$this->view_display();
	}

	public function screen_delete(){
		$MemberModel = new MemberModel();
		if($this->action == "confirm"){
			if($this->is_system){
				$_SESSION[_MEMBER_AUTHINFO] = $MemberModel->get_member_data_id($_GET['id']);
				$this->message = "[削除する]をクリックすると ";
				$this->message .= htmlspecialchars($_SESSION[_MEMBER_AUTHINFO]['last_name'], ENT_QUOTES);
				$this->message .= htmlspecialchars($_SESSION[_MEMBER_AUTHINFO]['first_name'], ENT_QUOTES);
				$this->message .= "さん　の会員情報を削除します。";
				$this->form->addElement('submit', 'submit', "削除する");
			}else{
				$this->message = "[退会する]をクリックすると会員情報を削除して退会します。";
				$this->form->addElement('submit','submit', '退会する');
			}
			$this->next_type = 'delete';
			$this->next_action = 'complete';
			$this->title = '削除確認画面';
			$this->file = 'delete_form.tpl';	
		}else if($this->action == "complete"){
			$MemberModel->delete_member($_SESSION[_MEMBER_AUTHINFO]['id']);
			if($this->is_system){
				unset($_SESSION[_MEMBER_AUTHINFO]);
			}else{
				$this->auth->logout();
			}
			$this->message = "会員情報を削除しました。";
			$this->title = '削除完了画面';
			$title->file = 'message.tpl';
		}
		$this->view_display();
	}

	public function mail_to_premember($userdata){
		$path = pathinfo(_SCRIPT_NAME)['dirname'];
		$to = $userdata['username'];
		$subject = '会員登録の確認';

		$message =<<<EOM
			{$userdata['username']}様

			会員登録ありがとうございます。
			下のリンクにアクセスして会員登録を完了してください。

			http://{$_SERVER['SERVER_NAME']}{$path}/premember.php?username={$userdata['username']}&link_pass={$userdata['link_pass']}

			このメールに覚えがない場合はメールを削除してください。


			--
			会員システム

EOM;
		$add_header = "";

		mb_send_mail($to, $subject, $message, $add_header);
	}

}

?>