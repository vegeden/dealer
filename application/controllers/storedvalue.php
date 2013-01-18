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
		$this->load->model('db/icash_deposit');
		$this->load->model('db/icash_log');
		$this->load->model('pages');
    }	
	
	public function CountLists($kind=0, $page=1) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_storedvalue_CountLists');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		
		$this->parames['kind'] = $kind;
		$count = $this->icash_apply->SelectCount($this->UserInfo->id, $kind);
		$limit = $this->pages->init($count, $page);
		$this->parames['icash_apply'] 	= $this->icash_apply->SelectList($this->UserInfo->id, $kind, $limit);
		
		$this->parames['page_TotalPageNum'] = $this->pages->getTotalPageNum();
		$this->parames['page_previous'] 	= $this->pages->getPrevious();
		$this->parames['page_next'] 		= $this->pages->getNext();
		$this->load->view('index', $this->parames);
	}
	
	public function apply() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_storedvalue_apply');
		$this->parames = $this->Parames->getParams();
		/*	-------------------------------------------	*/
		
		$this->parames['method'] = array($this->lang->line('storedvalue_method_ATM'), $this->lang->line('storedvalue_method_CreditCard'));
		
		$this->onApply();
		$this->load->view('index', $this->parames);
	}
	
	public function log($page=1) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_storedvalue_log');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$count = $this->icash_log->SelectCount($this->UserInfo->id);
		$limit = $this->pages->init($count, $page);
		$this->parames['icash_log'] 	= $this->icash_log->SelectList($this->UserInfo->id, $limit);
		
		$this->parames['page_TotalPageNum'] = $this->pages->getTotalPageNum();
		$this->parames['page_previous'] 	= $this->pages->getPrevious();
		$this->parames['page_next'] 		= $this->pages->getNext();
		$this->load->view('index', $this->parames);
		
	}
	
	private function verifyRemittance_status($id) {
		$remittance_status;
		$query = $this->icash_apply->Select($id);
		if($query->num_rows() > 0 ) {
			foreach($query->result() as $row) {
				$remittance_status = $row->remittance_status;
				break;
			}
		}
		return $remittance_status;
	}
	
	private function onApply() {
		$this->onCancel('profiles/');
		
		$pay_kind 	= $this->input->post('pay_kind', TRUE );
		$last5Num 	= $this->input->post('last5Num', TRUE );
		$name 		= $this->input->post('name', TRUE );
		$price 		= $this->input->post('price', TRUE );
		if(isset($pay_kind) && isset($last5Num) && isset($name) && isset($price)) {
			if(strlen($pay_kind) > 0 && strlen($last5Num) > 0 && strlen($name) > 0 && strlen($price) > 0 ) {
				$data = array(
								'user_id' 			=> $this->UserInfo->id, 
								'bank_num' 			=> $last5Num,
								'apply_name' 		=> $name, 								
								'apply_price' 		=> $price, 
								'apply_datetime' 	=> date(DateTime::ATOM, time())
							);
				$this->icash_apply->Add($data);
			}
		}
	}
	
	private function onCancel($redirectUrl) {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!= 0) {
			$this->Parames->redirect($this->Url.$redirectUrl);
		}
	}
	
	public function ajaxSetStatus() {
		$this->Parames->init('nav_storedvalue_ajaxSetStatus');
		$id 	= $this->input->post('i', TRUE );
		$status = $this->input->post('st', TRUE );
		if( strlen($id) != 0 && strlen($status) != 0 ) {
			
			$remittance_status = $this->verifyRemittance_status($id);
			
			// 只有在 remittance_status 狀態為1時才能修改
			if($remittance_status == 0) {
				/**		chage status 	**/
				$data = array(
						'remittance_status' => $status,
						'admin_id' 			=> $this->UserInfo->id,
						'audit_datetime' 	=> date(DateTime::ATOM, time())
				);
				$this->icash_apply->Update($id, 0, $data);
				
				/**		Update storedvalue	**/
				$result ;
				$query = $this->icash_apply->Select($id);
				if($query->num_rows() > 0 ) {
					foreach($query->result() as $row) {
						$result = $row;
						break;
					}
				}
				
				if($status == 1) 
					$this->icash_deposit->Save($result->user_id, $result->apply_price);
				
				$action = $status == 1 ? 1 : 3;
				/**		Save Log 	**/
				$data = array(
						'admin_id' 			=> $this->UserInfo->id,
						'user_id' 			=> $result->user_id,
						'action' 			=> $action,
						'price' 			=> $result->apply_price,
						'log_datetime' 		=> date(DateTime::ATOM, time()
						)
				);

				$this->icash_log->Add($data);
				// EMail 尚未處理(思考中)
			} else {
				json_encode(array('status'=>'4000'));
			}
		}
	}
	
	public function ajaxCancel() {
		$this->Parames->init('nav_storedvalue_ajaxCancel');
		$id = $this->input->post('i', TRUE );
		
		$remittance_status = $this->verifyRemittance_status($id);
		if($remittance_status == 0) {
			if( isset($id) ) {
				if( strlen($id) != 0 ) {
					$data = array(
								'remittance_status' => 2
							);
							
					$this->icash_apply->Update($id, $this->UserInfo->id, $data);
					
					/**		Update storedvalue	**/
					$result ;
					$query = $this->icash_apply->Select($id);
					if($query->num_rows() > 0 ) {
						foreach($query->result() as $row) {
							$result = $row;
							break;
						}
					}
					$this->icash_deposit->Save($result->user_id, $result->apply_price);
					
					/**		Save Log 	**/
					$data = array(
							'admin_id' 			=> $this->UserInfo->id,
							'user_id' 			=> $result->user_id,
							'action' 			=> 3,
							'price' 			=> $result->apply_price,
							'log_datetime' 		=> date(DateTime::ATOM, time()
							)
					);

					$this->icash_log->Add($data);
				}
			}
		}
	}
	
	public function ajaxFindBankCode() {
		$this->Parames->init('nav_storedvalue_ajaxFindBankCode');
		$result['count'] = 0;
		$kind 		= $this->input->post('k', TRUE );
		$bank_num 	= $this->input->post('bn', TRUE );
		if( strlen($kind) != 0 && strlen($bank_num) != 0 ) {
			$query = $this->icash_apply->FindBankCode($kind, $bank_num);
		}
		if($query->num_rows > 0) {
			$result['count'] = 1;
			foreach($query->result() as $row) {
				$result['icash_apply'][] = $row;
			}
		}
		echo json_encode($result);
	}
	
	public function ajaxGetLang() {
		$this->Parames->init('nav_storedvalue_ajaxGetLang');
		echo json_encode($this->lang);
	}
}





