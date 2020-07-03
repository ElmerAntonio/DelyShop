<?php
session_start();
include 'cabecera.php';
 ?>

  <!--cuerpo y lista de super-->
<section >

  <div class="container-fluid">
    <h1 id="hcon">Empresas</h1>
    <p id="hcon" style="margin-top: -4%;font-family: sans-serif;font-size: 154%;">Selececione donde va a realizar sus compras</p>
    <div class="row justify-content-center aling-items-center"style="
    padding-bottom: 5%;">
      <div class="col-lg-7">


      <table class="conf">

      <?php
      include 'function.php';
      	$sql = "select * from empresa";
      	$result = db_query($sql);
      	while($row = mysqli_fetch_object($result)){
      	?>

          <th >
                 <p><?php  echo $row->nombre ;?></p>
                <img src="../imagen/empresas/<?php  echo $row->nombre ;?>.jpg" class="imgtb">

                <br>

                <a type="submit" class="btn btn-primary bncon" href="principal.php?id=<?php echo $row->cod_empresa; ?>">Selecionar</a>

          </th>




      	<?php } ?>
      </table>
      </div>
    </div>
  </div>
</section>

<!--parte final de la pagina-->
<section class="slid">

  <div class="container-fluid">
    <div class="row justify-content-center aling-items-center">

      <!--slider de publicidad-->
      <div class="col-lg-9 no-padding ">

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">

        <div class="carousel-inner">

          <div class="carousel-item active">
           <img src="../imagen/anuncios/anuncio1.jpg" class="d-block w-100" alt="Primer Anuncio">
          </div>

          <div class="carousel-item">
            <img src="../imagen/anuncios/anuncio3.jpg" class="d-block w-100" alt="Segundo Anuncio">
          </div>

      </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span></a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="sr-only">Next</span>
         </a>
        </div>
       </div>

    </div>
  </div>
</section>

<?php
include 'piedepagina.php';
 ?>
