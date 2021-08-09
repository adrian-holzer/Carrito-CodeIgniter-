<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Producto extends CI_Model{
    
    function __construct() {
        $this->prodTable = 'productos';
        $this->clientTable = 'clientes';
        $this->categoria = 'categoria';
        $this->pedTable = 'pedidos';
        $this->pedItemsTable = 'pedido_items';
    }
    
    public function getRows($id = ''){

        $this->db->select('*');
        $this->db->from($this->prodTable);
        $this->db->where('estado', '1');

        if($id){
            $this->db->where('id', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('nombre', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
       
        
        return !empty($result)?$result:false;
    }
    


function getRandom(){
    $this->db->select('*');
    $this->db->from('productos');
    $this->db->order_by("id", "random");
    $this->db->limit(8, 0);
    $query = $this->db->get();
    $result = $query->result_array();
   
return $result;
}

   

public function buscar($prodBusc){

    $this->db->select('*');
    $this->db->from('productos');
    $this->db->like('nombre', $prodBusc);  
    
    $result = $this->db->get();
    

    if($result->num_rows() == 0)
    {
        return false;
    }
        
    return $result;

}



public function getAllCategory($idCat){
    $this->db->select('p.* , c.nombre as nombreCat');
    $this->db->from("productos p");
    
    $this->db->join('categoria c', 'c.idCategoria = p.idCategoria');

    $this->db->where('p.idCategoria', $idCat);

    $result = $this->db->get();

    if($result->num_rows() == 0)
    {
        return false;
    }

    return $result->result_array();

}


    public function getPedido($id){
        $this->db->select('o.*, c.nombre, c.email, c.telefono, c.direccion');
        $this->db->from($this->pedTable.' as o');
        $this->db->join($this->clientTable.' as c', 'c.id = o.cliente_id', 'left');
        $this->db->where('o.id', $id);
        $query = $this->db->get();
        $result = $query->row_array();
        
        $this->db->select('i.*, p.image, p.nombre, p.precio');
        $this->db->from($this->pedItemsTable.' as i');
        $this->db->join($this->prodTable.' as p', 'p.id = i.producto_id', 'left');
        $this->db->where('i.pedido_id', $id);
        $query2 = $this->db->get();
        $result['items'] = ($query2->num_rows() > 0)?$query2->result_array():array();
        
        return !empty($result)?$result:false;
    }
    
    public function insertCliente($data){
        
        $insert = $this->db->insert($this->clientTable, $data);

        return $insert?$this->db->insert_id():false;
    }

    public function insertPedido($data){

        $insert = $this->db->insert($this->pedTable, $data);

        return $insert?$this->db->insert_id():false;
    }

    public function insertItemsPedido($data = array()) {
        
        $insert = $this->db->insert_batch($this->pedItemsTable, $data);

        return $insert?true:false;
    }
    
public function record_count() {

    return $this->db->count_all("contact_info");

}

public function fetch_data($limit, $id) {
    $this->db->limit($limit);
    $this->db->where('id', $id);
    $query = $this->db->get("contact_info");
    if ($query->num_rows() > 0) {
        foreach ($query->result() as $row) {
            $data[] = $row;
        }

        return $data;
    }
    return false;
}
}



