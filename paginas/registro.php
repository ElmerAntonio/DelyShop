<?php

   require '../utils/conexion.php';

   if (!empty($_POST['nombre']) && !empty($_POST['apellido'] ) & !empty($_POST['email'] ) && !empty($_POST['direccion'] ) && !empty($_POST['ddireccion'] ) && !empty($_POST['password'] )&& !empty($_POST['password2'] )) {
     if ($_POST["password"] == $_POST["password2"]) {
       $sql = "INSERT INTO `clientes` (`codCli`, `nombre`, `apellido`, `correo`, `direccion`, `pas`, `dire_detalle`) VALUES (NULL, :nombre, :apellido, :correo, :direccion, :password, :ddetalle)";
       $meto = $con -> prepare($sql);
       $meto->bindParam(':nombre', $_POST['nombre']);
       $meto->bindParam(':apellido', $_POST['apellido']);
       $meto->bindParam(':correo', $_POST['email']);
       $meto->bindParam(':direccion', $_POST['direccion']);
       $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
       $meto->bindParam(':correo', $password);
       $meto->bindParam(':ddetalle', $_POST['ddireccion']);

       if ($meto->execute()) {
         $message = 'Se ha creado un nuevo usuario';
       }else {
         $message = 'Lo sentimos tenemos problemas al guadar su cuenta';
       }
     }
   }

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro</title>
    <link  rel="icon"   href="../imagen/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.css">

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&signed_in=true&libraries=places"></script>
    <script src="../js/localiza.js"></script>

  </head>
  <body

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>
    <!--cabecera-->
    <header>
      <nav class="nabvar navbar-light"style="margin-bottom:5%">
        <div class="container">
          <ul class="navbar-nav mr-auto text-uppercase font-weight-normal">
            <li class="nav-item">
             <a class="nav-link" href="../index.html" style="width: 5%; font-weight: bold;">Home</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!--Cuerpo del login-->
    <section id="session">
      <div class="conteiner-fluid" style="margin-left: 14%;">
        <div class="row fullscreen align-items-center col-lg-10">
          <div class="col-lg-4">
            <img src="../imagen/pgini/DELYSHOP1.PNG" alt="" style=" width:100%;">
          </div>


          <div class="col-lg-6" style="margin-left:4%;" >
            <h1 style="text-aling: center;">Registro</h1>
            <form action="registro.php" method="POST">
              <div class="form-group">
                <label for="formGroupExampleInput">Nombre</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Primer Nombre" required name="nombre">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Apellido</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Primer Apellido" required name="apellido">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Correo</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa Tu Correo" required name="email">
              </div>

              <div class="form-group">
                <label for="formGroupExampleInput">Direccion</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Barrio" required name="direccion">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Detalle</label>
                <input type=" text" class="form-control" id="formGroupExampleInput" placeholder="Detalle de la Direccion" style="height: 100px;" required name="ddireccion">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingresa tu contraseña" required name="password">
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Confirma tu contraseña" required name="password2">
             </div>
             <input type="submit" name="bton" value="Entrar" class="btn btn-primary btn-lg mar">

             <a role="button" href="login.php" class="btn btn-primary btn-lg mar">Inicia Sesión</a>
           </form>
          </div>
        </div>
      </div>
    </section>



  </body>
</html>
