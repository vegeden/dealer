<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {
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
		$this->Parames->init('nav_Cart_index');
		$this->parames = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		$this->parames['cart'] = $this->session->get('cart');
		$this->load->view('index', $this->parames);
	}
	
	public function add() {
		$id	= $this->input->post('i', TRUE);
		if(!empty($id)) {
			if(!$this->session->get('cart')) {
				$cart = array();
				$cart['id'] = array($id);
				
			} else {
				$cart = $this->session->get('cart');
				if(!in_array($id, $cart['id'])) {
					array_push($cart['id'], $id);
				}
			}
			$this->session->set('cart', $cart);
		}
	}
	
	public function remove() {
		$id	= $this->input->post('i', TRUE);
		if(!empty($id)) {
			$cart = $this->session->get('cart');
			array_splice($cart['id'], array_search($id, $cart['id']), 1);
			$this->session->set('cart', $cart);
		}
	}
}









