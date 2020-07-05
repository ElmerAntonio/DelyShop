<?php

if ($_SESSION['tabla'] == "empresa") {
  $tabn= "inicio_empresa.php";
}else {
  if ($_SESSION['tabla'] == "clientes") {
    $tabn= "selecempresa.php";
  }
}
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>DelyShop</title>
    <link type="text/css" href="../css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/tablas.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/bootstrap-grid.css">
    <link  rel="icon"   href="../imagen/favicon.ico" type="image/ico">
    <link rel="stylesheet" href="../css/estilo.css">
    <link rel="stylesheet" href="../css/flexsearch.css"/>
    <link rel="stylesheet" type="text/css" href="../css/cart.css">
    </head>

    <body>
      <!--navegador-->
      <header class="heder">
        <!--Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light grey lighten-3">

          <div class="container">

            <a class="navbar-brand py-0"style="width: 70%;"><img src="../imagen/icono.png" style="width: 15%; heigth: 15%">DELYSHOP </a>

           <!-- Links -->
           <ul class="navbar-nav mr-auto text-uppercase font-weight-normal">
             <li class="nav-item">
              <a class="nav-link" href="<?php echo $tabn; ?>?id=<?php echo $_SESSION['id_usuario']; ?>&table=<?php echo $_SESSION['tabla'];?>&campo=<?php echo $_SESSION['campo']; ?>">Inicio</a>
             </li>

             <li class="nav-item">
              <a class="nav-link" href="musuario.php?id=<?php echo $_SESSION['id_usuario']; ?>&table=<?php echo  $_SESSION['tabla'];?>&campo=<?php echo $_SESSION['campo']; ?>">Configuración</a>
             </li>

             <li class="nav-item">
              <a class="nav-link" href="cerrar.php?id=<?php echo $_SESSION['id_usuario']; ?>&table=<?php echo $_SESSION['tabla'];?>&campo=<?php echo $_SESSION['campo']; ?>">Cerrar Sesion</a>
             </li>

           </ul>

         </div>

        </nav>
      </header>
