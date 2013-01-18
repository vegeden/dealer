<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items_information extends CI_Model {
	private $tab;
	public function __construct() {
		parent::__construct();
		
		$this->tab = strtolower(get_class($this));
	}
	
	public function Select($limit=array(0,50)) {
		$this->db->limit($limit[1], $limit[0]);
		
		$this->db->select($this->tab.'.id AS id, item_name, item_number, buy_price, sell_price,
		safe_stock, bread_name, stock_quantity, item_content, item_bonus,
		area_name, category_second_name, category_name, stop_sale_status');
		
		$this->db->where('items_information.area_id = items_area.id');
		$this->db->where('items_information.bread_id = items_bread.id');
		$this->db->where('items_information.category_second_id = items_category_second.id');
		$this->db->where('items_category_second.category = items_category.id');
		
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
	
	public function SelectItem() {
		return $this->db->get($this->tab);
	}
	
	public function SelectCount() {
		return $this->db->count_all($this->tab);
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
		$this->db->from('sales_item');
		return $this->db->count_all_results();
	}	
	
	public function Del($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->tab); 
	}
}