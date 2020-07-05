<?php
session_start();
include 'function.php';

include 'cabecera.php'
 ?>


 <script>
 function comprobarClave(){
 clave1 = document.f1.password.value
 clave2 = document.f1.password2.value

 if (clave1 == clave2){
    alert("Las dos claves son iguales...")
    var consulta = "exito"
 }else{
    alert("Las dos claves son distintas...")
  }
 }
 </script>

 <body>
<?php

select_id($_SESSION['tabla'],$_SESSION['campo'],$_SESSION['id_usuario']);
 ?>

<?php
if ($_SESSION['tabla'] == "clientes") {
  ?>
   <!--Cuerpo -->
  <section >
    <div class="conteiner-fluid" style="margin-left: 14%;">
      <div class="row fullscreen align-items-center col-lg-10">
        <div class="col-lg-4">
          <img src="../imagen/pgini/DELYSHOP1.PNG" alt="" style=" width:100%;">
        </div>


        <div class="col-lg-6" style="margin-left:4%;" >
          <h1 style="text-aling: center;">Configuración de Usuario</h1>
          <form action="" method="post" name="f1">
            <div class="form-group">
              <label for="formGroupExampleInput">Nombre</label>
              <input type="text" class="form-control" value="<?php echo $row->nombre;?>"  placeholder="Primer Nombre" required name="nombre">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Apellido</label>
              <input type="text" class="form-control"  value="<?php echo $row->apellido;?>"  placeholder="Primer Apellido" required name="apellido">
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Correo</label>
              <input type="email" class="form-control" value="<?php echo $row->correo;?>" aria-describedby="emailHelp" placeholder="Ingresa Tu Correo" required name="email">
            </div>

            <div class="form-group">
              <label for="formGroupExampleInput">Dirección</label>
              <input type="text" class="form-control" value="<?php echo $row->direccion;?>"  placeholder="Barrio" required name="direccion">
            </div>
            <div class="form-group">
              <label for="formGroupExampleInput">Detalle</label>
              <input type=" text" class="form-control" value="<?php echo $row->dire_detalle;?>" placeholder="Detalle de la Direccion" style="height: 100px;" required name="ddireccion">
            </div>
<?php
}else {
  if ($_SESSION['tabla'] == "empresa") {
    ?>
    <!--Cuerpo -->
    <section >
      <div class="conteiner-fluid" style="margin-left: 14%;">
        <div class="row fullscreen align-items-center col-lg-10">
          <div class="col-lg-4">
            <img src="../imagen/pgini/DELYSHOP1.PNG" alt="" style=" width:100%;">
          </div>


          <div class="col-lg-6" style="margin-left:4%;" >
            <h1 style="text-aling: center;">Configuración de Usuario</h1>
            <form action="" method="post" name="f1">
              <div class="form-group">
                <label for="formGroupExampleInput">Nombre de la Empresa</label>
                <input type="text" class="form-control"readonly value="<?php echo $row->nombre;?>" placeholder="Nombre de Tu Empresa" required name="empresa">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Ubicación del Local</label>
                <input type="text" class="form-control" value="<?php echo $row->ubicacion;?>" placeholder="Ubicacion" required name="ubicacion">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Correo</label>
                <input type="email" class="form-control" value="<?php echo $row->correo;?>" aria-describedby="emailHelp" placeholder="Ingresa el correo de la empresa Correo" required name="email">
              </div>

              <div class="form-group">
                <label for="formGroupExampleInput">Cuenta</label>
                <input type="text" class="form-control"  value="<?php echo $row->cuenta;?>" placeholder="#Cuenta" required name="cuenta">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Telefono</label>
                <input type="tel" class="form-control" value="<?php echo $row->telefono;?>" placeholder="Telefono"  required name="telefono">
              </div>
  <?php
  }
}
 ?>
           <div class="form-group">
             <label for="exampleInputPassword1">Contraseña</label>
             <input type="password" class="form-control"  value="<?php echo $row->pas;?>" placeholder="Ingresa tu contraseña Nueva" required name="password">
             <input type="password" class="form-control"  value="<?php echo $row->pas;?>" placeholder="Confirme su Contraseña Nueva" required name="password2">
          </div>
          <input type="submit" name="submit" value="Actualizar" class="btn btn-primary btn-lg mar" onclick="comprobarClave()">

        </form>

        <?php
        if ($_SESSION['tabla'] == "clientes") {
          if(isset($_POST['submit'])){


             $nm=$_POST['nombre'];
             $ap=$_POST['apellido'];
             $psw=$_POST['password'];
             $corr=$_POST['email'];
             $dr=$_POST['direccion'];
             $ddr=$_POST['ddireccion'];
             $dir=$_SESSION['id_usuario'];
             $sql = "update clientes set nombre = '$nm', apellido = '$ap', correo = '$corr', direccion = '$dr', pas = '$psw', dire_detalle = '$ddr' where `clientes`.codCli = '$dir';";
            $result = db_query($sql);
            ?><meta http-equiv="refresh" content="1" /><?php
           }
        }else {
          if ($_SESSION['tabla'] == "empresa") {
           if(isset($_POST['submit'])){

            $ub=$_POST['ubicacion'];
            $cun=$_POST['cuenta'];
            $pw=$_POST['password'];
            $cor=$_POST['email'];
            $tel=$_POST['telefono'];
            $di=$_SESSION['id_usuario'];
            $sql = "update empresa set ubicacion = '$ub', cuenta = '$cun', pas = '$pw', correo = '$cor', telefono = '$tel' where `empresa`.cod_empresa = '$di';";
           $result = db_query($sql);
           ?><meta http-equiv="refresh" content="1" /><?php
            }
          }
        }
        ?>
       </div>
     </div>
   </div>
 </section>
<?php
include 'piedepagina.php';
 ?>
