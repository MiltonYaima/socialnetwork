<?php
include('includes/conectar.php');
include('includes/checarycerrar.php');
include('includes/time_stamp.php');

if(isset($_SESSION['usuario']) && isset($_GET['idpub']) && isset($_GET['like']) ){
	$email=$_SESSION['usuario'];
$id=$_GET['idpub'];
$like=$_GET['like'];
	$insertar="INSERT INTO likes VALUES( '$email',$id,'$like')";
	$ejecutar=mysql_query($insertar);
	header("Location: pinicio.php");
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" media="screen" href="includes/menus.css" />
	<title>SENA UP!</title>
	<!--LINKS MATERIALIZE-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--FIN LINKS MATERIALIZE-->
	<link href="includes/css/formularios.css" rel="stylesheet" type="text/css">
	<script type="text/javascript">
	$(document).ready(function(){

	$(".busca").keyup(function() //se crea la funcioin keyup
	{
	var texto = $(this).val();//se recupera el valor de la caja de texto y se guarda en la variable texto
	var dataString = 'palabra='+ texto;//se guarda en una variable nueva para posteriormente pasarla a search.php
	if(texto=='')//si no tiene ningun valor la caja de texto no realiza ninguna accion
	{
	}
	else
	{
	$.ajax({//metodo ajax
	type: "POST",//aqui puede  ser get o post
	url: "includes/search.php",//la url adonde se va a mandar la cadena a buscar
	data: dataString,
	cache: false,
	success: function(html)//funcion que se activa al recibir un dato
	{
	$("#display").html(html).show();// funcion jquery que muestra el div con identificador display, como formato html, tambien puede ser .text
		}
	});
	}return false;    
	});
	});
	jQuery(function($){//funcion jquery que muestra el mensaje "Buscar amigos..." en la caja de texto
	   $("#caja_busqueda").Watermark("Buscar amigos...");
	   });
	</script>
	</head>

<body style="background: #eeeeee">

	<ul id="midropdown" class="dropdown-content">
		<li><a href="#">crear pagina</a></li>
	    <li><a href="#">crear grupo</a></li>
	    <li><a href="includes/configuracion.php">configuracion</a></li>
	</ul>

<nav>
	<div class="nav-wrapper row teal">
		<div class=" col s3 m3">
			<a href="#!" class="brand-logo"><i><img src="imagenes/epa.png" border="0" width="24" heigth="24"></i><span class="chapter-tittle"> SENA UP!</span></a>
		</div>
		
			

			<form class="left search col s6">
				<div class="input-field">
					<input type="search" id="search" name="">
					<label class="active" for="search"><i class="material-icons">search</i></label>
					<i class="material-icons">close</i>
				</div>
			</form>
		<ul id="nav-mobile" class="right hide-on-small-only">
			<li><a href="#"><i class="material-icons">notifications</i></a></li>
			<li><a href="#"></a><i class="material-icons">message</i></li>
			<li><a href="#" class="dropdown-button" data-activates="midropdown"><i class="material-icons">details</i></a></li>
		</ul>
	</div>
</nav><br>

<div class="row">
	<!--INICIO MENU DE LA IZQUIERDA-->
	<div class="col s3">
		<div class="row">
			<div class="col s2">
				
			</div>
			<div class="col s10">
				<?php include("includes/menu.php");?>
			</div>
		</div>
	</div>
	<!--FIN MENU DE LA IZQUIERDA-->

	<!--INICIO PUBLICACIONES-->
	<div class="col s6">
		<div class="row">
			<div class="col s12">
				<?php include("includes/publicaciones.php");?>
			</div>
		</div>
	</div>
	<!--FIN PUBLICACIONES-->

	<!--INICIO MENU DERECHA-->
	<div class="col s3">
		<div class="row">
			<div class="col s1">
				
			</div>
			<div class="col s11">
				<?php include("includes/session.php");?>
			</div>
		</div>
	</div>
	<!--FIN MENU DERECHA-->
</div><br>
	
	<!--INICIO FOOTER-->	
	<footer class="page-footer teal">
	    <div class="footer-copyright teal darken-2">
	        <div class="container">
	        © 2017 Copyright All Rights Reserved
	        <a class="grey-text text-lighten-4 right" href="#!">ADSI 120</a>
	        </div>
	    </div>
	</footer>
	<!--FIN FOOTER-->		

	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<script type="text/javascript" src="js/jquery.oembed.js"></script>
    <script type="text/javascript" src="js/jquery.watermarkinput.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
</body>
</html>

