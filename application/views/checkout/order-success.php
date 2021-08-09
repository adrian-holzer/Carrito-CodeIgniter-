<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');


if(!$pedido){
redirect(base_url());
} 
?>

<?php     $this->load->view('layout/header');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

<div class="container" style="margin:3rem auto;">
		<h2 style="margin:20px 20px; text-align: center;">Estado de la Compra.</h2>
        <p style=" color: green;"><i style="color:green;" class="fas fa-check"></i>  Su pedido se ha realizado correctamente.</p>

<div style="display: flex; justify-content: space-around; padding: 50px 40px;flex-wrap: wrap; border: ridge #000 1px;">
    <div style="flex: 1; text-align: center; padding: 0 50px 0 60px;">
        <h5><strong>Datos del cliente</strong></h5>
        <p><strong>Nombre:</strong> <?php echo $pedido['nombre']; ?></p>
        <p><strong>Email:</strong> <?php echo $pedido['email']; ?></p>
        <p><strong>Teléfono:</strong> <?php echo $pedido['telefono']; ?></p>
        <p><strong>Dirección:</strong> <?php echo $pedido['direccion']; ?></p>
    </div>
    <div style="flex: 1; text-align: center; padding: 0 50px 0 60px;">
        <h5><strong>Información de la compra</strong></h5>
        <p><b>ID de referencia: </b> #<?php echo $pedido['id']; ?></p>
        <p><b>Total: </b> <?php echo '$'.$pedido['total']; ?></p>
    </div>
</div>

<div class="row" style="margin: 1rem auto; padding: 50px 40px;flex-wrap: wrap; border: ridge #000 1px;">
    <?php if(!empty($pedido['items'])){ foreach($pedido['items'] as $item){ ?>
        <div class="col-12 col-md-4 mb-3" >
            <div class="img" style="margin:0 auto; height: 75px; width: 75px;">
                <?php $imageURL = !empty($item["image"])?base_url('uploads/product_images/'.$item["image"]):base_url('assets/images/pro-demo-img.jpeg'); ?>
                <img src="<?php echo $imageURL; ?>" width="150"/>
            </div>
        
       
            <div class="descripcion" style="text-align: center; margin:3rem;">
            <h4><b><?php echo $item["nombre"]; ?></b></h4>
            <br>
            <p>Precio: <b><?php echo '$'.$item["precio"]; ?></b></p>
            <p>Cantidad: <b><?php echo $item["cantidad"]; ?></b></p>
            <p>Total: <b><?php echo '$'.$item["sub_total"]; ?></b></p>
            </div>
       </div>
       <hr>
    <?php } } ?>
</div>
</div>
<script src="<?php echo base_url() ?>/assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>
</body>

<?php     $this->load->view('layout/footer');
?>