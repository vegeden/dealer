<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User_information extends CI_Model {
	private $tab;
	public function __construct() {
		parent::__construct();
		
		$this->tab = strtolower(get_class($this));
	}
	
	// 驗證使用者帳號密碼
	public function verifyUser( $account,  $password) {
		$this->db->select('id, password');
		$this->db->where('account', $account);
		$this->db->where('password', hash('sha1', $password));
		$query = $this->db->get($this->tab);
		
		if( $query->num_rows() > 0 ) {
			foreach( $query->result() as $row ) {
				return $row->id;
			}
		}
		return false;
	}
	
	// 驗證有沒有此帳號
	public function verifyAccount( $account ) {
		$this->db->where('account', $account);
		$query = $this->db->get($this->tab);
		
		if( $query->num_rows() > 0 ) {
			return false;
		}
		return true;
	}
	
	
	public function Select($id, $limit=array(0,0)) {
		$level = '';
		$level = $this->getUserStatus($id);

		if($level != '') {
			switch($level) {
				case '1':
					$query = $this->db->query('select id, account, user_status, name, email, gender, phone, address, 
									 (select type_name from user_type c where a.type_id = c.id) as type_id,
									(select name from user_information b where a.upper_id = b.id) as upper_id 
									from user_information a
									limit '.$limit[0].','.$limit[1]);
					break;
				default:
					$query = $this->db->query("select id, account, user_status, name, email, gender, phone, address
									from user_information 
									where upper_id ='$id'
									limit ".$limit[0].",".$limit[1]);
					break;
			}
			return $query;
		}
		
	}
	
	public function SWhere($id) {
		$this->db->where('id', $id);
		$query =  $this->db->get($this->tab);
		foreach($query->result() as $row) {
			return $row;
			break;
		}
	}
	
	public function SelectCount($id) {
		$count = 0;		
		$level = '';
		$level = $this->getUserStatus($id);

		if($level != '') {
			switch($level) {
				case '1':
					$count = $this->db->count_all($this->tab);
					break;
				default:
					$this->db->where('id', $id);
					$count = $this->db->count_all($this->tab);
					break;
			}
		}
		return $count;
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
	
	public function UserInfo($id) {
		$this->db->select('id, account, user_status, name, email, gender, phone, address, type_id, upper_id');
		$this->db->where('id', $id);
		foreach( $this->db->get($this->tab)->result() as $row) {
			return $row;
		}
	}
	
	public function SelectList($level, $name) {
		$user_type;
		$this->db->where('id', $level);
		$query = $this->db->get('user_type');
		foreach($query->result() as $row) {
			$user_type = $row;
			break;
		}

		$data = array();
		$this->db->select('id, name');
		$this->db->where('type_id', $user_type->upper);
		$this->db->like('name', $name, 'after');
		$this->db->limit(15, 0);
		$query = $this->db->get($this->tab);
		if( $query->num_rows() ) {
			foreach($query->result() as $row ) {
				$data[] = array('id'=>$row->id, 'name'=> $row->name);
			}
		}
		return $data;
	}
	
	private function getUserStatus($id) {
		$this->db->select('type_id');
		$this->db->where('id', $id);
		$query = $this->db->get($this->tab);
		if($query->num_rows()>0) {
			foreach($query->result() as $row) {
				return $row->type_id;
			}
		}
	}
}





















