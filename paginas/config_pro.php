<?php
session_start();
include 'function.php';
include 'cabecera.php';
 ?>

 <section>
   <div class="container-fluid">
     <div class="row  col-lg-12" style="margin-top: 5%;">
       <div class="col-lg-6">
         <h3 style="text-align: center">Lista De Productos</h3>
         <div class="row">

            <table border="1" width="100%" style="text-align: center">
            	<tr>
            		<th width="41%">Nombres</th>
            		<th width="46%">Descripción</th>
                <th width="41%">Precio</th>
                <th width="41%">Cantidad</th>
            		<th width="13%">Opciones</th>
            	</tr>
              <?php

              $cod=$_SESSION['id_usuario'];
             $sql = "select * from productos where Cod_super='$cod'";
             $result = db_query($sql);
               while($row = mysqli_fetch_object($result)){
               ?>
               <tr>
             		<td><?php echo $row->nombre;?></td>
                <td><?php echo $row->detalle;?></td>
                <td><?php echo $row->precio;?></td>
                <td><?php echo $row->cantidad;?></td>
             		<td>
              <form  method="post">
                <input type="text" name="idpro" hidden value="<?php echo $row->codpro ?>">
                <input type="submit" name="submit" value="Editar" class="btn btn-primary btn-sm">
              </form>

             <a class="btn btn-secondary btn-sm " href="borrar.php?id=<?php echo $row->codpro;?>">Borrar</a>
             </td>
             	</tr>
             	<?php } ?>
            </table>
         </div>
       </div>

       <div class="col-lg-5" style="margin-left: 2%;">


         <?php
         if (isset($_POST['submit'])) {
           select_id('productos','codpro',$_POST['idpro']);

          ?>

           <h1 style="text-aling: center;">Configuración de Producto</h1>
           <form action="" method="post" >
             <div class="form-group">
               <label for="formGroupExampleInput">Nombre</label>
               <input type="text" class="form-control" value="<?php echo $row->nombre; ?>"  placeholder="Nombre del Producto" required name="nombre">
             </div>
             <div class="form-group">
               <label for="formGroupExampleInput">Precio</label>
               <input type="text" class="form-control" value="<?php echo $row->precio; ?>"   placeholder="Ingrese el Precio del Producto" required name="precio">
             </div>
             <div class="form-group">
               <label for="exampleInputEmail1">Stok</label>
               <input type="text" class="form-control"  value="<?php echo $row->stock; ?>" placeholder="Stok del Producto" required name="stok">
             </div>

             <div class="form-group">
               <label for="formGroupExampleInput">Cantidad</label>
               <input type="text" class="form-control" value="<?php echo $row->cantidad; ?>"  placeholder="Cantidad Disponible" required name="cantidad">
             </div>
             <div class="form-group">
               <label for="formGroupExampleInput">Detalle</label>
               <input type=" text" class="form-control" value="<?php echo $row->detalle; ?>" placeholder="Detalle del Producto" style="height: 100px;" required name="detalle">
             </div>
             <div class="form-group">
               <input type=" text" hidden class="form-control" value="<?php echo $row->codpro; ?>"  name="codpro">
             </div>
             <input type="submit" name="editar" value="Actualizar" class="btn btn-primary btn-lg mar" >

           </form>
           <?php
         }else {
           ?>

           <h1 style="text-aling: center;">Ingresar Producto</h1>
           <form action="config_pro.php" method="post" >
             <div class="form-group">
               <label for="formGroupExampleInput">Nombre</label>
               <input type="text" class="form-control"   placeholder="Nombre del Producto" required name="nombre">
             </div>
             <div class="form-group">
               <label for="formGroupExampleInput">Precio</label>
               <input type="text" class="form-control"   placeholder="Ingrese el Precio del Producto" required name="precio">
             </div>
             <div class="form-group">
               <label for="exampleInputEmail1">Stok</label>
               <input type="text" class="form-control"   placeholder="Stok del Producto" required name="stok">
             </div>

             <div class="form-group">
               <label for="formGroupExampleInput">Cantidad</label>
               <input type="text" class="form-control"   placeholder="Cantidad Disponible" required name="cantidad">
             </div>
             <div class="form-group">
               <label for="formGroupExampleInput">Detalle</label>
               <input type=" text" class="form-control"  placeholder="Detalle del Producto" style="height: 100px;" required name="detalle">
             </div>


             <input type="submit" name="agregar" value="Agregar" class="btn btn-primary btn-lg mar" >
           </form>

           <?php
         }
          ?>
<?php

  if(isset($_POST['editar'])){


     $nm=$_POST['nombre'];
     $pr=$_POST['precio'];
     $stk=$_POST['stok'];
     $can=$_POST['cantidad'];
     $dtl=$_POST['detalle'];
     $cp=$_POST['codpro'];

     $sql = "update productos set nombre = '$nm', precio = '$pr', stock = '$stk', cantidad = '$can', detalle = '$dtl' where `productos`.codpro = '$cp';";
    $result = db_query($sql);

    ?>
    <meta http-equiv="refresh" content="1" />
    <?php

  }else {
    if (isset($_POST['agregar'])) {
      $dir=$_SESSION['id_usuario'];
      $field =array("nombre"=>$_POST['nombre'],"precio"=>$_POST['precio'],"stock"=>$_POST['stok'],"cantidad"=>$_POST['cantidad'],"detalle"=>$_POST['detalle'],"Cod_super"=>$dir);
      $tbl = "productos";
      insert($tbl,$field);
      ?>
      <meta http-equiv="refresh" content="1" />
      <?php
    }
  }


 ?>


   </div>
   </div>


 </section>

 <?php
include 'piedepagina.php';
  ?>
