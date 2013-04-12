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
		// $this->load->model('db/sale');
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
		onareaAddEdit
		if (!empty($this->parames['cart'])) {
			foreach($this->parames['cart'] as $key => $row)	{
				$this->parames['item'.$key] = array();
				$item = $this->items_information->SWhere($key);
				array_push($this->parames['item'.$key], $item->id);
				// array_push($this->parames['item'.$key], $item->freight_price);
				array_push($this->parames['item'.$key], $item->item_name);
				array_push($this->parames['item'.$key], $item->special_commodity_status);
				array_push($this->parames['item'.$key], $row);
				array_push($this->parames['item'.$key], $item->sell_price);
				array_push($this->parames['item'.$key], ($item->sell_price * $row));
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
		$this->load->view('index', $this->parames);
	}
	
	public function type() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_checkout_type');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		$this->parames['cart'] = $this->session->get('cart');
		$this->load->view('index', $this->parames);
	}
	
	private function onindex($id='') {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'dealer/cart/');
		}
		
		$areaName 	= $this->input->post('areaName', TRUE );
		
		if($this->input->post('add', TRUE ) == 'add' || $this->input->post('edit', TRUE ) == 'edit') {
			if(strlen($areaName) != 0) {
			$data = array('area_Name' =>$areaName);
				if(strlen($id)==0) {
					if($this->items_area->verify($areaName)) {
						$this->items_area->Add($data);
						$this->Parames->redirect($this->Url.'areaList/');
					} else {
						$this->parames['error'] = $this->lang->line('commodity_areaAdd_ErrorMsg');
					}
				} else {
					$this->items_area->Update($id, $data);
					$this->Parames->redirect($this->Url.'areaList/');
				}
			} else {
				$this->parames['error'] = $this->lang->line('commodity_error_incomplete');
			}
		}
	}
	
}