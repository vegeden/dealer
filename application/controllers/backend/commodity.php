<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commodity extends CI_Controller {
	private $parames, $UserInfo;
	private $Url;

    function __construct() {
        parent::__construct();
		
		$this->load->model('Parames');
		$this->UserInfo = $this->Parames->getUserInfo();
		
		$this->Url = '/'.$this->lang->line('folder_name').'/backend/'.strtolower(get_class($this)).'/';
		
		$this->load->model('db/items_area');
		$this->load->model('db/items_bread');
		$this->load->model('db/items_category');
		$this->load->model('db/items_category_second');
		$this->load->model('db/items_information');
		$this->load->model('db/items_purchase');
		$this->load->model('db/items_stock');
		$this->load->model('pages');
		
		$this->load->helper('url');
		$this->load->helper('form');
    }	
	
	public function index() {
	
	}

	/* area */
	public function areaList($page=0) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_areaList');
		$this->parames		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$count	=	$this->items_area->SelectCount();
		$limit	=	$this->pages->init($count, $page);
		$this->parames['Items_area'] 		= $this->items_area->Select($limit);
		
		$this->parames['page_TotalPageNum']	= $this->pages->getTotalPageNum();
		$this->parames['page_previous']		= $this->pages->getPrevious();
		$this->parames['page_next']			= $this->pages->getNext();
		
		$this->load->view('backend', $this->parames);
	}
	
	public function areaAdd() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_areaAdd');
		$this->parames		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->onareaAddEdit();
		
		$this->load->view('backend', $this->parames);
	}
	
	public function areaEdit($items_area_id) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_areaEdit');
		$this->parames		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->onareaAddEdit($items_area_id);
		$this->parames['query'] = $this->items_area->SWhere($items_area_id);
		
		$this->load->view('backend', $this->parames);
	}	
	
	public function areaDel() {
		$this->Parames->init('nav_commodity_areaDel');
		
		$items_area_id = $this->input->post('uti', TRUE );
		$item_count	   = $this->items_area->DelCheck($items_area_id);
		$item_arr	   = Array('item_count' => $item_count);
		
		if(isset($items_area_id)) {
			if(strlen($items_area_id) != 0) {
				if($item_count == 0){
					$this->items_area->Del($items_area_id);
				}
			}
		}
		echo json_encode($item_arr);
	}	
	
	/* bread */
	public function breadList($page=0) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_breadList');
		$this->parames 		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$count = $this->items_bread->SelectCount();
		$limit = $this->pages->init($count, $page);
		$this->parames['Items_bread']		= $this->items_bread->Select($limit);
		
		$this->parames['page_TotalPageNum'] = $this->pages->getTotalPageNum();
		$this->parames['page_previous']		= $this->pages->getPrevious();
		$this->parames['page_next']			= $this->pages->getNext();
		
		$this->load->view('backend', $this->parames);
	}
	
	public function breadAdd() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_breadAdd');
		$this->parames		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->onbreadAddEdit();
		
		$this->load->view('backend', $this->parames);
	}
	
	public function breadEdit($items_bread_id) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_breadEdit');
		$this->parames		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->onbreadAddEdit($items_bread_id);
		$this->parames['query'] = $this->items_bread->SWhere($items_bread_id);
		
		$this->load->view('backend', $this->parames);
	}	
	
	public function breadDel() {
		$this->Parames->init('nav_commodity_breadDel');
		
		$items_bread_id = $this->input->post('uti', TRUE );
		$item_count		= $this->items_bread->DelCheck($items_bread_id);
		$item_arr		= Array('item_count' => $item_count);
		
		if(isset($items_bread_id)) {
			if(strlen($items_bread_id)!=0){
				if($item_count == 0){
					$this->items_bread->Del($items_bread_id);
				}
			}
		}
		echo json_encode($item_arr);
	}	
	
	/* category */
	public function categoryFirstList($page=0) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_categoryFirstList');
		$this->parames 		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$count = $this->items_category->SelectCount();
		$limit = $this->pages->init($count, $page);
		$this->parames['Items_category']	= $this->items_category->Select($limit);		
		$this->parames['page_TotalPageNum'] = $this->pages->getTotalPageNum();
		$this->parames['page_previous']		= $this->pages->getPrevious();
		$this->parames['page_next']			= $this->pages->getNext();
		
		$this->load->view('backend', $this->parames);
	}	
	
	public function categoryFirstAdd() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_categoryFirstAdd');
		$this->parames		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->onCategoryFirstAddEdit();
		
		$this->load->view('backend', $this->parames);
	}	
	
	public function categoryFirstEdit($items_category_id) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_categoryFirstEdit');
		$this->parames		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->onCategoryFirstAddEdit($items_category_id);
		$this->parames['query'] = $this->items_category->SWhere($items_category_id);
		
		$this->load->view('backend', $this->parames);
	}	
	
	public function categoryFirstDel() {
		$this->Parames->init('nav_commodity_categoryFirstDel');
		$items_category_id	   = $this->input->post('uti', TRUE );
		$cotegory_second_count = $this->items_category->DelCheck($items_category_id);
		$cotegory_second_arr   = Array('cotegory_second_count' => $cotegory_second_count);
		if(isset($items_category_id)) {//&& $cotegory_second_count == 0
			if(strlen($items_category_id)!=0){
				if($cotegory_second_count == 0){
					$this->items_category->Del($items_category_id);		
				}
			}
		}
		echo json_encode($cotegory_second_arr);
	}
	
	/* Category Second */
	public function categorySecondList($page=0) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_categorySecondList');
		$this->parames		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$count = $this->items_category_second->SelectCount();
		$limit = $this->pages->init($count, $page);
		
		$this->parames['Items_category_second'] = $this->items_category_second->Select($limit);
		$this->parames['page_TotalPageNum']		= $this->pages->getTotalPageNum();
		$this->parames['page_previous']			= $this->pages->getPrevious();
		$this->parames['page_next']				= $this->pages->getNext();
		
		$this->load->view('backend', $this->parames);
	}	
	
	public function categorySecondAdd() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_categorySecondAdd');
		$this->parames		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->parames['CategoryList'] = $this->items_category->SelectCategory();
		$this->onCategorySecondAddEdit();
		
		$this->load->view('backend', $this->parames);
	}	
	
	public function categorySecondEdit($items_category_second_id) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_categorySecondEdit');
		$this->parames		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->parames['query']		   = $this->items_category_second->SWhere($items_category_second_id);
		$this->parames['CategoryList'] = $this->items_category->SelectCategory();
		
		$this->onCategorySecondAddEdit($items_category_second_id);
		
		$this->load->view('backend', $this->parames);
	}	
	
	public function categorySecondDel() {
		$this->Parames->init('nav_commodity_categorySecondDel');
		
		$items_category_second_id = $this->input->post('uti', TRUE );
		$information_count		  = $this->items_category_second->DelCheck($items_category_second_id);
		$information_arr		  = Array('information_count' => $information_count);
		
		if(isset($items_category_second_id)) {
			if(strlen($items_category_second_id)!=0){
				if($information_count == 0) {
					$this->items_category_second->Del($items_category_second_id);
				}
			}
		}
		echo json_encode($information_arr);
	}
	
	/* items */
	public function itemList($page=0) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_itemList');
		$this->parames 		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$count = $this->items_information->SelectCount();
		$limit = $this->pages->init($count, $page);
		$this->parames['Items_information'] = $this->items_information->Select($limit);
		
		$this->parames['page_TotalPageNum'] = $this->pages->getTotalPageNum();
		$this->parames['page_previous'] 	= $this->pages->getPrevious();
		$this->parames['page_next'] 		= $this->pages->getNext();
		
		$this->load->view('backend', $this->parames);
	}
	
	public function itemAdd() {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_itemAdd');
		$this->parames 		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->parames['BreadList']          = $this->items_bread->SelectBread();
		$this->parames['AreaList']           = $this->items_area->SelectArea();
		$this->parames['CategorySecondList'] = $this->items_category_second->SelectCategorySecond();
		$this->onitemAddEdit();
		
		$this->load->view('backend', $this->parames);
	}
	
	public function itemEdit($items_id) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_itemEdit');
		$this->parames 		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->parames['AreaList']			 = $this->items_area->SelectArea();
		$this->parames['BreadList']			 = $this->items_bread->SelectBread();
		$this->parames['CategorySecondList'] = $this->items_category_second->SelectCategorySecond();
		$this->parames['query']				 = $this->items_information->SWhere($items_id);
		$this->onitemAddEdit($items_id);
		$this->load->view('backend', $this->parames);
	}	
	
	public function itemDel() {
		$this->Parames->init('nav_commodity_itemDel');
		
		$items_id	= $this->input->post('uti', TRUE );
		$sale_count = $this->items_information->DelCheck($items_id);
		$sale_arr	= Array('sale_count' => $sale_count);
		
		if(isset($items_id)) {
			if(strlen($items_id)!=0){
				if($sale_count == 0){
					$this->items_information->Del($items_id);
				}
			}
		}
		echo json_encode($sale_arr);
	}		
	
	/* invoicing */
	public function invoicingLog($kind=0, $page=1) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_invoicingLog');
		$this->parames		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->parames['kind'] = $kind;
		if($kind == 0) { 
			$count = $this->items_purchase->SelectCount();
			$limit = $this->pages->init($count, $page);
			$this->parames['items_purchase_stock'] = $this->items_purchase->Select($limit);
			
			$this->parames['page_TotalPageNum']	   = $this->pages->getTotalPageNum();
			$this->parames['page_previous']		   = $this->pages->getPrevious();
			$this->parames['page_next']			   = $this->pages->getNext();
			$this->load->view('backend', $this->parames);
		} else if($kind == 1) { 
			$count = $this->items_stock->SelectCount();
			$limit = $this->pages->init($count, $page);
			$this->parames['items_purchase_stock'] = $this->items_stock->Select($limit);
			
			$this->parames['page_TotalPageNum']	   = $this->pages->getTotalPageNum();
			$this->parames['page_previous']		   = $this->pages->getPrevious();
			$this->parames['page_next']			   = $this->pages->getNext();
			$this->load->view('backend', $this->parames);
		} else { 
			show_404();
		}
	}	
	
	public function invoicingEditAdd($items_id) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_invoicingEditAdd');
		$this->parames 		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->parames['itemList'] = $this->items_information->SWhere($items_id);
		
		$stock_quantity = $this->parames['itemList']->stock_quantity;
		$user_id        = $this->parames['UserInfo']->id;
		$this->oninvoicingEditAdd($items_id,$stock_quantity,$user_id);
		
		$this->load->view('backend', $this->parames);
	}
	
	/* shelves */
	public function shelvesList($kind=0, $page=1) {
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_shelvesList');
		$this->parames		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$count = $this->items_information->SelectCountWhere($kind);
		$limit = $this->pages->init($count, $page);
		$this->parames['kind'] = $kind;
		if($kind == 0) { 
			$this->parames['items_information_shelvers'] = $this->items_information->SelectShelves($limit,$kind);
			
			$this->parames['page_TotalPageNum'] = $this->pages->getTotalPageNum();
			$this->parames['page_previous']		= $this->pages->getPrevious();
			$this->parames['page_next']			= $this->pages->getNext();
			$this->load->view('backend', $this->parames);
		} else if($kind == 1) { 
			$this->parames['items_information_shelvers'] = $this->items_information->SelectShelves($limit,$kind);
			
			$this->parames['page_TotalPageNum'] = $this->pages->getTotalPageNum();
			$this->parames['page_previous']		= $this->pages->getPrevious();
			$this->parames['page_next']			= $this->pages->getNext();
			$this->load->view('backend', $this->parames);
		} else { 
			show_404();
		}
	}	
	
	public function shelvesEditAdd($items_id) {
	
		$config['upload_path']	 = './statics/img_commodity/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']		 = '0';
		$config['max_width']	 = '0';
		$config['max_height']	 = '0';
		$this->load->library('upload',$config);
		
		/*	-------------------------------------------	*/
		$this->Parames->init('nav_commodity_shelvesEditAdd');
		$this->parames		  = $this->Parames->getParams();
		$this->parames['url'] = $this->Url.__FUNCTION__.'/';
		/*	-------------------------------------------	*/
		
		$this->parames['itemList']		  = $this->items_information->SWhere($items_id);
		$this->parames['item_image_info'] = explode(',',$this->parames['itemList']->item_image);
		
		$stop_sale_status = $this->parames['itemList']->stop_sale_status;	
		
		if ($this->upload->do_upload()) {
			$image_file =$this->upload->data();
			$item_image = base_url().'statics/img_commodity/'.$image_file['file_name'].','.$image_file['image_width'].','.$image_file['image_height'];
			$this->onshelvesEditAdd($items_id,$item_image);
		} else {
			$this->onshelvesEditAdd($items_id,$this->parames['itemList']->item_image);
		}
		$this->load->view('backend', $this->parames);
	}	
	
	/* Action on Click */	
	/* area on */
	private function onareaAddEdit($id='') {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'areaList/');
		}
		
		$areaName 	= $this->input->post('areaName', TRUE );
		
		if(isset($areaName)) {
			if(strlen($areaName) != 0)
				if($this->items_area->verify($areaName)) {
					$data = array('area_Name' =>$areaName);
					
					if(strlen($id)==0) {
						// Add level
						$this->items_area->Add($data);
					} else {
						// Edit level
						$this->items_area->Update($id, $data);
					}
					$this->Parames->redirect($this->Url.'areaList/');
				} else {
					$this->parames['error'] = "";
				}
		}
	}	
	
	/* bread on */
	private function onbreadAddEdit($id='') {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'breadList/');
		}
		
		$breadName 	= $this->input->post('breadName', TRUE );
		
		if(isset($breadName)) {
			if(strlen($breadName) != 0)
				if($this->items_area->verify($breadName)) {
					$data = array('bread_Name' =>$breadName);
					
					if(strlen($id)==0) {
						// Add level
						$this->items_bread->Add($data);
					} else {
						// Edit level
						$this->items_bread->Update($id, $data);
					}
					$this->Parames->redirect($this->Url.'breadList/');
				} else {
					$this->parames['error'] = "";
				}
		}
	}
	
	/* Category First on */
	private function onCategoryFirstAddEdit($id='') {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'categoryFirstList/');
		}
		
		$categoryName = $this->input->post('categoryName', TRUE );
		
		if(isset($categoryName)) {
			if(strlen($categoryName) != 0)
				if($this->items_category->verify($categoryName)) {
					$data = array('category_Name' =>$categoryName);
					
					if(strlen($id)==0) {
						// Add level
						$this->items_category->Add($data);
					} else {
						// Edit level
						$this->items_category->Update($id, $data);
					}
					$this->Parames->redirect($this->Url.'categoryFirstList/');
				} else {
					$this->parames['error'] = "";
				}
		}
	}	
	
	/* Category Second on */
	private function onCategorySecondAddEdit($id='') {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'categorySecondList/');
		}
		$user_id = $this->parames['UserInfo']->id;
		$categorySecondName = $this->input->post('categorySecondName', TRUE );
		$category_class		= $this->input->post('category_class', TRUE );
		
		if(isset($categorySecondName) && isset($category_class)) {
			if(strlen($categorySecondName) != 0 && strlen($category_class) != 0)
				if($this->items_category_second->verify($categorySecondName,$category_class)) {
					$data = array('category_second_Name' =>$categorySecondName, 'category' =>$category_class);
					
					if(strlen($id)==0) {
						// Add level
						$this->items_category_second->Add($data);
					} else {
						// Edit level
						$this->items_category_second->Update($id, $data);
					}
					$this->Parames->redirect($this->Url.'categorySecondList/');
				} else {
					$this->parames['error'] = "";
				}
		}
	}	
	
	/* item on */
	private function onitemAddEdit($id='') {
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'itemList/');
		}
		
		$item_name			   = $this->input->post('item_name', TRUE );
		$item_number		   = $this->input->post('item_number', TRUE );
		$buy_price			   = $this->input->post('buy_price', TRUE );
		$sell_price			   = $this->input->post('sell_price', TRUE );
		$safe_stock			   = $this->input->post('safe_stock', TRUE );
		$bread_class		   = $this->input->post('bread_class', TRUE );
		$stock_quantity		   = $this->input->post('stock_quantity', TRUE );
		$item_bonus			   = $this->input->post('item_bonus', TRUE );
		$area_class			   = $this->input->post('area_class', TRUE );
		$category_second_class = $this->input->post('category_second_class', TRUE );
		$freight_price		   = $this->input->post('freight_price', TRUE );
		$special_status		   = 0;
		if($this->input->post('special_status', TRUE )) {
			$special_status = 1;
		}
		
		if(strlen($id)==0) {
			if(isset($item_name) && isset($item_number) && isset($buy_price) && isset($sell_price) 
			&& isset($safe_stock) && isset($bread_class) && isset($stock_quantity) && isset($item_bonus) 
			&& isset($area_class) && isset($category_second_class) && isset($freight_price)) {
				if(strlen($item_name) != 0 && strlen($item_number) != 0 && strlen($buy_price) != 0 && strlen($sell_price) != 0 
				&& strlen($safe_stock) != 0 && strlen($bread_class) != 0 && strlen($stock_quantity) != 0 && strlen($item_bonus) != 0 
				&& strlen($area_class) != 0 && strlen($category_second_class) != 0 && strlen($freight_price) != 0)
				{
					$data = array(
					'item_name'				=> $item_name,
					'item_number'			=> $item_number,
					'buy_price'				=> $buy_price,
					'sell_price'			=> $sell_price,
					'safe_stock'			=> $safe_stock,
					'bread_id'				=> $bread_class,
					'stock_quantity'		=> $stock_quantity,
					'item_bonus'			=> $item_bonus,
					'area_id'				=> $area_class,
					'category_second_id'	=> $category_second_class,
					'freight_price'			=> $freight_price,
					'special_status'		=> $special_status);
				
					if($this->items_information->verify($item_name)) {

						$this->items_information->Add($data);
						$this->Parames->redirect($this->Url.'itemList/');
					} else {
						$this->parames['error'] = "";
					}
				}
			}
		} else {
			if(isset($item_name) && isset($item_number) && isset($buy_price) && isset($sell_price) 
			&& isset($safe_stock) && isset($bread_class) && isset($item_bonus) && isset($area_class) 
			&& isset($category_second_class) && isset($freight_price) ) {
				if(strlen($item_name) != 0 && strlen($item_number) != 0 && strlen($buy_price) != 0 && strlen($sell_price) != 0 
				&& strlen($safe_stock) != 0 && strlen($bread_class) != 0 && strlen($item_bonus) != 0 && strlen($area_class) != 0 
				&& strlen($category_second_class) != 0 && strlen($freight_price) != 0 )
				{
					$data = array(
					'item_name'				=> $item_name,
					'item_number'			=> $item_number,
					'buy_price'				=> $buy_price,
					'sell_price'			=> $sell_price
					,'safe_stock'			=> $safe_stock,
					'bread_id'				=> $bread_class,
					'item_bonus'			=> $item_bonus,
					'area_id'				=> $area_class
					,'category_second_id'	=> $category_second_class,
					'freight_price'			=> $freight_price,
					'special_status'		=> $special_status);
				
					$this->items_information->Update($id, $data);
					$this->Parames->redirect($this->Url.'itemList/');
				}
			}
		}
	}
	
	/* invoicingEditAdd on */
	private function oninvoicingEditAdd($item_id,$stock_quantity,$user_id) {
	
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'itemList/');
		}
		
		$invoicing_status = $this->input->post('invoicing_status', TRUE );
		
		switch($invoicing_status){
			case 0:
				$stock_purchase_quantity = $this->input->post('stock_purchase_quantity', TRUE );
				$total_quantity = $stock_purchase_quantity+$stock_quantity;
				
				if(isset($stock_purchase_quantity)) {
					if(strlen($stock_purchase_quantity) != 0)
					{
						$data = array(
						'item_id'			=> $item_id,
						'original_quantity' => $stock_quantity,
						'purchase_quantity' => $stock_purchase_quantity,
						'total_quantity'	=> $total_quantity,
						'user_id'			=> $user_id,
						'ip'				=> $this->input->ip_address(),
						'datetime'			=> date(DateTime::ATOM, time()));
						
						$data_items = array('stock_quantity' => $total_quantity);
						
						$this->items_purchase->Add($data);
						$this->items_information->Update($item_id, $data_items);
						$this->Parames->redirect($this->Url.'itemList/');
					}
				}
				break;
			case 1:
				$stock_purchase_quantity = $this->input->post('stock_purchase_quantity', TRUE );
				$stock_content			 = $this->input->post('stock_content', TRUE );
				
				if(isset($stock_purchase_quantity) && isset($stock_content)) {
					if(strlen($stock_purchase_quantity) != 0 && strlen($stock_content) != 0)
					{
						$data = array(
						'item_id'			=> $item_id,
						'user_id'			=> $user_id,
						'stock_content'		=> $stock_content,
						'original_quantity' => $stock_quantity,
						'stock_quantity'	=> $stock_purchase_quantity,
						'ip'				=> $this->input->ip_address(),
						'datetime' => date(DateTime::ATOM, time()));
						
						$data_items = array('stock_quantity' => $stock_purchase_quantity);
						
						$this->items_stock->Add($data);
						$this->items_information->Update($item_id, $data_items);
						$this->Parames->redirect($this->Url.'itemList/');
					}
				}
				break;
		}
	}	
	
	/* onshelvesEditAdd on */
	private function onshelvesEditAdd($items_id,$item_image) {
	
		$cancel = $this->input->post('cancel', TRUE );
		if(strlen($cancel)!=0) {
			$this->Parames->redirect($this->Url.'shelvesList/');
		}
		
		$item_content	  = $this->input->post('item_content', TRUE );
		$item_fulltext	  = $this->input->post('item_fulltext', TRUE );
		$stop_sale_status = $this->input->post('stop_sale_status', TRUE );
		if(isset($item_content) && isset($stop_sale_status) && isset($item_image) && isset($item_fulltext)) {
			if(strlen($item_content) != 0 && strlen($stop_sale_status) != 0 && strlen($item_image) != 0 && strlen($item_fulltext) != 0)	{
				$data = array(
				'id'				=> $items_id,
				'item_content'		=> $item_content,
				'stop_sale_status' 	=> $stop_sale_status,
				'item_image' 		=> $item_image,
				'fulltext' 			=> $item_fulltext,);
				
				$this->items_information->Update($items_id, $data);
				$this->Parames->redirect($this->Url.'shelvesList/');
			}
		}
	}	
	public function ajaxGetLang() {
		$this->Parames->init('nav_commodity_ajaxGetLang');
		echo json_encode($this->lang);
	}
}
/* End of file index.php */
/* Location: ./dealer/controllers/commodity/index.php */
















