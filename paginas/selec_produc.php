<?php
# Tips de Ejemplo como generar un número y letra y mostrarlo en php

//Variables
$DesdeLetra = "a";
$HastaLetra = "z";
$DesdeNumero = 1;
$HastaNumero = 100;

$letraAleatoria = chr(rand(ord($DesdeLetra), ord($HastaLetra)));
$numeroAleatorio = rand($DesdeNumero, $HastaNumero);


echo "<strong>codigo aleatorio:  ".$numeroAleatorio.$letraAleatoria."<br/>";


 ?>
