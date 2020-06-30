<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro de Empresa</title>
    <link  rel="icon"   href="../imagen/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap.css">


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
  </head>
  <body


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
            <form action="" method="post" name="f1">
              <div class="form-group">
                <label for="formGroupExampleInput">Nombre de la Empresa</label>
                <input type="text" class="form-control"  placeholder="Nombre de Tu Empresa" required name="empresa">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Ubicacion del Local</label>
                <input type="text" class="form-control"  placeholder="Ubicacion" required name="ubicacion">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Correo</label>
                <input type="email" class="form-control"  aria-describedby="emailHelp" placeholder="Ingresa el correo de la empresa Correo" required name="email">
              </div>

              <div class="form-group">
                <label for="formGroupExampleInput">Cuenta</label>
                <input type="text" class="form-control"  placeholder="#Cuenta" required name="cuenta">
              </div>
              <div class="form-group">
                <label for="formGroupExampleInput">Telefono</label>
                <input type="tel" class="form-control"  placeholder="Telefono"  required name="telefono">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control"  placeholder="Ingresa tu contraseña" required name="password">
                <input type="password" class="form-control"  placeholder="Confirme su Contraseña" required name="password2">
             </div>
             <input type="submit" name="submit" value="Registro" class="btn btn-primary btn-lg mar" onclick="comprobarClave()">
             <a type="button" href="login.php" value="Entrar" class="btn btn-primary btn-lg mar" >Iniciar Sesión</a>


           </form>
           <?php
           
           	include("function.php");
              if(isset($_POST['submit'])){
                 $field =array("nombre"=>$_POST['empresa'],"ubicacion"=>$_POST['ubicacion'],"cuenta"=>$_POST['cuenta'],"pas"=>$_POST['password'],"correo"=>$_POST['email'],"telefono"=>$_POST['telefono']);
                 $tbl = "empresa";
                 insert($tbl,$field);
                 header('Location: login.php');
               }

           ?>
          </div>
        </div>
      </div>
    </section>



  </body>
</html>
