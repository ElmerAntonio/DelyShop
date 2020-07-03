<?php

$ID_EM = $_REQUEST['id'];;
echo $ID_EM;
$IDs = $ID_EM;




$product_ids=array();
//session_destroy();
//verificamos si el botón agregar a sido enviado
if (filter_input(INPUT_POST, 'agregar')){
//si la sesion micompra ya existe, es decir si ya le hemos dado al botón agregar más de una vez se hace lo siguiente
if (isset($_SESSION['micompra'])){
  //realizar un seguimiento de cuántos productos hay en el carrito de compras
    $count = count($_SESSION['micompra']);
    //crea una matriz sequantial para hacer coincidir las claves de matriz con los id de los productos
     $product_ids = array_column($_SESSION['micompra'], 'id');
     //pre_r($product_ids);
     if (!in_array(filter_input(INPUT_GET,'id'), $product_ids)){
      $_SESSION['micompra'][$count]= array
      (
   'id' => filter_input(INPUT_GET,'id'),
     'name' => filter_input(INPUT_POST,'name'),
     'price' => filter_input(INPUT_POST,'price'),
     'quantity' => filter_input(INPUT_POST,'quantity')
      );
     }
     else {//producto ya existe, aumentar la cantidad
          //hacer coincidir la clave del conjunto con el id del producto que se agrega al carro
         for ($i=0; $i < count($product_ids);$i++) {
           if ($product_ids[$i]==filter_input(INPUT_GET,'id')){
            $_SESSION['micompra'][$i]['quantity'] += filter_input(INPUT_POST,'quantity');
           }
          # code...
         }
     }

}
  else{ //si la sesion micompra no exite, es decir que es la primera vez que presiona el botón agregar
        //crea el primer producto  de la matriz con indice 0
        //llenando la matriz con los valores enviados del formulario comenzando desde índice 0
    $_SESSION['micompra'][0]= array

(
   'id' => filter_input(INPUT_GET,'id'),
   'name' => filter_input(INPUT_POST,'name'),
   'price' => filter_input(INPUT_POST,'price'),
   'quantity' => filter_input(INPUT_POST,'quantity')
);
}
}
if(filter_input(INPUT_GET, 'action') == 'delete'){
  //recorre todos los productos en el carro de compras hasta que coincida con la variable de identificación GET
  foreach($_SESSION['micompra'] as $key => $product){
      if ($product['id'] == filter_input(INPUT_GET, 'id')){
          //elimina el producto del carrito de compras cuando coincida con el ID GET
          unset($_SESSION['micompra'][$key]);
      }
  }
  //restablece las claves de la matriz de sesión para que coincidan con la matriz numérica $product_ids
  $_SESSION['micompra'] = array_values($_SESSION['micompra']);
}
//pre_r($_SESSION);
function pre_r($array){
echo '<pre>';
print_r($array);
echo '</pre>';
}
?>
?>
