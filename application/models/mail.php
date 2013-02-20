<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mail extends CI_Model {
	private $Config, $EmailConfig, $toWho, $subject, $content ;
	
	const ChagePassword_Type 		= 1;		//修改密碼
	const ForgetPassword_Type 		= 2;		//忘記密碼	管理者設定
	const StoredvalueApproved_Type 	= 3;		//儲值金核淮
	
	public function __construct() {
		parent::__construct();
		
		$this->init();
	}
	
	private function init() {
		$this->content = '';
	}
	
	private function load() {
		$this->lang->load('email','zh-TW');
		
		$this->config->load('MailConfig', TRUE);
		$this->Config = $this->config->item('MailConfig');
		$this->load->library('Mailer', $this->Config);
	}
	
	
	public function sendEMail($kind, $EmailInfo) {
		$this->load();
		$this->toWho 	= $EmailInfo['toWho'];
		
		switch($kind) {
			case self::ChagePassword_Type:
			case self::ForgetPassword_Type:
				$this->subject 	= $this->lang->line('password_subject');
				$this->content .= '<p>'.$this->lang->line('welcome').'</p>';
				$this->content .= '<br/>';
				$this->content .= '<p>'.$this->lang->line('your_id').$EmailInfo['account'].'</p>';
				$this->content .= '<p>'.$this->lang->line('your_passwd').$EmailInfo['passwd'].'</p>';
				// $this->content .= '<p>'..'</p>';
				break;
			case self::StoredvalueApproved_Type:
				
				break;
		}
		$this->content .= $this->lang->line('Signature');
		$this->send();
	}
	
	private function send() {
		$this->mailer->sendMail($this->lang->line('mail_title'), $this->toWho, $this->subject, $this->content);
	}
}