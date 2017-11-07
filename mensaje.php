<?php
include('includes/conectar.php');
if ($_GET) {
    $email=$_GET['email'];

    $sql="UPDATE usuario set status=2 WHERE email='".$email."' ";
    $res=mysql_query($sql); 
}


?>

<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <title>Sena UP! Login </title>
            <!--LINKS MATERIALIZE-->
            <link rel="stylesheet" type="text/css" href="css/estilos.css">
            <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
            <link type='text/css' rel='stylesheet' href='css/materialize.min.css'  media='screen,projection'/>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
            <!--FIN LINKS MATERIALIZE-->
           
        </head>
        <body style='background: #eeeeee'>
            <!--LINKS MATERIALIZE JS-->
            <script type='text/javascript' src='https://code.jquery.com/jquery-3.2.1.min.js'></script>
            <script type='text/javascript' src='js/materialize.min.js'></script>
            <!--FIN LINKS MATERIALIZE JS-->

        <nav>
            <div class='nav-wrapper row teal'>
                <div class=' col s3 offset-s1'>
                    <a href='#!' class='brand-logo'><i><img src='imagenes/epa.png' border='0' width='35' heigth='30'></i><span class='chapter-tittle'> SENA UP!</span></a>
                </div>
            </div>
        </nav>

        <div class='container'>
            <div class='row'>
                <div class='col s12'>
                    <h2 class='center-align' style="color: orange">Bienvenido a Sena UP!  </h2>
                   
                <div class='row'>
                    <div class='center-align'>
                        <h5 class='center-align'>Ahora puedes ingresar a tu cuenta </h5>
                        <button class='btn  orange waves-light waves-effect '><a  style='color: white;' href='index.php'> Ir a Inicio</a></button>
                </div>
                </div>
            </div>   
        </div>
</body>
</html>