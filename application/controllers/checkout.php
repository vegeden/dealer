<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Checkout extends CI_Controller {
	private $parames, $UserInfo;
	private $Url;
	
    function __construct() {
        parent::__construct();
		
		$this->load->model('Parames');
		$this->UserInfo = $this->Parames->getUserInfo();
		
		$this->Url = '/'.$this->lang->line('folder_name').'/'.strtolower(get_class($this)).'/';
		
		$this->load->model('db/items_information');
		$this->load->model('db/icash_deposit');
		$this->load->model('db/dividend');
    }	
	
	public function index() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_checkout_index');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		$this->parames['cart'] = $this->session->get('cart');
		$this->parames['sum']  = 0;
		$this->parames['freight']  = 0;
		$this->onIndex();
		if (!empty($this->parames['cart'])) {
			foreach($this->parames['cart'] as $key => $row)	{
				$this->parames['item'.$key] = array();
				$item = $this->items_information->SWhere($key);
				$item->row 	 			 = $row;
				$item->sell_price_sum 	 = $item->sell_price * $row;
				$this->parames['item'][] = $item;
				if($item->special_commodity_status == 1) {
					$this->parames['freight'] = $this->parames['freight'] + $item->freight_price;
				} else {
					$this->parames['freight'] = $this->parames['freight'] + 200;
				}
				$this->parames['sum'] = $this->parames['sum'] + ($item->sell_price * $row);
			}
		} else {
			$this->parames['error'] = $this->lang->line('checkout_Error_Session');
		}
		$data = array('freight_price'=> $this->parames['freight'],'item_price_sum'=> $this->parames['sum']);
		$this->session->set('sale_info',$data);
		$this->load->view('index', $this->parames);
	}
	
	public function classification() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_checkout_classification');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		$this->parames['cart'] 		= $this->session->get('cart');
		$this->parames['sale_info'] = $this->session->get('sale_info');
		$this->parames['userinfo']  = $this->session->get('UserInfo');
	
		$this->parames['icash_deposit_price'] 	 = $this->icash_deposit->deposit_price($this->parames['userinfo'] -> id);
		$this->parames['dividend_deposit_price'] = $this->dividend->deposit_price($this->parames['userinfo'] -> id);
		$this->onClassification();
		$this->load->view('index', $this->parames);
	}
	
	private function onIndex() {
		$cancel 		= $this->input->post('cancel', TRUE );
		$submit 		= $this->input->post('submit', TRUE ) ;
		$freight_user 	= $this->input->post('freight_user', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'../cart/');
		}
		if(strlen($submit)!=0) {
			if(strlen($freight_user)!=0) {
				$freight_name 		= $this->input->post('freight_name', TRUE );
				$freight_email 		= $this->input->post('freight_email', TRUE );
				$freight_phone 		= $this->input->post('freight_phone', TRUE );
				$freight_address 	= $this->input->post('freight_address', TRUE );
				
				if(strlen($freight_name) != 0 && strlen($freight_email) != 0 && strlen($freight_phone) != 0 && strlen($freight_address) != 0) {
					
					$data = array(
						'freight_name' 		=> $freight_name,
						'freight_email' 	=> $freight_email,
						'freight_phone' 	=> $freight_phone,
						'freight_address' 	=> $freight_address);
					$this->session->set('freight_info',$data);
					$this->Parames->redirect($this->Url.'classification');
					
				} else {
					$this->parames['error'] = $this->lang->line('checkout_Error_Input');
				}
			} else {
				$this->Parames->redirect($this->Url.'classification');
			}
		}
	}
	
	private function onClassification() {
		$cancel 		= $this->input->post('cancel', TRUE );
		$submit 		= $this->input->post('submit', TRUE ) ;		
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'../checkout/');
		}
		if(strlen($submit)!=0) {
			
		}
	}
}