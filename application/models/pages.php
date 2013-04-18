<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Model {
	private $total, $displayNum, $totalPageNum, $pageNum, $page;
	public function __construct() {
		parent::__construct();
		
		$this->displayNum = 20;
	}
	
	public function init($total, $page) {
		$this->page = $page;
		$this->total = $total;
		
		$this->totalPageNum = ceil($this->total / $this->displayNum);
		
		$page -= 1;
		$this->pageNum = $page < 0 ?  0 : $page * $this->displayNum;

		return $this->getLimit();
	}

	private function getLimit() {
		return Array($this->pageNum, $this->displayNum);
	}
	
	public function getTotalPageNum() {
		return $this->totalPageNum;
	}
	
	public function getPrevious() {
		return ($this->page-1) <= 0 ? 1 : ($this->page-1);
	}
	
	public function getNext() {
		return ($this->page+1) > $this->totalPageNum ? $this->totalPageNum : ($this->page+1);
	}
}