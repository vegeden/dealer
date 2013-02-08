<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
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
		$this->Parames->init('nav_cart_index');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		$cart = $this->session->get('cart');
		$this->parames['cart'] = $cart;
		$this->parames['items_information'] = $this->items_information->SWheres($cart);
		
		$this->load->view('index', $this->parames);
	}
	
	public function add() {
		$id		= $this->input->post('i', TRUE);
		$count 	= $this->input->post('c', TRUE);

		if(!empty($id)) {
			if(!$this->session->get('cart')) {
				$cart[$id] = 1;
			} else {
				$cart = $this->session->get('cart');
				if(isset($cart[$id]) && !empty($count)) {
					$cart[$id] = $count;
				} else if(isset($cart[$id])) {
					$cart[$id]++;
				} else {
					$cart[$id] = 1;
				}
			}
			$this->session->set('cart', $cart);
		}
	}
	
	public function remove() {
		$id	= $this->input->post('i', TRUE);
		if(!empty($id)) {
			$cart = $this->session->get('cart');
			unset($cart[$id]);
			$this->session->set('cart', $cart);
		}
	}
}









