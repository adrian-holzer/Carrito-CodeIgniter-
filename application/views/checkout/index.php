<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
?>



<?php $this->load->view('layout/header');
?>

<div class="checkout">
    <h2 class="my-4 text-center">Datos de la Compra y Confirmación</h2>
    <div class="row" >
        <table  class="table table-dark m-4 col-12">

            <thead>
                <tr>
                    <th scope="col" width="13%"></th>
                    <th scope="col">Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($this->cart->total_items() > 0) {
                    foreach ($carritoItems as $item) { ?>
                        <tr>
                            <td>
                                <?php $imageURL = !empty($item["image"]) ? base_url('uploads/product_images/' . $item["image"]) : '' ?>
                                <img src="<?php echo $imageURL; ?>" width="75" />
                            </td>
                            <td><?php echo $item["name"]; ?></td>
                            <td><?php echo '$' . $item["price"]; ?></td>
                            <td><?php echo $item["qty"]; ?></td>
                            <td><?php echo '$' . $item["subtotal"]; ?></td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="5">
                            <p>El carrito está vacío...</p>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="4"></td>
                    <?php if ($this->cart->total_items() > 0) { ?>
                        <td>
                            <strong>Total <?php echo '$' . $this->cart->total(); ?></strong>
                        </td>
                    <?php } ?>
                </tr>
            </tfoot>
        </table>

       


        <form class="form-checkout col-12"  method="post">
            <div>
                <h5 style=" font-size: 2rem;; text-align:center; margin:3rem;">Información del cliente</h5>


                <div class="form-group">
                    <label class="control-label col-sm-2">Nombre:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="nombre" value="<?php echo !empty($cData['nombre']) ? $cData['nombre'] : ''; ?>" placeholder="Ingrese su nombre">
                        <?php echo form_error('nombre', '<p class="help-block error">', '</p>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Email:</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" name="email" value="<?php echo !empty($cData['email']) ? $cData['email'] : ''; ?>" placeholder="Ingrese su email">
                        <?php echo form_error('email', '<p class="help-block error">', '</p>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Teléfono:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="telefono" value="<?php echo !empty($cData['telefono']) ? $cData['telefono'] : ''; ?>" placeholder="Ingrese su teléfono">
                        <?php echo form_error('telefono', '<p class="help-block error">', '</p>'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2">Dirección:</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="direccion" value="<?php echo !empty($cData['direccion']) ? $cData['direccion'] : ''; ?>" placeholder="Ingrese su dirección">
                        <?php echo form_error('direccion', '<p class="help-block error">', '</p>'); ?>
                    </div>


                </div>
                <div class="footBtn" style="margin:3rem;">
                    <a href="<?php echo base_url('carrito/'); ?>" class="btn btn-warning" ><i class="fas fa-arrow-left" style="font-size:15px;"></i> Volver</a>
                    <button type="submit" name="realizarPedido" class="btn btn-success orderBtn" >Confirmar <i class="fas fa-arrow-right" style="font-size: 15px;"></i></button>
                </div>
            </div>

        </form>
    </div>
</div>
</div>

<script src="<?php echo base_url() ?>/assets/js/jquery-3.3.1.slim.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="<?php echo base_url() ?>/assets/js/bootstrap.min.js"></script>
</body>


<?php $this->load->view('layout/footer');
?>