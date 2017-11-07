<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>cambiar contraseña</title>
</head>
<body>

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="../js/materialize.min.js"></script>


	<ul id="midropdown" class="dropdown-content">
			<li><a href="#">crear pagina</a></li>
	      	<li><a href="#">crear grupo</a></li>
	      	<li><a href="configuracion.php">configuracion</a></li>
		</ul>
<nav>

	<div class=" row teal">

		<div class=" col s3">
		<img src="epa.png" border="0" width="20" heigth="20">


			<span class="chapter-tittle"> SENA UP!</span>
		</div>

			<form class="left search col s5">
				<div class="input-field">
					<input type="search" id="search" name="">
					<label class="active" for="search"><i class="material-icons">search</i></label>
					<i class="material-icons">close</i>
				</div>
			</form>
               


		<ul id="nav-mobile" class="right hide-on-small-only">

			<li><a href="#"><i class="material-icons">notifications</i></a></li>

			<li><a href="#"><i class="material-icons">message</i></a></li>

			<li><a href="" class="dropdown-button" data-activates="midropdown" 
			  ><i class="material-icons">details</i></a></li>
		</ul>
	</div>

</nav>

 <h5><a name="adesactivar">Inicio de sesión</a></h5>



 <div class="container">   
      <div class="row">
         <div class="col s12">

         <div class="row">
               <div class="input-field col s6">
                  <input id="name" type="text" length="10">
                  <label for="name">contraseña actual</label>
               </div> 

               <div class="row">
               <div class="input-field col s6">
                  <input id="name" type="text" length="10">
                  <label for="name">Nueva contraseña</label>
               </div> 

               <div class="row">
               <div class="input-field col s6">
                  <input id="name" type="text" length="10">
                  <label for="name">Confirmar contraseña</label>
               </div> 
          
               
            </div>
         </div>       
      </div>

      <br> <br><button class="btn waves-effect waves-light" type="submit" name="action">Guardar cambios 
  </button></br></br>


	
<A class="waves-effect waves-light btn" HREF="seguridad.php" HREF="configuracion3.php" HREF="desactivar.php">

<i class="material-icons left ">reply_all</i>volver</A>

</body>
</html>

