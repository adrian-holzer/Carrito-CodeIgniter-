<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
?>



<?php     $this->load->view('layout/header');

?>

<body>




    <div class="container" style="width: 90%;" >

    <a href="<?php echo base_url('carrito'); ?>" title="View Cart" style="float: right; margin:10px 10px;">
            <i class="fas fa-shopping-cart" style="font-size:15px; color: blue;"></i>
            <span>(<?php echo $this->cart->total_items(); ?>)</span>
        </a>

        <h2 style="margin:20px 20px; text-align: center;"><?php echo $productos[0]['nombreCat'];?></h2>
        


        <div class="row my-4">

<?php if (!empty($productos)) {
    foreach ($productos as $row) { ?>
        <div class="col-12 col-sm-12 col-md-6 col-lg-4 my-3 text-center">
            <div class="card animated fadeInUp p-4 "  style="height: 25rem">

            
                    <img class="card-img-top" style="width: 90%; height: 40%" src="<?php echo base_url('uploads/product_images/' . $row['image']); ?>" alt="Card image cap">



                    <div class="my-5">
                       <strong><?php echo $row['nombre']; ?></strong>
                        <br>
                       <strong><?php echo $row['precio']; ?></strong>

                       <br>

                       <div class="my-3">
                        
                        <a  href="<?php echo base_url('productos/addCarrito/' . $row['id']); ?>" class="btn btn-success">
                            Agregar
                        </a>
                        <a href="<?php echo base_url('productos/getOne/' . $row['id']); ?>" class="btn btn-info">
                            Ver
                        </a>

                       </div>
                    </div>


                </div>



            </div>
    <?php }  
} else { ?>
    <p>Los productos no se encuentran cargados.</p>
<?php } ?>

</div>
        </div>
    <script src="<?php echo base_url() ?>/assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>
</body>

<?php     $this->load->view('layout/footer');
?>



</html>