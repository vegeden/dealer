<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Storedvalue extends CI_Controller {
	private $parames, $UserInfo;
	private $Url;
	
    function __construct() {
        parent::__construct();
		
		$this->load->model('Parames');
		$this->UserInfo = $this->Parames->getUserInfo();
		
		$this->Url = '/'.$this->lang->line('folder_name').'/'.strtolower(get_class($this)).'/';
		
		$this->load->model('db/icash_apply');
    }	
	
	public function index() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_storedvalue_index');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		$this->onIndex();
		$this->load->view('index', $this->parames);
	}
	
	public function apply() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_storedvalue_apply');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		$this->onApply();
		$this->load->view('index', $this->parames);
	}
	
	private function onIndex() {
		$cancel = $this->input->post('cancel', TRUE );
		$apply 	= $this->input->post('apply', TRUE );
		if(strlen($cancel)!= 0) $this->Parames->redirect('/'.$this->lang->line('folder_name'));
		if(strlen($apply)!= 0) 	$this->Parames->redirect($this->Url.'apply/');
	}
	
	private function onApply() {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!= 0) $this->Parames->redirect('/'.$this->lang->line('folder_name'));
		
		$pay_kind 	= $this->input->post('pay_kind', TRUE );
		$last5Num 	= $this->input->post("last5Num$pay_kind", TRUE );
		$name 		= $this->input->post("name$pay_kind", TRUE );
		$price 		= $this->input->post("price$pay_kind", TRUE );
		if(isset($pay_kind) && isset($last5Num) && isset($name) && isset($price)) {
			if(strlen($pay_kind) > 0 && strlen($last5Num) > 0 && strlen($name) > 0 && strlen($price) > 0 ) {
				$data = array(
								'user_id' 			=> $this->UserInfo->id, 
								'apply_status'		=> $pay_kind,
								'bank_num' 			=> $last5Num,
								'apply_name' 		=> $name, 								
								'apply_price' 		=> $price, 
								'apply_datetime' 	=> date(DateTime::ATOM, time())
							);
				$this->icash_apply->Add($data);
			}
		}
	}
}





