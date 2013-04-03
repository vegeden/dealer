<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Img extends CI_Controller {	
	private $ImageType, $StoreAddress;
    function __construct() {
        parent::__construct();
		
		$this->load->helper('file');
		$this->ImageType 	= array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF');
		
		$this->StoreAddress = 'statics/img_commodity/main/';
    }	
	
	public function store($id) {
		$FileArray 	= get_filenames($this->StoreAddress);
		$FileName 	= '';
		foreach($this->ImageType as $row) {
			$indexOf = array_search("$id.".$row, $FileArray);
			if($indexOf !== false) {
				$FileName = $FileArray[$indexOf];
				$FileInfo = get_file_info($this->StoreAddress.$FileName);
				$this->showImage($FileInfo);
				break;
			}
		}
		
		if(empty($FileName)) 
			show_404();

	}
	
	public function advertisement($id) {
		
	}
	
	private function showImage($FileInfo) {
		header('Content-Length: '.$FileInfo['size']); //<-- sends filesize header
		header('Content-Type: image/jpg'); //<-- send mime-type header
		header('Content-Disposition: inline; filename="'.$FileInfo['server_path'].'";'); //<-- sends filename header
		readfile($FileInfo['server_path']); //<--reads and outputs the file onto the output buffer
		die(); //<--cleanup
		exit; //and exit
	}
}





