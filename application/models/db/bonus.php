<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Bonus extends CI_Model {
	private $tab;
	public function __construct() {
		parent::__construct();
		
		$this->tab = strtolower(get_class($this));
	}
		
	public function SWhere($id) {
		$this->db->where('id', $id);
		$query =  $this->db->get($this->tab);
		foreach($query->result() as $row) {
			return $row;
			break;
		}
	}
	
	public function Add($data) {
		$this->db->insert($this->tab, $data);
	}
	
	public function Update($id, $data) {
		// $data = {};
		$this->db->where('id', $id);
		$this->db->update($this->tab, $data);
	}
	
	public function Del($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->tab); 
	}
	
	public function resetBonus($id) {
		$data = array('bonus_count' => 0);
		$this->db->where('id', $id);
		$this->db->update($this->tab, $data);
	}
}





















