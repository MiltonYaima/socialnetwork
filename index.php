 
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Sena UP! Login </title>
	<!--LINKS MATERIALIZE-->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="css/materialize.min.css"  media="screen,projection"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<!--FIN LINKS MATERIALIZE-->
</head>
<body style="background: #eeeeee">
	<!--LINKS MATERIALIZE JS-->
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script type="text/javascript" src="js/materialize.min.js"></script>
	<!--FIN LINKS MATERIALIZE JS-->

<nav>
	<div class="nav-wrapper row teal">
		<div class=" col s3 offset-s1">
			<ul>
			<li><a href="#!" class="brand-logo"><i><img src="imagenes/epa.png" border="0" width="35" heigth="30"></i><span class="chapter-tittle"> SENA UP!</span></a></li>
			<li style="margin-left: 260px;"><button class="btn waves-effect orange"><a style="text-decoration: none;" href="registro.php">Registrarse</a></button></li>
		</ul>

		</div>
	</div>
</nav>



<div class="row" style="margin-top: 20px">
	<div class="col s12" style="margin-left: 20px">

		<!--INICIO REGISTRO+++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
		
		<!--FIN REGISTRO++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

		<!--INICIO LOGIN++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<form name="form1" action="" method="POST">
			<div class="col s6 offset-s1 z-depth-4  teal lighten-5">
				<div class="col s12 card-panel orange lighten-1">
					<h5 class="center-align">Login</h5>
				</div>
			
				<div class="input-field col s6">
				  <i class="material-icons prefix">email</i>
				  <input id="icon_prefix" type="email" name="email" required class="validate">
				  <label for="icon_prefix">Email</label>
				</div>
			
				<div class="input-field col s6">
				  <i class="material-icons prefix">https</i>
				  <input id="icon_prefix" type="password" name="password" required class="validate">
				  <label for="icon_prefix">Contraseña</label>
				</div>
			
				<div class="col s12 center-align" style="padding-bottom: 15px">
					<input type="hidden" name="iniciar" value="ok">
					<button class="btn waves-effect waves-light" type="submit" value="Entrar">INGRESAR
					    <i class="material-icons right">send</i>
					</button>
				</div>
				<div class=" col s12 center-align">
				<?php
include('includes/conectar.php');
session_start();

if(isset($_SESSION['usuario'])){	
		header("Location: pinicio.php");
}


if(isset($_POST['iniciar']) && $_POST['iniciar']=="ok"){
	$email=$_POST['email'];
	$pass=md5($_POST['password']);
	$query="SELECT * FROM usuario WHERE email='".$email."' AND pass='".$pass."' ";
	$ver=mysql_query($query);
	$siesta=mysql_num_rows($ver);
	$stat=mysql_fetch_assoc($ver);
	print_r($stat);

	
		if($siesta==1 && $stat['status']==2){
			$_SESSION['usuario']=$email;
			$_SESSION['amigo']=$email;
			header("Location: pinicio.php");
		
				}elseif ($stat['status']==1) {
				 	
				 
					echo "<h4> Tu cuenta aun no está confirmada, Revisa tu Correo!";
				}
				else{
					echo "<script type='text/javascript'> 
			                alert('Usuario o contraseña incorrecta');</script>";
					}

}
				
					?>
				</div>
			</div>
		</form>
		<!--FIN LOGIN++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

		<div class="col s6 offset-s1" style="margin-top: 50px">
			<div class="col s6">
				<img class="responsive-img" src="imagenes/logosena.png">
			</div>
			<div class="col s6 center-align">
				<img class="responsive-img" src="imagenes/epa.png">
				<h3>SENA UP!</h3>
			</div>
		</div>
	</div>
</div>

<footer class="page-footer teal">
    <div class="footer-copyright teal darken-2">
        <div class="container">
        © 2017 Copyright All Rights Reserved
        <a class="grey-text text-lighten-4 right" href="#!">ADSI 120</a>
        </div>
    </div>
</footer>

<script>
	$(document).ready(function() {
    $('select').material_select();
  	});

	
</script>
<?php

?>
</body>
</html>