<?php $this->load->view('layout/header');
?>



<div class="container my-5" >

    <div class="imagen-ver">

        <img class="card-img-top" style="width: 500px;" src="<?php echo base_url('uploads/product_images/' . $image); ?>" alt="Card image cap">


    </div>

    <div class="my-5" >
        <h5 ><?php echo $name; ?></h5>
        <p ><?php echo $description; ?></p>

        <h5 ><?php echo "$".$price; ?></h5>

    </div>





    <div style="margin: 2rem auto; align-items: center; ">
        <a  style="margin-right: 1rem ; " href="<?php echo base_url('productos/addCarrito/' . $id); ?>" class="btn btn-success">
            Agregar
        </a>
        <a href="<?php echo base_url(); ?>" class="btn btn-warning">
            Regresar
        </a>

    </div>



</div>

<script src="<?php echo base_url() ?>/assets/js/jquery-3.3.1.slim.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>

</body>


<?php $this->load->view('layout/footer');
?>