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
		$this->load->model('pages');
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
	
	public function lists($page=1) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_storedvalue_lists');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$count = $this->icash_apply->SelectCount($this->UserInfo->id);
		$limit = $this->pages->init($count, $page);
		$this->parames['icash_apply'] 	= $this->icash_apply->SelectList($this->UserInfo->id, $limit);
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
		
		$submit = $this->input->post('submit', TRUE );
		if(!empty($submit)) {
			$pay_kind 	= $this->input->post('pay_kind', TRUE );
			$last5Num 	= $this->input->post("last5Num$pay_kind", TRUE );
			$name 		= $this->input->post("name$pay_kind", TRUE );
			$price 		= $this->input->post("price$pay_kind", TRUE );
			
			if(!empty($pay_kind) && !empty($last5Num) && !empty($name) && !empty($price)) {
				if(strlen($last5Num) != 5) {
					$this->parames['error'] = $this->lang->line('storedvalue_Error_most500');
				} else if($price < 500) {
					$this->parames['error'] = $this->lang->line('storedvalue_Error_most500');
				} else {
					$data = array(
									'user_id' 			=> $this->UserInfo->id, 
									'apply_status'		=> $pay_kind,
									'bank_num' 			=> $last5Num,
									'apply_name' 		=> $name, 								
									'apply_price' 		=> $price, 
									'apply_datetime' 	=> date(DateTime::ATOM, time())
								);
					$this->icash_apply->Add($data);
					$this->Parames->redirect($this->Url.'lists/');
				}
			} else {
				$this->parames['error'] = $this->lang->line('storedvalue_Error_message');
			}
		}
	}
}





