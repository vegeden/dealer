<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Icash_log extends CI_Model {
	private $tab;
	public function __construct() {
		parent::__construct();
		
		$this->tab = strtolower(get_class($this));
	}
		
	public function SelectList($id, $limit=array(1,0)) {
		$level = $this->getUserStatus($id);
		if($level != '') {
			switch($level) {
				case '1':
					$this->db->join('user_information', "user_information.id = icash_log.admin_id");
					break;
				case '2':
				case '3':
					$this->db->where('user_id', $id);
					break;
			}
		}
		
		$this->db->order_by("log_datetime", "desc");
		return $this->db->get($this->tab);
	}
	
	public function SelectCount($id) {
		$count = 0;		
		$level = '';
		$level = $this->getUserStatus($id);

		if($level != '') {
			switch($level) {
				case '1':					
					$this->db->from($this->tab);
					$count = $this->db->count_all_results();
					break;
				default:
					$this->db->from($this->tab);
					$this->db->where('user_id', $id);
					$count = $this->db->count_all_results();
					break;
			}
		}
		return $count;
	}
	
	public function Add($data) {
		$this->db->insert($this->tab, $data);
	}
	
	public function Update($user_id, $data) {
		$this->db->where('user_id', $user_id);
		$this->db->update($this->tab, $data);
	}
	
	public function Del($id) {
		$this->db->where('id', $id);
		$this->db->delete($this->tab); 
	}
	
	private function getUserStatus($id) {
		$this->db->select('type_id');
		$this->db->where('id', $id);
		$query = $this->db->get('user_information');
		if($query->num_rows()>0) {
			foreach($query->result() as $row) {
				return $row->type_id;
			}
		}
	}
}