<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items_stock extends CI_Model {
	private $tab;
	public function __construct() {
		parent::__construct();
		
		$this->tab = strtolower(get_class($this));
	}
	
	public function Select($limit=array(0,50)) {
		$where = $this->tab.'.item_id = items_information.id and '.$this->tab.'.user_id = user_information.id';
		$this->db->select('item_name,name,original_quantity,'.$this->tab.'.stock_quantity,stock_content,datetime');
		$this->db->from($this->tab.',items_information,user_information');
		$this->db->where($where);
		$this->db->order_by("datetime", "desc");
		$this->db->limit($limit[1], $limit[0]);
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
	
	public function Add($data) {
		$this->db->insert($this->tab, $data);
	}
}