<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        $this->load->library('cart');
        $this->load->library('form_validation');

        $this->load->model('producto');
        $this->load->helper('text');
    
    }


    
    
    function index(){

        $data = array();
        
        $data['productos'] = $this->producto->getRandom();
        
        $this->load->view('productos/index', $data);
    }
    


    function buscar(){
      
        $this->form_validation->set_rules('buscar', 'Buscar', 'required');

        $prod = strip_tags($this->input->post('buscar'));
        

        if($this->form_validation->run() == true){

            $data['productos'] = $this->producto->buscar($prod)->result_array();


           // var_dump( $data['productos']);
            $this->load->view('productos/busqueda', $data);


        }else{
            redirect(base_url("productos"));
        }
    }
 

    function addCarrito($proID){
        
        $product = $this->producto->getRows($proID);
        
        $data = array(
            'id'    => $product['id'],
            'qty'    => 1,
            'price'    => $product['precio'],
            'name'    => $product['nombre'],
            'image' => $product['image']
        );
        $this->cart->insert($data);

        redirect('carrito');
    }


    function getOne($proID){
        $product = $this->producto->getRows($proID);
        
        $data = array(
            'id'    => $product['id'],
            'price'    => $product['precio'],
            'name'    => $product['nombre'],
            'image' => $product['image'],
            'description' => $product['descripcion']
        );

        $this->load->view('productos/ver', $data);


    }

    
}