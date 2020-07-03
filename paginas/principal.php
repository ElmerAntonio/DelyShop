<?php
include 'function.php';
include 'carrito.php';

session_start();
$cod=$_REQUEST['id'];
include 'cabecera.php';

 ?>


<!-- contenido -->
    <section>

      <div class="container">
        <br>
        <div class="alert alert-success">

          <a href="#" class="badge badge-success">Ver Carro</a>
        </div>

        <div class="row">

          <?php

          $sql = "select * from productos where Cod_super='$cod'";
        	$result = db_query($sql);
          	while($row = mysqli_fetch_object($result)){
           ?>

          <div class="col-3">

            <div class="card">
              <img  src="../imagen/productos/<?php echo $row->nombre;?>.jpg" class="card-img-top" height="317px" alt="Titulo" data-toggle="popover" data-trigger="hover" title="<?php echo $row->nombre;?>" data-content="<?php echo $row->detalle;?>">

              <div class="card-body">

                <span><?php echo $row->nombre;?></span>

                <h5 class="card-title"><?php echo $row->precio;?></h5>
                <p class="card-text">Descripcion</p>
                <p class="card-text">Disponible:<?php echo $row->cantidad;?></p>


                <form class="" action="" method="post">
                    <input type="hidden" name="ide" id="ide" value="<?php $row->codpro;?>">

                  <input type="hidden" name="name" id="nombre" value="<?php echo $row->nombre;?>">

                  <input type="hidden" name="price" id="precio" value="<?php echo$row->precio;?>">

                  <input type="hidden" name="quantity" id="cantidad" value="<?php echo 1;?>">

                  <button type="submit" class="btn btn-primary" name="agregar" value="agregar">Agregar al Carrito</button>
                </form>
              </div>
            </div>
          </div>

          <?php } ?>

        </div>
      </div>
    </section>


    <?php
    if(!empty($_SESSION['micompra'])):

         $total = 0;

         foreach($_SESSION['micompra'] as $key => $product):
    ?>
    <tr>
       <td><?php echo $product['name']; ?></td>
       <td><?php echo $product['quantity']; ?></td>
       <td>
           <a href="index2.php?action=delete&id=<?php echo $product['id']; ?>">
                <div ><img src="img/del2.png" width="25" height="25"></div>
           </a>
       </td>
    </tr>
    <?php
              $total = $total + ($product['quantity'] * $product['price']);
              $_SESSION["total"]=$total;
         endforeach;
    ?>
    <tr>
         <td  align="left">Total</td>
         <td align="left">$ <?php echo number_format($total, 2); ?></td>
         <td></td>
    </tr>
    <tr>
        <!-- Mostrar botón de pago solo si el carrito de compras no está vacío-->
        <td colspan="5">
         <?php
            if (isset($_SESSION['micompra'])):
            if (count($_SESSION['micompra']) > 0):
         ?>
            <a href="descuento.php" class="button">Checkout</a>
         <?php endif; endif; ?>
        </td>
    </tr>
    <?php
    endif;
    ?>
    </table>



<?php
include 'piedepagina.php';
 ?>
