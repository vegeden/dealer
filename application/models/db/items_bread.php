<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items_bread extends CI_Model {
	private $tab;
	public function __construct() {
		parent::__construct();
		
		$this->tab = strtolower(get_class($this));
	}
	
	public function Select($limit=array(0,50)) {
		$this->db->limit($limit[1], $limit[0]);
		return $this->db->get($this->tab);
	}
	
	public function SWhere($id) {
		$this->db->where('id', $id);
		$query =  $this->db->get($this->tab);
		foreach($query->result() as $row) {
			return $row;
		}
	}

	public function SelectBread() {
		return $this->db->get($this->tab);
	}	
	
	public function SelectCount() {
		return $this->db->count_all($this->tab);
	}
	
	public function verify( $bread_name ) {
		$this->db->where('bread_name', $bread_name);
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
		$this->db->where('bread_id', $id);
		$this->db->from('items_information');
		return $this->db->count_all_results();
	}	
	
	public function Del($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->tab); 
	}
}