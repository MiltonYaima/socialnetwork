<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
	<title>desactivar</title>
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

	<div class="nav-wrapper row teal">

		<div class=" col s3 m3">
		<img src="../imagenes/epa.png" border="0" width="20" heigth="20">


			<span class="chapter-tittle"> SENA UP!</span>
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
			<li><a href="" class="dropdown-button" data-activates="midropdown" 
			  ><i class="material-icons">details</i></a></li>
		</ul>
	</div>
</nav>

 <h5><a name="adesactivar">¿Seguro que quieres desactivar tu cuenta?</a></h5>
<p>
Al desactivar tu cuenta, se desactivará tu perfil y se borrará tu nombre y tu foto de la mayor parte del contenido que compartiste en Facebook. Algunas personas podrán seguir viendo determinada información, como tu nombre en su lista de amigos y los mensajes que les enviaste.</p>

<div class="container">
<div class="row">
<div class="col s12">
	
</div>
  <div class=" col m6">
      <div class=" card-panel white">

        <form action="#">

    <p>
      <input name="group1" type="radio" id="test1" />
      <label for="test1">Esto es temporal. Volveré.</label>


    </p>
    <p>
      <input name="group1" type="radio" id="test2" />
      <label for="test2">No sé cómo usar Sena up!.</label>
    </p>
    <p>
      <input class="with-gap" name="group1" type="radio" id="test3"  />
      <label for="test3">No me siento seguro en Sena up!.</label>
    </p>

     <p>
      <input name="group1" type="radio" id="test4" />
      <label for="test4">Hackearon mi cuenta.</label>
    </p>

     <p>
      <input name="group1" type="radio" id="test5"  />
      <label for="test5">Bullying.</label>
    </p>

    


  </form>
      </div>
      
    </div>
	
</div>
<A class="waves-effect waves-light btn" HREF="configuracion3.php">

<i class="material-icons left">reply_all</i>volver</A>

<a class="waves-effect waves-light btn"><i class="material-icons left">
visibility_off</i>Desactivar</a>

<a class="waves-effect waves-light btn"><i class="material-icons right">report_problem</i>Cancelar</a>
	
</div>



</body>
</html>
