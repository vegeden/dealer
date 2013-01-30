<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {
	private $parames, $UserInfo;
	private $Url;
	
    function __construct() {
        parent::__construct();
		
		$this->load->model('Parames');
		$this->UserInfo = $this->Parames->getUserInfo();
		
		$this->Url = '/'.$this->lang->line('folder_name').'/'.strtolower(get_class($this)).'/';
		

    }	
	
	public function index() {
		/*	-------------------------------------------	*/
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->load->view('index', $this->parames);
	}
	
	public function logout() {
		$this->session->_destroy();
		$this->Parames->redirect('/'.$this->lang->line('folder_name'));
	}
}