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
            <h1 style="text-aling: center;">Inciar Sesión</h1>
            <form>
              <div class="form-group">
                <label for="exampleInputEmail1">Correo</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingresa Tu Correo">

              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Ingresa tu contraseña">
             </div>
             <input type="submit" name="bton" value="Entrar" class="btn btn-primary btn-lg mar">

             <a role="button" href="registro.php" class="btn btn-primary btn-lg mar">Registrate</a>
           </form>
          </div>
        </div>
      </div>
    </section>



  </body>
</html>
