<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        $this->load->library('cart');
        
        $this->load->model('producto');
    }


    
    
    function index($idCat){
        
        $data = array();
        
        $data['productos'] = $this->producto->getAllCategory($idCat);
        
       
        
       // var_dump( $data['productos'] );
        $this->load->view('categoria/index', $data);
    }
}

    ?>