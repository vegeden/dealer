<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends CI_Controller {
	private $parames, $UserInfo;
	private $Url;

    function __construct() {
        parent::__construct();
		
		$this->load->model('Parames');
		$this->UserInfo = $this->Parames->getUserInfo();
		
		$this->Url = '/'.$this->lang->line('folder_name').'/'.strtolower(get_class($this)).'/';
		
		$this->load->model('db/user_information');
		$this->load->model('db/user_type');
		$this->load->model('pages');
		
    }	
	
	public function index() {
	
	}
	
	public function lists($page=0) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_account_lists');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$count = $this->user_information->SelectCount($this->UserInfo->id);
		$limit = $this->pages->init($count, $page);
		$this->parames['User_information'] 	= $this->user_information->Select($this->UserInfo->id, $limit);
		
		$this->parames['page_TotalPageNum'] = $this->pages->getTotalPageNum();
		$this->parames['page_previous'] 	= $this->pages->getPrevious();
		$this->parames['page_next'] 		= $this->pages->getNext();
		$this->load->view('index', $this->parames);
	}
	
	public function register() {		
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_account_register');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->parames['user_type'] = $this->user_type->Select();
		
		$this->onRegister();
		$this->load->view('index', $this->parames);
	}
	
	public function adminEdit($id) {		
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_account_adminEdit');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/	
		
		$User_information 					= $this->user_information->SWhere($id);
		$this->parames['User_information'] 	= $User_information;
		$this->parames['UpperInfo'] 		= $this->user_information->SWhere($User_information->upper_id);
		
		$this->onAdminEdit($id);
		
		$this->load->view('index', $this->parames);
	}
	
	public function del() {		
	
	}
	
	public function levelList($page=0) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_account_levelList');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$count = $this->user_type->SelectCount();
		$limit = $this->pages->init($count, $page);
		$this->parames['User_type'] 		= $this->user_type->Select($limit);
		
		$this->parames['page_TotalPageNum'] = $this->pages->getTotalPageNum();
		$this->parames['page_previous'] 	= $this->pages->getPrevious();
		$this->parames['page_next'] 		= $this->pages->getNext();
		
		
		$upLevelName = array();
		$query = $this->user_type->Select($limit);
		if( $query->num_rows() > 0 ) {		
			foreach($query->result() as $row) {
				$upLevelName[$row->id] = $row->type_name;
			}
		}
		$this->parames['upLevelName'] = $upLevelName;
		
		$this->load->view('index', $this->parames);
	}
	
	public function levelAdd() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_account_levelAdd');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->parames['LevelList'] = $this->user_type->SelectLevel();
		$this->onlevelAddEdit();
		
		$this->load->view('index', $this->parames);
	}
	
	public function levelEdit($user_type_id) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_account_levelEdit');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->parames['LevelList'] = $this->user_type->SelectLevel();
		$this->onlevelAddEdit($user_type_id);
		$this->parames['query'] = $this->user_type->SWhere($user_type_id);
		
		$this->load->view('index', $this->parames);
	}
	
	public function levelDel() {
		$this->Parames->init('nav_account_levelDel');
		$user_type_id = $this->input->post('uti', TRUE );
		if(isset($user_type_id)) {
			if( strlen($user_type_id)!=0 ) {
				$this->user_type->Del($user_type_id);
			}
		} 
	}
	
	public function profiles() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_account_profiles');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url;
		/*	-------------------------------------------	*/
		
		$this->load->view('index', $this->parames);
	}
	
	public function editPasswd() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_account_editPasswd');
		$this->parames = $this->Parames->getParams();
		/*	-------------------------------------------	*/
		
		$this->onEditPasswd();
		
		$this->load->view('index', $this->parames);
	}
	
	public function editInfo() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_account_editInfo');
		$this->parames = $this->Parames->getParams();
		/*	-------------------------------------------	*/
		
		$this->onEditInfo();
		
		$this->load->view('index', $this->parames);
	}
	
	private function onlevelAddEdit($id='') {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'levelList/');
		}
		
		$typeName 	= $this->input->post('typeName', TRUE );
		$upper		= $this->input->post('upper', TRUE );
		if(isset($typeName) && isset($upper)) {
			if(strlen($typeName) != 0 && strlen($upper) != 0)
				if($this->user_type->verify($typeName) || strlen($id) != 0) {
					$data = array('type_name' =>$typeName, 'upper' =>$upper);
					
					if($upper == 1) {
						$data['haveUpper '] = 0;
					} else {
						$data['haveUpper '] = 1;
					}
					
					if(strlen($id)==0) {
						// Add level
						$this->user_type->Add($data);
					} else {
						// Edit level
						$this->user_type->Update($id, $data);
					}
					$this->Parames->redirect($this->Url.'levelList/');
				} else {
					$this->parames['error'] = "";
				}
		}
	}
	
	private function onRegister() {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'lists/');
		}
		
		$submit 	= $this->input->post('submit', TRUE );
		if(isset($submit)) {
			if($submit == 'submit') {
				
				$level 		= $this->input->post('level', TRUE );
				$upper 		= $this->input->post('upper', TRUE );
				$account 	= $this->input->post('account', TRUE );
				$password	= $this->input->post('password', TRUE );
				
				$haveUpper = $this->user_type->verifyHaveUpper($level);
				if(isset($upper) || (isset($level) && isset($account) && isset($password))) {
					if(strlen($level) != 0 && strlen($account) != 0 && strlen($password) != 0 ) {
						if( $this->user_information->verifyAccount($account) ) {
							$data = array(	'account'		=> $account,
											'password'		=> hash('sha1', $password),
											'type_id'		=> $level,
										);
							
							if ( $haveUpper == 1 && strlen($upper) != 0) {
								/** have upper **/
								$data['upper_id'] = $upper;
								$this->user_information->Add($data);
							} else if($haveUpper == 0){
								/** no upper ex: admin etc. **/
								$data['upper_id'] = null;
								$this->user_information->Add($data);
							} else {
								$this->parames['error'] = $this->lang->line('account_error_needselectlevel');
							}
						} else {
							$this->parames['error'] = $this->lang->line('account_error_repeat');
						}
					} else {
						$this->parames['error'] = $this->lang->line('account_error_incomplete');
					}
				} 
			}
		}
	}
	
	private function onAdminEdit($id) {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'lists/');
		}
		
		$item = $this->input->post('item', TRUE );
		if(!empty($item)) {
			// $level 	= $this->input->post('level', TRUE );
			$upper 	= $this->input->post('upper', TRUE );
			
			$data 	= array('upper_id' => $upper);
			$this->user_information->Update($id, $data);
			$this->Parames->redirect($this->Url.'lists/');
		} else {
		/*
			$password = $this->input->post('password', TRUE );
			if(isset($password)) {
				if(strlen($password) != 0) {
					$data = array('password'=> hash('sha1', $password));
					$this->user_information->Update($id, $data);
					
					// Email Notice
					$EmailInfo = array(	'toWho'		=>$this->UserInfo->email,
										'account' 	=> $this->UserInfo->account, 
										'passwd' 	=> $password
									);
									
					$this->Parames->sendEMail(Mail::ForgetPassword_Type, $EmailInfo );

					$this->Parames->redirect($this->Url.'lists/');
				}
			}*/
		}
	}
	
	private function onEditPasswd() {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'profiles/');
		}
		
		$submit = $this->input->post('submit', TRUE );
		if(isset($submit)) {
			if($submit == 'submit') {
				$nowpassword 		= $this->input->post('nowpassword', TRUE );
				$newpassword 		= $this->input->post('newpassword', TRUE );
				$newpasswordagain 	= $this->input->post('newpasswordagain', TRUE );
				
				$dbpasswd = $this->user_information->SWhere($this->UserInfo->id)->password;
				if( $dbpasswd == hash('sha1', $nowpassword)) {
					if($newpassword == $newpasswordagain) {
						if(strlen($newpassword)>=8) {
							$data = array('password'=> hash('sha1', $newpassword));
							$this->user_information->Update($this->UserInfo->id, $data);
							
							// Email Notice
							$Message = array(	'toWho'		=>$this->UserInfo->email,
												'account' 	=> $this->UserInfo->account, 
												'passwd' 	=> $newpassword
											);
											
							$this->Mail->sendEMail(Mail::ForgetPassword_Type, $Message );
				
							$this->Parames->redirect($this->Url.'profiles/');
						} else {
							$this->parames['error'] = $this->lang->line('account_error_8number');
						}
					} else {
						$this->parames['error'] = $this->lang->line('account_error_notsame');
					}
				} else {
					$this->parames['error'] = $this->lang->line('account_error_notsamepasswd');
				}
			}
		}
	}
	
	private function onEditInfo() {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'profiles/');
		}
		
		$submit = $this->input->post('submit', TRUE );
		if(isset($submit)) {
			if($submit == 'submit') {
				$name 		= $this->input->post('name', TRUE );
				$gender 	= $this->input->post('gender', TRUE );
				$email 		= $this->input->post('email', TRUE );
				$phone 		= $this->input->post('phone', TRUE );
				$address 	= $this->input->post('address', TRUE );
								
				if( strlen($name) == 0 || $gender == '0' || strlen($phone) == 0 || strlen($address) == 0) {
					$this->parames['error'] = $this->lang->line('account_error_notfull');
				} elseif( !$this->Parames->verifyEmail($email)) {
					$this->parames['error'] = $this->lang->line('account_error_email_regular');
				} else {
					$data = array( 
									'name' 		=> $name, 
									'gender' 	=> $gender, 
									'email'		=> $email, 
									'phone' 	=> $phone, 
									'address' 	=> $address
								);
								
					if($this->UserInfo->user_status == 0) $data['user_status'] = 1;
					
					$this->user_information->Update($this->UserInfo->id, $data);
					$this->UserInfo = $this->user_information->UserInfo( $this->UserInfo->id );
					$this->session->set('UserInfo', $this->UserInfo);
					$this->Parames->redirect($this->Url.'profiles/');
				}
			}
		}
	}
	
	public function ajaxHaveUpper() {
		$this->Parames->init('nav_account_ajaxHaveUpper');
		$id = $this->input->post('level', TRUE );
		if( strlen($id) != 0 ) {
			$result['hu'] = $this->user_type->verifyHaveUpper($id);
		}
		echo json_encode($result);
	}
	
	public function ajaxUpper() {
		$this->Parames->init('nav_account_ajaxUpper');
		$level 	= $this->input->post('level', TRUE );
		$name	= $this->input->post('name', TRUE );

		if( strlen($name) != 0 ) {
			$result['count'] = 1;
			$result['list'] = $this->user_information->SelectList($level, $name);
			echo json_encode($result);
		} else {
			echo json_encode(array('count'=>0));
		}
		
	}
	
	public function ajaxSetUserStatus() {
		$this->Parames->init('nav_account_ajaxSetUserStatus');
		$id 	= $this->input->post('i', TRUE );
		$status = $this->input->post('st', TRUE );
		if( strlen($id) != 0 && strlen($status) != 0 ) {
			$data = array('user_status' => $status);
			$this->user_information->Update($id, $data);
		}
	}
}
/* End of file index.php */
/* Location: ./dealer/controllers/account/index.php */
















