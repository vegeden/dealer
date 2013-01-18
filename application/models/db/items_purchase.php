<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items_purchase extends CI_Model {
	private $tab;
	public function __construct() {
		parent::__construct();
		
		$this->tab = strtolower(get_class($this));
	}
	
	public function Select($limit=array(0,50)) {
		$this->db->select('item_name,name,original_quantity,purchase_quantity,ip,datetime');
		$this->db->from($this->tab.',items_infromation,user_infromation');
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