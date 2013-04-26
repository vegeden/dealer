<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dividend extends CI_Model {
	private $tab;
	public function __construct() {
		parent::__construct();
		
		$this->tab = strtolower(get_class($this));
	}
	public function Save($user_id, $deposit_price) {
		if($this->verifyUser($user_id)) {
			$price = array();
			$query = $this->Select($user_id);
			foreach($query->result() as $row) {
				$price = $row->deposit_price;
				break;
			}
			
			$data = array('deposit_price' => $deposit_price+$price);
			$this->Update($user_id, $data);
		} else {
			$data = array(	'user_id' => $user_id, 
							'deposit_price' => $deposit_price
						);
			$this->Add($data);
		}
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
	
	public function deposit_price($id) {
		$this->db->where('user_id', $id);
		$query = $this->db->get($this->tab);
		if($query->num_rows() > 0) {
			foreach($query->result() as $row){
				return  $row->deposit_price; 
			}
		} else {
			return 0;
		}
	}
}