<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class SysConfig extends CI_Model {
	private $tab;
	public function __construct() {
		parent::__construct();
		
		$this->tab = strtolower(get_class($this));
	}
	
	public function verify() {
		$count = $this->db->count_all($this->tab);
		if($count == 0) 
			return true;
		return false;
	}
	
	public function Select() {
		return $this->db->get($this->tab);
	}
	
	public function SWhere($id) {
		$this->db->where('id', $id);
		$query =  $this->db->get($this->tab);
		foreach($query->result() as $row) {
			return $row;
		}
	}
	
	public function SWhereKey($key) {
		$this->db->where('key', $key);
		$query =  $this->db->get($this->tab);
		foreach($query->result() as $row) {
			return $row;
		}
	}
	
	public function Add($data) {
		$this->db->insert($this->tab, $data);
	}
	
	public function Update($id, $data) {
		$this->db->where('id', $id);
		$this->db->update($this->tab, $data);
	}
	
	public function Del($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->tab); 
	}
}