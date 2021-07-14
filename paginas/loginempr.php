<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link  rel="icon"   href="../imagen/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="../css/bootstrap.css">
  </head>

  <body>
    <!--cabecera-->
    <header>
      <nav class="nabvar navbar-light"style="margin-bottom:10%">
        <div class="container">
          <ul class="navbar-nav mr-auto text-uppercase font-weight-normal">
            <li class="nav-item">
             <a class="nav-link" href="../index.html" style="width: 5%; font-weight: bold;">Atras</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!--Cuerpo del login-->
    <section id="session">
      <div class="conteiner-fluid" style="margin-left: 14%;">
        <div class="row fullscreen align-items-center col-lg-10">
          <div class="col-lg-6">
            <img src="../imagen/pgini/DELYSHOP1.PNG" alt="" style=" width:100%;">
          </div>


          <div class="col-lg-6" >
            <h1 style="text-aling: center;">Iniciar Sesión para Empresa</h1>
            <form action="" method="post">
              <div class="form-group">
                <label for="exampleInputEmail1">Correo</label>
                <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Ingresa Tu Correo" requerid name="email">

              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control"  placeholder="Ingresa tu contraseña" requerid name="contras">
             </div>

             <input type="submit" name="submit" value="Entrar" class="btn btn-primary btn-lg mar">
             <a type="submit"   class="btn btn-primary btn-lg mar " href="regempre.php">Registrate</a>

           </form>
           <? echo $mensaje; ?>
          </div>
        </div>
      </div>
    </section>

    <?php
    include ('function.php');
    global $id;
    if (isset($_POST['submit'])) {
      $usuario_log=$_POST['email'];// CONTENER EN UNA VARIABLE LO ESCRITO EN EL INPUT USUARIO_LOG
    	$contrasena_log=$_POST['contras'];//CONTENER EN UNA VARIABLE LO ESCRITO EN EL INPUT CONTRASEÑA_LOG
      $sql = "select * from empresa where correo='$usuario_log' and pas='$contrasena_log'";
      $result = db_query($sql);
      while($row = mysqli_fetch_object($result)){
        $id = $row->cod_empresa;
        if ($id>0) {
          date_default_timezone_set('America/Panama');
          $entrando=date('Y-M-D G:i:s');
          $estage="conectado";
          $field = array("estado"=>$estage,"time_login"=>$entrando);
          $tbl = "empresa";
          $camp="cod_empresa";
          $tbl = "empresa";
          edit($tbl,$field,'cod_empresa',$id);
          session_start();
          $_SESSION['tabla']=$tbl;
          $_SESSION['campo']=$camp;
          $_SESSION['id_usuario']=$id;
          header("location:inicio_empresa.php?id=$id");


        }
      }
    }else {
      $mensaje='<div class="alert alert-danger alert-dismissable col-md-offset-4 col-md-3 text-center">
  	<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  	Datos <strong>incorrectos</strong>, vuelva a intentarlo.</div>';//ALERTA DE QUE EL USUARIO NO ESTA REGISTRADO.
    }

    	?>


  </body>
</html>
