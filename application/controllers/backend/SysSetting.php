<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SysSetting extends CI_Controller {
	private $parames, $UserInfo;
	private $Url;

    function __construct() {
        parent::__construct();
		
		$this->load->model('Parames');
		$this->UserInfo = $this->Parames->getUserInfo();
		
		$this->Url = '/'.$this->lang->line('folder_name').'/backend/'.get_class($this).'/';
		
		$this->load->model('db/SysConfig');
		
    }	
	
	public function index() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_SysSetting_index');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->parames['SysConfig'] = $this->SysConfig->Select();
		
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
		$this->parames['SysConfig'] = $this->SysConfig->SWhere($id);
		
		
		$this->load->view('backend', $this->parames);
	}

	public function ACL() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_SysSetting_ACL');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
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
			
			$this->SysConfig->Add($data);
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
					
			$this->SysConfig->Update($id, $data);
			$this->Parames->redirect($this->Url);
		}
		
	}
	
	public function ajaxSysSettingDel() {		
		$this->Parames->init('nav_account_ajaxSysSettingDel');
		
		$id = $this->input->post('uti', TRUE );
		if(!empty($id)) {
			$this->SysConfig->Del($id);
		}
	}
}
/* End of file index.php */
/* Location: ./dealer/controllers/account/index.php */
















