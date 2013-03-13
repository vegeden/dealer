<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SysSetting extends CI_Controller {
	private $parames, $UserInfo;
	private $Url;

    function __construct() {
        parent::__construct();
		
		$this->load->model('Parames');
		$this->UserInfo = $this->Parames->getUserInfo();
		
		$this->Url = '/'.$this->lang->line('folder_name').'/backend/'.get_class($this).'/';
		
		$this->load->model('db/sys_config');
		$this->load->model('db/access_control_list');
    }	
	
	public function index() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_SysSetting_index');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->parames['SysConfig'] = $this->sys_config->Select();
		
		$this->load->view('backend', $this->parames);
	}
	
	public function SysConfigAdd() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_SysSetting_SysConfigEdit');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->onSysConfigAdd();
		
		$this->load->view('backend', $this->parames);
	}
	
	public function SysConfigEdit($id) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_SysSetting_SysConfigEdit');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->onSysConfigEdit($id);
		$this->parames['SysConfig'] = $this->sys_config->SWhere($id);
		
		
		$this->load->view('backend', $this->parames);
	}

	public function ACL() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_SysSetting_ACL');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->parames['ACL'] = $this->access_control_list->Select();
		
		$this->load->view('backend', $this->parames);
	}
	
	public function ACLAdd() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_SysSetting_ACLAdd');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->onACLAdd();
		
		$this->load->view('backend', $this->parames);
	}
	
	public function ACLEdit($id) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_SysSetting_ACLEdit');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->onACLEdit($id);
		$this->parames['ACL'] = $this->access_control_list->SWhere($id);
		
		
		$this->load->view('backend', $this->parames);
	}
	
	private function onCancel($redirectUrl) {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!= 0) {
			$this->Parames->redirect($this->Url.$redirectUrl);
		}
	}
	
	private function onSysConfigAdd() {
		$this->onCancel('');
		
		$key 			= $this->input->post('key', TRUE );
		$value 			= $this->input->post('value', TRUE );
		$directions 	= $this->input->post('directions', TRUE );
		if(strlen($key) != 0 && strlen($value) != 0) {
			$data = array(
						'key' 			=> $key, 
						'value'			=> $value,
						'directions'	=> $directions
					);
			
			$this->sys_config->Add($data);
			$this->Parames->redirect($this->Url);
		}
		
	}
	
	private function onSysConfigEdit($id) {
		$this->onCancel('');
		
		$key 			= $this->input->post('key', TRUE );
		$value 			= $this->input->post('value', TRUE );
		$directions 	= $this->input->post('directions', TRUE );
		if(strlen($key) != 0 && strlen($value) != 0) {
			$data = array(
						'key' 			=> $key, 
						'value'			=> $value,
						'directions'	=> $directions
					);
					
			$this->sys_config->Update($id, $data);
			$this->Parames->redirect($this->Url);
		}
		
	}
	
	public function ajaxSysSettingDel() {		
		$this->Parames->init('nav_account_ajaxSysSettingDel');
		
		$id = $this->input->post('uti', TRUE );
		if(!empty($id)) {
			$this->sys_config->Del($id);
		}
	}
	
	private function onACLAdd() {
		$this->onCancel('ACL/');
		
		$group 			= $this->input->post('group', TRUE );
		$access 		= $this->input->post('access', TRUE );
		$permission 	= $this->input->post('permission', TRUE );
		$publicPage 	= $this->input->post('publicPage', TRUE );
		
		if(!empty($group) && !empty($access) && !empty($permission) && isset($publicPage)) {
			if($publicPage == '0' || $publicPage == '1') {
				$data = array(
							'group' 		=> $group, 
							'access'		=> $access,
							'permission'	=> $permission,
							'publicPage'	=> $publicPage
						);
				
				$this->access_control_list->Add($data);
				$this->Parames->redirect($this->Url.'ACL/');
			}
		} 		
	}
	
	private function onACLEdit($id) {
		$this->onCancel('ACL/');
		
		$group 			= $this->input->post('group', TRUE );
		$access 		= $this->input->post('access', TRUE );
		$permission 	= $this->input->post('permission', TRUE );
		$publicPage 	= $this->input->post('publicPage', TRUE );
		
		if(!empty($group) && !empty($access) && !empty($permission) && isset($publicPage)) {
			if($publicPage == '0' || $publicPage == '1') {
				$data = array(
							'group' 		=> $group, 
							'access'		=> $access,
							'permission'	=> $permission,
							'publicPage'	=> $publicPage
						);
				
				$this->access_control_list->Add($data);
				$this->Parames->redirect($this->Url.'ACL/');
			}
		} 		
	}
	
	public function ajaxACLDel() {		
		$this->Parames->init('nav_account_ajaxACLDel');
		
		$id = $this->input->post('uti', TRUE );
		if(!empty($id)) {
			$this->access_control_list->Del($id);
		}
	}
}
/* End of file index.php */
/* Location: ./dealer/controllers/account/index.php */
















