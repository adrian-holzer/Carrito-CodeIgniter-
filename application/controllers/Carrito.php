<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carrito extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        $this->load->library('cart');
        
        $this->load->model('producto');
    }
    
    function index(){
        $data = array();
        
        $data['carritoItems'] = $this->cart->contents();
        
        $this->load->view('carrito/index', $data);
    }
    
    function updateCantItems(){
        $update = 0;

       
  if(isset($_POST) && !empty($_POST)){

    $data = array(
        'rowid' => $_POST['rowid'],
        'qty'   => $_POST['qty']
    );
    $update = $this->cart->update($data);



  }

  echo json_encode($update);









    }



    
    function removeItem($rowid){
        
        $remove = $this->cart->remove($rowid);
        
        redirect('carrito/');
    }

    function removeAll(){

        $remove = $this->cart->destroy();
        
        redirect('carrito/');
    }


    
}