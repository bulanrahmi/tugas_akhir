<?php
Class Dashboard extends CI_Controller{
    
    
    
    function __construct() {
        parent::__construct();
        chek_seesion();
    }
            
    function index(){
        	$this->template->load('template','dashboard');
    	// $level = $this->session->userdata('level');
    	// if ($level == 'admin') {
     //    	$this->template->load('template','dashboard');
    	// } else {
    	// 	$this->template->load('template_user','dashboard');
    	// }
    }
}


?>


