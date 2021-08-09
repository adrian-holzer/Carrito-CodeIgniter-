<? var_dump($productos);?>



<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
?>



<?php     $this->load->view('layout/header');

//var_dump($productos);

?>





    <div class="container" style="width: 90%;">
        <h2 style="margin:20px 20px; text-align: center;">Resultados de la Búsqueda</h2>
        <a href="<?php echo base_url('carrito'); ?>" title="View Cart" style="float: right; margin:10px 10px;text-decoration : none;">
            <i class="fas fa-shopping-cart" style="font-size:15px; color: blue;"></i>
            <span >(<?php echo $this->cart->total_items(); ?>)</span>
        </a>


        <div class="row" style="display: flex; margin-top: 6rem;">
            <div class="col-lg">
                <?php if (!empty($productos)) {
                    foreach ($productos as $row) { ?>
                         <div class="col-sm " >
                            <div class="card  animated fadeInUp" style="  width: 20%; padding: 30px 0px; float:left;height: 500px; margin-left: 2rem; margin-bottom: 6rem;">

                                <div style="height: 25 rem; width:  10 rem;">

                                    <img class="card-img-top" width="40 rem;" height="135 rem;" style="margin-bottom: 1rem;" src="<?php echo base_url('uploads/product_images/' . $row['image']); ?>" alt="Card image cap">
                                </div>
                                <div class="card-body" style="text-align: center;">

                                    <h5><strong><?php echo $row['nombre']; ?></strong></h5>
                                    <br>
                                    <h5><strong>$<?php echo $row['precio']; ?></strong></h5>
                                    <br><br><br>
                                </div>

                                <div  style="margin: 0 auto;" >
                                    <a href="<?php echo base_url('productos/addCarrito/' . $row['id']); ?>" class="btn btn-success" style="margin-right: 1rem;" >
                                        Agregar
                                    </a>
                                    <a href="<?php echo base_url('productos/getOne/' . $row['id']); ?>" class="btn btn-info">
                                        Ver
                                    </a>

                                </div>




                            </div>
                        </div>
                    <?php }
                    } else { ?>
                    <p>La búsqueda no coincide con ningún producto</p>
                <?php } ?>
            </div>
           
        </div>
    </div>

   



    <script src="<?php echo base_url() ?>/assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>
</body>


<?php     $this->load->view('layout/footer');
?>



</html>