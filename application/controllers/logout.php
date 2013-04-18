i<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Logout extends CI_Controller {
				public function __construct() {
								parent::__construct();
								$this->load->library('Session');
								$this->load->helper('url');
								$this->lang->load('basic','zh-TW');
				}

				public function index() {
							$this->session->_destroy();
								redirect('/');
				}
}