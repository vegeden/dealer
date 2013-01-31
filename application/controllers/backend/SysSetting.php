<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SysSetting extends CI_Controller {
	private $parames, $UserInfo;
	private $Url;

    function __construct() {
        parent::__construct();
		
		$this->load->model('Parames');
		$this->UserInfo = $this->Parames->getUserInfo();
		
		$this->Url = '/'.$this->lang->line('folder_name').'/backend/'.strtolower(get_class($this)).'/';
		
		$this->load->model('db/SysConfig');
		
    }	
	
	public function index() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_SysSetting_index');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
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
}
/* End of file index.php */
/* Location: ./dealer/controllers/account/index.php */
















