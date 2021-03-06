<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Access_Control_List extends CI_Model {
	private $tab, $type_id;
	public function __construct() {
		parent::__construct();
		
		$this->tab = strtolower(get_class($this));
	}
	
	public function Select() {
		$this->db->order_by('group','ASC');
		return $this->db->get($this->tab);
	}
	
	public function SWhere($id) {
		$this->db->where('id', $id);
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
	
	public function getNav($type_id) {		
		$this->type_id = $type_id;
		if($this->type_id != 1) {
			// 一次篩選
			$this->db->like('permission', $this->type_id);
		}
		$this->db->where('publicPage','0');
		$this->db->order_by('group','ASC');
		$query = $this->db->get($this->tab);
		// echo $query->num_rows();
		if($query->num_rows() > 0) {
			$nav = array();
			$t = 1;
			foreach($query->result() as $rows) {
				if( $t == 1) {
					$tempGroup = $rows->group;
					$t = 2;
				}
				
				if($tempGroup != $rows->group) {
					$nav[$tempGroup] = $nav_list;
					$tempGroup = $rows->group;
					$nav_list = array();
				}
					
				// 二次篩選
				$access = preg_split('/,/', $rows->permission);
				$nav_list[] = $rows->access;
			
			}
			$nav[$tempGroup] = $nav_list;
		}
		
		return $nav;
	}
	
	public function verifyPage($page) {
		if($this->type_id != 1) {
			
			$splitPage = preg_split('/_/', $page);
			$this->db->where('access',$splitPage[2]);
			$this->db->like('permission', $this->type_id); 
			$query = $this->db->get($this->tab);
			
			$access = array();
			if($query->num_rows() > 0) {
				foreach($query->result() as $row) {
					$access = preg_split('/,/', $row->permission);
					break;
				}
			}
			
			if( array_search($this->type_id, $access) === false ) {
				return false;
			}
		}
		return true;
	}
	
}