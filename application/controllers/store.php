<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Store extends CI_Controller {
	private $parames, $UserInfo;
	private $Url;
	
    function __construct() {
        parent::__construct();
		
		$this->load->model('Parames');
		$this->UserInfo = $this->Parames->getUserInfo();
		
		$this->Url = '/'.$this->lang->line('folder_name').'/'.strtolower(get_class($this)).'/';
		
		$this->load->model('db/items_information');
    }	
	
	public function index() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_store_index');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		// print_r($this->parames);
		$this->parames['viewCount'] = 5;
		$this->parames['store'] 	= $this->items_information->SelectOnShell();
		$this->load->view('index', $this->parames);
	}
	
	public function commodity($id) {
		if(empty($id)) $this->Parames->redirect($this->Url);
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_store_commodity');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		$this->parames['commodity'] = $this->items_information->SWhere($id);
		$this->load->view('index', $this->parames);
		
	}
}