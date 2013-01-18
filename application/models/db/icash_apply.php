<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Icash_apply extends CI_Model {
	private $tab;
	public function __construct() {
		parent::__construct();
		
		$this->tab = strtolower(get_class($this));
	}
		
	public function SelectList($id, $kind, $limit=array(1,0)) {
		$level = $this->getUserStatus($id);

		if($level != '') {
			switch($level) {
				case '1':
					switch($kind) {
						case '0':
							$this->db->select("icash_apply.id, icash_apply.user_id, icash_apply.remittance_status, icash_apply.admin_id, icash_apply.bank_num, icash_apply.apply_name, icash_apply.apply_price, icash_apply.apply_datetime, icash_apply.audit_datetime, user_type.type_name");
							$this->db->from($this->tab);
							$this->db->join('user_information', "user_information.id = icash_apply.user_id");
							$this->db->join('user_type ', "user_information.type_id = user_type.id");
							$this->db->where('remittance_status', $kind);
							$this->db->order_by("apply_datetime", "desc");
							$this->db->limit($limit[1], $limit[0]);							
							$query = $this->db->get();
							break;
						case '1':
							$query = $this->db->query("SELECT `icash_apply`.`id`, `icash_apply`.`user_id`, `icash_apply`.`remittance_status`, (select name from user_information where id = `icash_apply`.`admin_id`) as admin_name
														, `icash_apply`.`bank_num`, `icash_apply`.`apply_name`, `icash_apply`.`apply_price`, `icash_apply`.`apply_datetime`, `icash_apply`.`audit_datetime`, `user_type`.`type_name` 
														FROM (`icash_apply`) 
														JOIN `user_information` ON `user_information`.`id` = `icash_apply`.`user_id` 
														JOIN `user_type` ON `user_information`.`type_id` = `user_type`.`id` 
														WHERE `remittance_status` = '$kind' ORDER BY `apply_datetime` desc Limit ".$limit[0].", ".$limit[1]);
							break;
					}
					
					break;
				default:
					$this->db->select("icash_apply.id, icash_apply.remittance_status, icash_apply.bank_num, icash_apply.apply_name, icash_apply.apply_price, icash_apply.apply_datetime, icash_apply.audit_datetime");
					$this->db->from($this->tab);
					$this->db->join('user_information', "user_information.id = icash_apply.user_id");
					$this->db->where('icash_apply.remittance_status', $kind);
					$this->db->where('icash_apply.user_id', $id);
					$this->db->order_by("apply_datetime", "desc"); 
					$this->db->limit($limit[1], $limit[0]);
					$query = $this->db->get();
					break;
			}
			
			return $query;
		}
		
	}
	
	public function SelectCount($id, $kind) {
		$count = 0;		
		$level = '';
		$level = $this->getUserStatus($id);

		if($level != '') {
			switch($level) {
				case '1':					
					$this->db->from($this->tab);
					$this->db->where('remittance_status', $kind);
					$count = $this->db->count_all_results();
					break;
				default:
					$this->db->from($this->tab);
					$this->db->where('remittance_status', $kind);
					$this->db->where('user_id', $id);
					$count = $this->db->count_all_results();
					break;
			}
		}
		return $count;
	}
	
	public function Select($id) {
		$this->db->where('id', $id);
		return $this->db->get($this->tab);
	}
	
	public function FindBankCode($kind, $bank_num) {
		$this->db->where('remittance_status ', $kind);
		$this->db->like('bank_num', $bank_num, 'after'); 
		
		switch($kind) {
			case '0':
				$this->db->select("icash_apply.id, icash_apply.user_id, icash_apply.remittance_status, icash_apply.admin_id, icash_apply.bank_num, icash_apply.apply_name, icash_apply.apply_price, icash_apply.apply_datetime, icash_apply.audit_datetime, user_type.type_name");
				$this->db->from($this->tab);
				$this->db->join('user_information', "user_information.id = icash_apply.user_id");
				$this->db->join('user_type ', "user_information.type_id = user_type.id");
				$this->db->where('remittance_status', $kind);
				$this->db->like('bank_num', $bank_num, 'after'); 
				$this->db->order_by("apply_datetime", "desc"); 
				$this->db->order_by("apply_datetime", "desc"); 
				$query = $this->db->get();
				break;
			case '1':
				$query = $this->db->query("SELECT `icash_apply`.`id`, `icash_apply`.`user_id`, `icash_apply`.`remittance_status`, (select name from user_information where id = `icash_apply`.`admin_id`) as admin_name
											, `icash_apply`.`bank_num`, `icash_apply`.`apply_name`, `icash_apply`.`apply_price`, `icash_apply`.`apply_datetime`, `icash_apply`.`audit_datetime`, `user_type`.`type_name` 
											FROM (`icash_apply`) 
											JOIN `user_information` ON `user_information`.`id` = `icash_apply`.`user_id` 
											JOIN `user_type` ON `user_information`.`type_id` = `user_type`.`id` 
											WHERE `remittance_status` = '$kind' AND bank_num LIKE '$bank_num%'
											ORDER BY `apply_datetime` desc");
				break;
		}
		return $query;
	}
	
	public function Add($data) {
		$this->db->insert($this->tab, $data);
	}
	
	public function Update($id, $user_id=0, $data) {
		if($user_id != 0) $this->db->where('user_id', $user_id);
		$this->db->where('id', $id);
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