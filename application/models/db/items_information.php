<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items_information extends CI_Model {
	private $tab;
	public function __construct() {
		parent::__construct();
		
		$this->tab = strtolower(get_class($this));
	}
	
	public function Select($limit=array(0,50)) {
		$this->db->limit($limit[1], $limit[0]);
		
		$this->db->select('item_A.id AS id, item_name, item_barcode, item_number, buy_price, sell_price,safe_stock,
		bread_name, stock_quantity, item_content, dividend,area_name, category_second_name, category_name,
		freight_price,special_commodity_status, on_off_sale, 
		(SELECT (stock_quantity-safe_stock) FROM '.$this->tab.' AS item_B WHERE item_A.id = item_B.id) AS warn_stock');
		
		$this->db->where('item_A.area_id = items_area.id');
		$this->db->where('item_A.bread_id = items_bread.id');
		$this->db->where('item_A.category_second_id = items_category_second.id');
		$this->db->where('items_category_second.category = items_category.id');
		
		$this->db->order_by('warn_stock', 'asc');
		
		$this->db->from($this->tab.' AS item_A, items_area,items_bread, items_category, items_category_second');
		return $this->db->get();
	}
	
	public function SelectShelves($limit=array(0,50),$status) {
		$this->db->limit($limit[1], $limit[0]);
		
		$this->db->select($this->tab.'.id AS id, item_name, item_barcode, item_number, buy_price, sell_price,safe_stock,
		bread_name, stock_quantity, item_content, dividend,area_name, category_second_name, category_name,
		freight_price,special_commodity_status, on_off_sale, fulltext');
		
		$this->db->where($this->tab.'.area_id = items_area.id');
		$this->db->where($this->tab.'.bread_id = items_bread.id');
		$this->db->where($this->tab.'.category_second_id = items_category_second.id');
		$this->db->where('items_category_second.category = items_category.id');
		$this->db->where('on_off_sale', $status);
		
		$this->db->from($this->tab.', items_area,items_bread, items_category, items_category_second');
		return $this->db->get();
	}
	
	public function SWhere($id) {
		$this->db->where('id', $id);
		$query =  $this->db->get($this->tab);
		foreach($query->result() as $row) {
			return $row;
		}
	}
	
	public function SWheres($data) {
		foreach($data as $key => $val) {
			$this->db->or_where('id', $key);
		}	
		return $this->db->get($this->tab);
	}	
	
	public function SelectItem() {
		return $this->db->get($this->tab);
	}
	
	public function SelectCount() {
		return $this->db->count_all($this->tab);
	}
	
	public function SelectCountWhere($status) {
		$this->db->where('on_off_sale', $status);
		return $this->db->count_all($this->tab);
	}
	
	public function SelectOnSell($category_id, $category_second_id, $store_level) {
		switch($store_level) {
			case 1:
				$this->db->select('items_information.id AS id,
				items_category_second.category AS category_id,
				items_category_second.id AS category_second_id,
				items_information.item_name,
				category_second_name,
				items_information.sell_price,
				sum(sale_item.quantity) AS sale_item_sum');
				$this->db->from('items_category_second,items_information');
				$this->db->join('sale_item', 'items_information.id = sale_item.item_id', 'left');
				$this->db->where('on_off_sale = 1');
				$this->db->where('items_information.area_id != 17');
				$this->db->where('items_category_second.category', $category_id);
				$this->db->where('items_category_second.id = items_information.category_second_id');
				$this->db->where('items_category_second.id', $category_second_id);
				$this->db->group_by('items_information.id');
				$this->db->order_by("category_second_id", "ASC"); 
				$this->db->order_by("sale_item_sum", "DESC");	
				$this->db->limit(5);
				break;
			case 2:
				$this->db->select('items_information.id AS id,item_name,sell_price');
				$this->db->where('on_off_sale = 1');
				$this->db->where('items_information.area_id != 17');
				$this->db->where('items_category.id',$category_id);
				$this->db->where('items_category_second.id ',$category_second_id);
				$this->db->where('items_category_second.category = items_category.id');
				$this->db->where('items_information.category_second_id = items_category_second.id');
				$this->db->from($this->tab.', items_category_second, items_category');
				break;
		}
		return $this->db->get();
	}
	
	public function verify( $item_name ) {
		$this->db->where('item_name', $item_name);
		$query = $this->db->get($this->tab);
		if( $query->num_rows() == 0 )
			return true;
		return false;
	}
	
	public function Add($data ) {
		$this->db->insert($this->tab, $data);
	}
	
	public function Update( $id, $data) {
		$this->db->where('id', $id);
		$this->db->update($this->tab, $data);
	}
	
	public function DelCheck($id) {
		$this->db->where('item_id', $id);
		$this->db->from('sale_item');
		return $this->db->count_all_results();
	}	
	
	public function Del($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->tab); 
	}
	
	public function FindItemName($name) {
		$this->db->select('item_A.id AS id, item_name, item_number, buy_price, sell_price,safe_stock,
		bread_name, stock_quantity, item_content, dividend,area_name, category_second_name, category_name,
		freight_price,special_commodity_status, on_off_sale, 
		(SELECT (stock_quantity-safe_stock) FROM '.$this->tab.' AS item_B WHERE item_A.id = item_B.id) AS warn_stock');
		
		$this->db->where('item_A.area_id = items_area.id');
		$this->db->where('item_A.bread_id = items_bread.id');
		$this->db->where('item_A.category_second_id = items_category_second.id');
		$this->db->where('items_category_second.category = items_category.id');
		
		$this->db->order_by('warn_stock', 'asc');
		
		$this->db->from($this->tab.' AS item_A, items_area,items_bread, items_category, items_category_second');
		$this->db->like('item_name', $name, 'after'); 
		return $this->db->get();
		// $query = $this->db->query("select
						// from user_information a 
						// WHERE name LIKE '$name%'");

		// $query = $this->db->query("select id, account, user_status, name, email, gender, phone, address
						// from user_information  
						// where upper_id ='$id' and name LIKE '$name%'");
	}
}