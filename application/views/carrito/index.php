<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
$this->load->view('layout/header');

?>

<script>
    function updateCartItem(obj, rowid) {



        let formData = new FormData();

        formData.append('rowid', rowid);
        formData.append('qty', obj.value);


        let xhr = new XMLHttpRequest();

        xhr.open("POST", '<?= base_url('carrito/updateCantItems/') ?>');

        xhr.onload = function() {


            if (xhr.status == 200) {


                console.log(JSON.parse(xhr.responseText));
            }

        }

        xhr.send(formData);




    }
</script>



<div class="container">

    <h2 style="text-align:center; margin:3rem;">Carrito de Compras</h2>
    <div style="margin-bottom:3rem ;">



        <table class="carrito-tabla table table-dark">



            <thead>


                <tr>

                    <style>
                        th,
                        td {


                            text-align: center;
                        }
                    </style>
                    <th scope="col"></th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col" style="width: 13%;">Cantidad</th>
                    <th scope="col">Subtotal</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php if ($this->cart->total_items() > 0) {

                    foreach ($carritoItems as $item) {    ?>
                        <tr>
                            <td>
                                <?php $imageURL = !empty($item["image"]) ? base_url('uploads/product_images/' . $item["image"]) : '' ?>
                                <img src="<?php echo $imageURL; ?>" width="50" />
                            </td>
                            <input id="id" name="id" min="0" type="hidden" class="form-control text-center" value="<?php echo $item["id"]; ?>">
                            <td><?php echo $item["name"]; ?></td>
                            <td><?php echo '$' . $item["price"]; ?></td>
                            <td><input type="number" style="color: white;background-color: #212529;" class="form-control text-center" min="0" value="<?php echo $item["qty"]; ?>" onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')"></td>
                            <td><?php echo '$' . $item["subtotal"]; ?></td>
                            <td>
                                <a href="<?php echo base_url('carrito/removeItem/' . $item["rowid"]); ?>" class="btn btn-danger" onclick="return confirm('¿Estas seguro de eliminar este objeto del carrito?')"><i class="fas fa-trash-alt" style="font-size: 15px;"></i></a>
                            </td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="6">
                            <p><strong>El carrito está vacio...</strong></p>
                        </td>
                    <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td><a href="<?php echo base_url('productos/'); ?>" class="btn btn-warning"><i class="fas fa-arrow-left" style="font-size:15px;"></i> Atras</a></td>
                    <td colspan="3"></td>
                    <?php if ($this->cart->total_items() > 0) { ?>
                        <td class="text-left">Total: <b><?php echo '$' . $this->cart->total(); ?></b></td>

                        <td>
                            <a href="<?php echo base_url('carrito/removeAll') ?>" class="btn btn-danger" onclick="return confirm('¿Estas seguro de vaciar el carrito?')">Vaciar</a>
                        </td>
                        <td><a href="<?php echo base_url('checkout/'); ?>" class="btn btn-success">Checkout <i class="fas fa-arrow-right" style="font-size: 15px;"></i></a></td>

                    <?php } ?>


                </tr>
            </tfoot>
        </table>
    </div>
</div>
<script src="<?php echo base_url() ?>/assets/js/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>


</body>


<?php $this->load->view('layout/footer');
?>