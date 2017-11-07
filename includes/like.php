<?php

if(isset($_SESSION['usuario']) && isset($_GET['idpub']) && isset($_GET['like']) ){
	$email=$_SESSION['usuario'];
$id=$_GET['idpub'];
$like=$_GET['like'];
	$insertar="INSERT INTO likes VALUES( '$email',$id,'$like')";
	$ejecutar=mysql_query($insertar);
	header("Location: ../.php");
}



?>