<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Items_category_second extends CI_Model {
	private $tab;
	public function __construct() {
		parent::__construct();
		
		$this->tab = strtolower(get_class($this));
	}
	
	public function Select($limit=array(0,50)) {
		$this->db->limit($limit[1], $limit[0]);
		$this->db->select($this->tab.'.id , category_second_name, category_name');
		$this->db->where($this->tab.'.category = items_category.id');
		$this->db->from($this->tab.', items_category');
		return $this->db->get();
	}
	
	public function SWhere($id) {
		$this->db->where('id', $id);
		$query =  $this->db->get($this->tab);
		foreach($query->result() as $row) {
			return $row;
		}
	}
	
	public function SWhereCategory($category) {
		$this->db->where('category', $category);
		return $this->db->get($this->tab);
	}
	
	public function SelectCategorySecond() {
		return $this->db->get($this->tab);
	}
	
	public function SelectCount() {
		return $this->db->count_all($this->tab);
	}
	
	public function verify( $category_second_name,$category_class ) {
		$this->db->where('category_second_name', $category_second_name);
		$this->db->where('category', $category_class);
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
		$this->db->where('category_second_id', $id);
		$this->db->from('items_information');
		return $this->db->count_all_results();
	}	
	
	public function Del($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->tab); 
	}
}