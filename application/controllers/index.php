<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Index extends CI_Controller {
	private $params, $UserInfo;
    function __construct() {
        parent::__construct();
		
		$this->load->model('Parames');
		$this->params 	= $this->Parames->getParams();
		$this->UserInfo	= $this->Parames->getUserInfo();
		
		$this->load->model('db/user_information');
    }	
	
	public function index() {
		if($this->UserInfo) $this->Parames->redirect('home/');
		$this->login();
		$this->params['rand_number'] = rand(9999,1000);
		$this->load->view('login', $this->params);
	}
	
	private function login() {
		$button 		= $this->input->post('button', TRUE );
		$check_number 	= $this->input->post('check_number', TRUE );
		$hidden_nubmer 	= $this->input->post('hidden_nubmer', TRUE );
		
		if( isset($button) && isset($check_number) && isset($hidden_nubmer) ) {
			if( $check_number == $hidden_nubmer ) {
				if( $button == $this->lang->line('web_login_ButtonValue') ) {
					$account 	= $this->input->post('account', TRUE );
					$password 	= $this->input->post('password', TRUE );
					
					if( strlen($account) != 0 && strlen($password) != 0) {
						$User_information_id = $this->user_information->verifyUser($account, $password);
						if( $User_information_id ) {
							$this->UserInfo = $this->user_information->UserInfo( $User_information_id );
							$this->session->set('UserInfo', $this->UserInfo);
							$this->Parames->redirect('home/');
						} else {
							$this->params['error'] = $this->lang->line('web_login_Error_account_passwd');
						}
					}
				}
			} else {
				$this->params['error'] = $this->lang->line('web_login_Error_CheckCode');
			}
		}
	}
}