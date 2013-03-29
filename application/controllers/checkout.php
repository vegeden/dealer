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
	
}