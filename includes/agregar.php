<?php
session_start();
include('conectar.php');
$email=$_SESSION['usuario'];
$emaila=$_SESSION['amigo'];
$status="enviada";
$insertar="INSERT INTO amigos VALUES( NULL, '$email','$emaila','$status')";
	$ejecutar=mysql_query($insertar);
	//$insertar2="INSERT INTO amigos VALUES( NULL, '$emaila','$email','$status')";
	//$ejecutar2=mysql_query($insertar2);
	header("Location: ../muroamigo.php");

?>