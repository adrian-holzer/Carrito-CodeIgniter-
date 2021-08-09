<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends CI_Controller{
    
    function  __construct(){
        parent::__construct();
        
        $this->load->library('form_validation');
        $this->load->helper('form');

        $this->load->library('cart');
        
        $this->load->model('producto');
        
        $this->controller = 'checkout';
    }
    
    function index(){
        if($this->cart->total_items() <= 0){
            redirect('productos/');
        }
        
        $cData = $data = array();
        
        $submit = $this->input->post('realizarPedido');
        if(isset($submit)){
            $this->form_validation->set_rules('nombre', 'Nombre', 'required');
            $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
            $this->form_validation->set_rules('telefono', 'Telefono', 'required');
            $this->form_validation->set_rules('direccion', 'Direccion', 'required');
            
            $cData = array(
                'nombre'     => strip_tags($this->input->post('nombre')),
                'email'     => strip_tags($this->input->post('email')),
                'telefono'     => strip_tags($this->input->post('telefono')),
                'direccion'=> strip_tags($this->input->post('direccion'))
            );

            if($this->form_validation->run() == true){
                $insert = $this->producto->insertCliente($cData);
                
                if($insert){
                    $pedido = $this->realizarPedido($insert);
                    
                    if($pedido){
                        $this->session->set_userdata('success_msg', 'Order placed successfully.');
                        redirect($this->controller.'/pedidoConfirmado/'.$pedido);
                    }else{
                        $data['error_msg'] = 'La orden fallo';
                    }
                }else{
                    $data['error_msg'] = 'Ocurrio un problema';
                }
            }
        }

        $data['cData'] = $cData;

        $data['carritoItems'] = $this->cart->contents();

        $this->load->view($this->controller.'/index', $data);
    }
    
    function realizarPedido($cID){
        $pedData = array(
            'cliente_id' => $cID,
            'total' => $this->cart->total()
        );
        $insertPedido = $this->producto->insertPedido($pedData);
        
        if($insertPedido){
            $carritoItems = $this->cart->contents();

            $pedItemData = array();
            $i=0;
            foreach($carritoItems as $item){
                $pedItemData[$i]['pedido_id']     = $insertPedido;
                $pedItemData[$i]['producto_id']     = $item['id'];
                $pedItemData[$i]['cantidad']     = $item['qty'];
                $pedItemData[$i]['sub_total']     = $item["subtotal"];
                $i++;
            }
            
            if(!empty($pedItemData)){
                $insertItemsPedido = $this->producto->insertItemsPedido($pedItemData);
                
                if($insertItemsPedido){
                    $this->cart->destroy();

                    return $insertPedido;
                }
            }
        }
        return false;
    }
    
    function pedidoConfirmado($pedID){
        $data['pedido'] = $this->producto->getPedido($pedID);
        
        $this->load->view($this->controller.'/order-success', $data);
    }
    
}