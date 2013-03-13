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
		$this->load->model('db/items_category_second');
    }	
	
	public function index($category = '',$category_second = '') {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_store_index');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		$this->parames['viewCount'] = 4;		
		if(!empty($category) && empty($category_second)){
			$this->parames['store_level'] = 1;
			$this->parames['category_second'] = $this->items_category_second->SWhereCategory($category);
			// $this->parames['store'] 	= $this->items_information->SelectOnShell($category);
			foreach($this->parames['category_second']->result() as $key => $row) {
				$this->parames['store'.$row->id] = $this->items_information->SelectOnShell($category,$row->id,$this->parames['store_level']);
			}
		} else if(!empty($category) && !empty($category_second)){			
			$this->parames['store_level'] = 2;
			$this->parames['store'] 	= $this->items_information->SelectOnShell($category,$category_second,$this->parames['store_level']);
		} else {
			$this->parames['store_level'] = 0;
			$this->Parames->redirect('/dealer/');
		}
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