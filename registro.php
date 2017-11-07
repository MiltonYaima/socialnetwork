<?php
include('includes/conectar.php');
require ('mail.php');
session_start();

if(isset($_SESSION['usuario'])){	
		header("Location: pinicio.php");
}

if(isset($_POST['nuevo']) && $_POST['nuevo']=="ok"){
	$nombrefoto="fperfil_".$_FILES['fotos']['name'];
	$email=$_POST['email'];
	$pass=md5($_POST['password']);
	$nom=$_POST['nom'];
	$ape=$_POST['apellido'];
	$f=$_POST['fecha'];
	$sexo=$_POST['sexo'];
	$status=$_POST['status'];	
	$query="SELECT * FROM usuario WHERE email='".$email."'";
	$checasiesta=mysql_query($query);
	$numfilas=mysql_num_rows($checasiesta);
	if($numfilas==0){
		$insertar="INSERT INTO usuario VALUES(concat('$email','$ext'),'$pass','".$f."',concat('$nom',' ','$ape'),'$sexo','$status','$nombrefoto')";
		$ejecutar=mysql_query($insertar);
		
		mkdir("archivos/".$email);
		copy($_FILES['fotos']['tmp_name'],"archivos/".$email."/".$nombrefoto);
		echo "<script type='text/javascript'> 
                alert('El Registro ha sido exitoso');</script>";
         $obj= new mail($email,$pass,$f,$nom,$sexo,$status,$nombrefoto);
				$obj->enviar();
        
	}else{
		echo "<script type='text/javascript'> 
                alert('El email: ".$email." ya se encuentra registrado');</script>";
	}
}
?>


<!DOCTYPE html>
<html lang="en">
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
			<a href="#!" class="brand-logo"><i><img src="imagenes/epa.png" border="0" width="35" heigth="30"></i><span class="chapter-tittle"> SENA UP!</span></a>
		</div>
	</div>
</nav>

<div class="row" style="margin-top: 20px">
	<div class="col s12" style="margin-left: 200px">

		<!--INICIO REGISTRO+++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->	
		<form name="form2" action="" method="POST" enctype="multipart/form-data" onSubmit="return validaFrm()" >
			<div class="col s7 z-depth-4 card-panel teal lighten-5">
				<div class="row">
				  <form class="col s12">
				    <div class="row">
			
				      <div class="col s12 card-panel orange lighten-1">
					    <h5 class="center-align">Registrate en Sena UP!</h5>
					  </div>
			
				      <div class="input-field col s6">
				        <i class="material-icons prefix">account_circle</i>
				        <input id="icon_prefix" type="text" name="nom" required class="validate" maxlength="10" onkeydown="contar(this.value)">
				        <label for="icon_prefix">Nombre </label>
						
				      </div>
					  <div class="input-field col s6">
				        <i class="material-icons prefix">account_circle</i>
				        <input id="icon_prefix" type="text" name="apellido" required class="validate" onkeydown="contar(this.value)">
				        <label for="icon_prefix"> Apellido</label>
						
				      </div>
				
				      <div class="input-field col s12">
				        <i class="material-icons prefix">email</i>
				        <input id="icon_prefix" type="email" name="email" required class="validate" >
				        <label for="icon_prefix">Email</label>
				      </div>
					  
			
				      <div class="input-field col s6">
				        <i class="material-icons prefix">https</i>
				        <input id="contraseña" type="password" name="password" required class="validate" pattern=".{6,}" title="minimo 6 caracters">
				        <label for="contraseña">Contraseña</label>
				      </div>
					  <div class="input-field col s6">
				        <i class="material-icons prefix">https</i>
				        <input id="contraseña2" type="password" name="password" required class="validate">
				        <label for="contraseña">Repita la Contraseña</label>
				      </div>
			
				      <div class="input-field col s3">
					    <select name="sexo" required>
					      <option value="" disabled selected>Genero</option>
					      <option value="masculino">Masculino</option>
					      <option value="femenino">Femenino</option>
					    </select>
					    <label>Selecciona</label>
					  </div>
			
					  
					  <div class="input-field col s8 offset-s1 ">
				        <input placeholder="Fecha de Nacimiento" type="date" name="fecha" required>
				      </div>
			
				      <div class="file-field input-field col s12" style="margin-top: 25px">
					      <div class="btn">
					        <span>Foto de Perfil</span>
					        <input type="file" name="fotos" required>
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text">
					      </div>
					    </div>
			
					    <div class="col s4 offset-s3" style="margin-top: 25px">
					    	<input type="hidden" name="nuevo" value="ok">						
					    	<input type="hidden" name="status" value="1">
					    	
					    	<button class="btn waves-effect waves-light" id="myBtn" type="submit" value="Registrar">REGISTRAR
					    		<i class="material-icons right">send</i>
					    	</button>
					    </div>
			
				    </div>
				  </form>
				</div>
			</div>
		</form>

		<!--FIN REGISTRO++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

		<!--INICIO LOGIN++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->
		<!-- <form name="form1" action="index.php" method="POST">
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

	 $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 15, // Creates a dropdown of 15 years to control year,
    today: 'Today',
    clear: 'Clear',
    close: 'Ok',
    closeOnSelect: false // Close upon selecting a date,
  });
</script>

<script>
        function contar(esto){
            cuantas=esto.length
            if(cuantas>99){
                document.forms[0].nom.value=esto.substring(0,99)
            }
            document.forms[0].total.value=cuantas;
         
        }
        function validaFrm(){
            var cosa = document.forms[0].nom.value;
            if(document.forms[0].nom.value == "" || cosa.length < 3){
                alert('Ingrese un nombre con al menos 3 caracteres');
                document.forms[0].nom.focus();
                return false;
            } else if(cosa.length > 30){
                alert('El número de caracteres es mayor a 30');
                document.forms[0].nom.focus();
                return false;
            }
            return true;
        }
        </script>
<script>
        function contar(esto){
            cuantas=esto.length
            if(cuantas>99){
                document.forms[0].nom.value=esto.substring(0,99)
            }
            document.forms[0].total.value=cuantas;
         
        }
        function validaFrm(){
            var cosa = document.forms[0].nom.value;
            if(document.forms[0].nom.value == "" || cosa.length < 3){
                alert('Ingrese un nombre con al menos 3 caracteres');
                document.forms[0].nom.focus();
                return false;
            } else if(cosa.length > 30){
                alert('El número de caracteres es mayor a 30');
                document.forms[0].nom.focus();
                return false;
            }
            return true;
        }
</script>
 <!--<script>
        function contar(esto){
            cuantas=esto.length
            if(cuantas>99){
                document.forms[0].apellido.value=esto.substring(0,99)
            }
            document.forms[0].total.value=cuantas;
         
        }
        function validaForm(){
            var cosa = document.forms[0].apellido.value;
            if(document.forms[0].apellido.value == "" || cosa.length < 15){
                alert('Ingreso al menos 15 caracteres');
                document.forms[0].apellido.focus();
                return false;
            } else if(cosa.length > 30){
                alert('El número de caracteres es mayor a 30');
                document.forms[0].apellido.focus();
                return false;
            }
            return true;
        }
        </script>	-->
	<script>
	document.getElementById("myBtn").onclick = myfunction;

	function myfunction() {
    var x= document.getElementById("contraseña").value ;
    var y= document.getElementById("contraseña2").value ;
    
    if (x != y){alert('Las contraseñas no coinciden')
	
	return false;
	};
	
	return true;
    
}
</script>

</body>
</html>