<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	private $parames, $UserInfo;
	private $Url;
	
    function __construct() {
        parent::__construct();
		
		$this->load->model('Parames');
		$this->UserInfo = $this->Parames->getUserInfo();
		
		$this->Url = '/'.$this->lang->line('folder_name').'/'.strtolower(get_class($this)).'/';
		
		$this->load->helper(array('form', 'url'));

		$this->load->library('form_validation');
    }	
	
	public function index() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_account_lists');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
	}
	
	public function logout() {
		$this->session->_destroy();
		$this->Parames->redirect('/'.$this->lang->line('folder_name'));
	}
}