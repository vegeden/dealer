<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Session {
		function __construct(){
			$this->_set_session();
		}

		function _set_session(){
			session_start();
		}
		
		function session_write_close(){
			session_write_close();
		}
		
		function set($session_name,$session_value){
			$_SESSION[$session_name] = $session_value;
		}

		function get($session_name){
			if(isset($_SESSION[$session_name]))
				return $_SESSION[$session_name];
			return false;
		}
		
		function setSessioId( $id ) {
			session_id( $id );
		}
		
		function getSessionId() {
			return session_id();
		}

		function _unset($session_name){
			if(isset($_SESSION[$session_name]))
				unset($_SESSION[$session_name]);
		}
		
		function _destroy(){
			session_unset();
			session_destroy();
		}
	}
?>