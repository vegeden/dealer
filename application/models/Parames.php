<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parames extends CI_Model {
	private $parame, $UserInfo, $page, $InterfaceStatus;
	public function __construct() {
		parent::__construct();
		
		/** 	load Session	**/
		$this->load->library('Session');
		$this->UserInfo = $this->session->get('UserInfo');
		$this->verifyLogin();
		
		/**		load main lagnuage 		**/
		$this->lang->load('backend','zh-TW');
		$this->parame 	= array( 'lang' => $this->lang );
		
		/**		load Access Control List 		**/
		$this->load->model('db/AccessControlList');
		
		$this->load->helper('url');
		if(preg_match('/backend/', uri_string())) {
			$this->InterfaceStatus = 0;
		} else {
			$this->InterfaceStatus = 1;
		}
	}
	
	public function init($nav_page) {
		/**		Under code follow $nav_page 	**/
		$navSplit		= preg_split('/_/',$nav_page);
		$navclass 		= substr($nav_page,0,(strlen($nav_page)-strlen($navSplit[2])-1));
		$topName 		= $this->lang->line($nav_page);
		$this->page 	= $navSplit;
		
		$this->loadlange($navSplit[1]);
		$ArticlePage	= $navSplit[1].'\\'.$navSplit[2].'.php';
		
		/** verify ACL	**/
		if($this->InterfaceStatus == 0) $this->verifyPage($nav_page);
		
		$this->parame['UserInfo']		= $this->UserInfo;
		$this->parame['js']				= $this->loadJS($navSplit[1]);
		$this->parame['nav'] 			= $this->AccessControlList->getNav();
		$this->parame['nav_page'] 		= $nav_page;
		$this->parame['topName'] 		= $topName;
		$this->parame['ArticlePage'] 	= $ArticlePage;
		
	}
	
	/** 	load different page lagnuage	**/
	public function loadlange($kind) {
		$this->lang->load($kind, 'zh-TW');
	}
	
	private function loadJS($fileName) {
		$result = '';
		$dir = "statics/js/"; 
		switch($this->InterfaceStatus) {
			case 0:
				$dir .= 'backend/';
				break;
			case 1:
				$dir .= 'frontend/';
				break;
		}
		
		// Open a known directory, and proceed to read its contents 
		if (is_dir($dir)) { 
			if ($dh = opendir($dir)) { 
				
				while (($file = readdir($dh)) !== false) { 
					if ($file!="." && $file!=".." && $file == $fileName.'.js') { 
						$result = $fileName.'.js';
						break;
						// echo "<a href=file/".$file.">".$file."</a><br>"; 
					} 
				} 
				closedir($dh); 
			} 
		} 
		if($result != '') 
			return $result;
		else
			return null;
	}
	
	public function verifyLogin() {
		if( !$this->UserInfo && $_SERVER["REQUEST_URI"] != '/dealer/')
			// $this->redirect('/dealer/');
			show_404();
	}
	
	private function verifyPage($nav) {
		$verifyPage = $this->AccessControlList->verifyPage($this->UserInfo->type_id, $nav);
		if(!$verifyPage) {
			show_404();
		}
	}
		
	public function redirect($url) {
		header("Location:$url");
		exit;
	}
	
	public function getParams() {
		return $this->parame;
	}
	
	public function getUserInfo() {
		if(isset($this->UserInfo)) return $this->UserInfo;
		return false;
	}
	
	public function sendEMail($Type, $EmailInfo) {
		/**		load SendEmail			**/
		$this->load->model('Mail');
		
		// Email Notice
		$Message = array(	'account' 	=> $this->UserInfo->account, 
							'passwd' 	=> $newpassword
						);
						
		$this->Mail->sendEMail($Type, $EmailInfo );
	}
	
	public function verifyEmail($email) {
		$regexp = "/^[^0-9][A-z0-9_]+([.][A-z0-9_]+)*[@][A-z0-9_]+([.][A-z0-9_]+)*[.][A-z]{2,4}$/";
		 
		if (preg_match($regexp, $email)) {
			return true;
		} else {
			return false;
		}
	}
}