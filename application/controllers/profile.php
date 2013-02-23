<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	private $parames, $UserInfo;
	private $Url;
	
    function __construct() {
        parent::__construct();
		
		$this->load->model('Parames');
		$this->UserInfo = $this->Parames->getUserInfo();
		
		$this->Url = '/'.$this->lang->line('folder_name').'/'.strtolower(get_class($this)).'/';
		
		$this->load->model('db/user_information');
    }	
	
	public function index() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_profile_index');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		$this->load->view('index', $this->parames);
	}
	
	public function EditProfile() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_profile_editProfile');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		$this->onEditProfile();
		$this->load->view('index', $this->parames);
	}
	
	public function EditPwd() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_profile_editPwd');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		$this->onEditPwd();
		$this->load->view('index', $this->parames);
	}
	
	private function onCancel() {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url);
		}
	}
	
	private function onEditProfile() {
		$this->onCancel();
		
		$submit = $this->input->post('submit', TRUE );
		if(!empty($submit)) {
			$data = array();
			
			$name 		= $this->input->post('name', TRUE );
			$gender 	= $this->input->post("gender", TRUE );
			$phone 		= $this->input->post("phone", TRUE );
			$email 		= $this->input->post("email", TRUE );
			
			switch($this->UserInfo->user_status) {
				case 0:
					if(empty($name) || empty($gender) || empty($phone) || empty($email)) {
						$this->parames['error'] = $this->lang->line('Error_message');
					} else {
						$data = array(
									'name' 			=> $name, 
									'gender'		=> $gender,
									'phone' 		=> $phone,
									'email' 		=> $email						
								);
					}
					break;
				case 1:
					if(empty($phone) || empty($email)) {
						$this->parames['error'] = $this->lang->line('Error_message');
					} else {
						$data = array(
									'phone' 		=> $phone,
									'email' 		=> $email							
								);
					}
					break;
			}
			
			if(count($data) != 0) {
				$this->user_information->Update($this->UserInfo->id, $data);
				$this->UserInfo = $this->user_information->UserInfo( $this->UserInfo->id );
				$this->session->set('UserInfo', $this->UserInfo);
				$this->Parames->redirect($this->Url);
			}
		}
	}
	
	private function onEditPwd() {
		$this->onCancel();
		$submit = $this->input->post('submit', TRUE );
		if(!empty($submit)) {
			$OriginalPasswd 	= $this->input->post('OriginalPasswd', TRUE );
			$NewPasswd 			= $this->input->post("NewPasswd", TRUE );
			$againNewPasswd 	= $this->input->post("againNewPasswd", TRUE );
			
			if(!empty($OriginalPasswd) && !empty($NewPasswd) && !empty($againNewPasswd)) {
				$user_information = $this->user_information->SWhere($this->UserInfo->id);
				$dbpasswd = $user_information->password;
				if( $dbpasswd == hash('sha1', $OriginalPasswd)) {
					if($NewPasswd == $againNewPasswd) {
						$data = array('password'=> hash('sha1', $NewPasswd));
						$this->user_information->Update($id, $data);
						$this->Parames->redirect($this->Url);
					} else {
						$this->parames['error'] = $this->lang->line('Message_Error_passwdNotMatch');
					}
				} else {
					$this->parames['error'] = $this->lang->line('Message_Error_pssswdNotReal');
				}
			} else {
				$this->parames['error'] = $this->lang->line('Message_Error_dataNotReal');
			}
		}
	}
}





