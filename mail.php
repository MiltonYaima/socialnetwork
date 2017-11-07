<?php
class mail{
		private $email;
		private $pass;
		private $f;
		private $nom;
		private $sexo;
		private $status;
		private $nombrefoto;
		private $formato;
		private $cabeceras;
		private $con;
		private $base;
		private $cod;
	
	public function __construct($email,$pass,$f,$nom,$sexo,$status,$foto){
		$this->email=$email;
		$this->pass=$pass;
		$this->f=$f;
		$this->nom=$nom;
		$this->sexo=$sexo;
		$this->status=$status;
		$this->nombrefoto=$foto;

		$this->con=mysql_connect("localhost","root","") or die (mysql_error());
 		$this->base=mysql_select_db("redsocial")or die (mysql_error());
		 
	}

	public function formato(){
			

	}
	public function enviar(){
			$para=$this->email;
			$titulo="Confirmacion de cuenta Sena UP!";
			$from="senabook120@gmail.com";
			$cabeceras = "MIME-Version: 1.0" . "\r\n";
			$cabeceras .= "Content-type:text/html;charset=iso-8859-1" . "\r\n";
			$cabeceras .= "From: $from" . "\r\n";
		 $mensaje="<!DOCTYPE html>
        <html lang='es'>
        <head>
            <meta charset='UTF-8'>
            <title>Sena UP! Login </title>
            <!--LINKS MATERIALIZE-->
            
            <link href='https://fonts.googleapis.com/icon?family=Material+Icons' rel='stylesheet'>
              <link rel='stylesheet href='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css'>

            <meta name='viewport' content='width=device-width, initial-scale=1.0'/>
            <!--FIN LINKS MATERIALIZE-->
           
        </head>
        <body style='background: #eeeeee'>
            <!--LINKS MATERIALIZE JS-->
              <script src='https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js'></script>

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
                    <h2 class='center-align' style='color: orange'>Bienvenido a Sena UP!</h2>
                    <li><span> Estas a un paso de completar tu registro</span><br></li>
                   <li> <span>Estamos realmente felices por registrarte en nuestra comunidad. Nuestra idea es mantener informados de todo lo que pasa en nuestra institucion.</span></li><br>
                <div class='row'>
                    <div class='center-align'>
                    <?php

                    ?>
                        <h5 class='center-align'>Completa el registro <br> Presionando aqui<i class='material-icons'>arrow_downward</i></h5>
                        <button class='btn  orange waves-light waves-effect '><a  href='http://localhost/ENSAYORED/redsocial/mensaje.php?email=".$para." '>ACTIVAR AHORA!!</a></button>
                </div>
                </div>
            </div>   
        </div>
</body>
</html>


		";
ini_set('SMTP','localhost');
ini_set('smtp_port',25);
		$enviado=mail($para,$titulo,$mensaje,$cabeceras);


		if ($enviado){
			header ('Location:mensajeConfirmar.html');
		}
		else{
			return false;

		}
	}
	public function validarUsuario(){
		$sql="UPDATE usuario set status=2 WHERE email='".$email."' ";
			$res=mysql_query($sql);
			if ($res){
				
			}
			else{

			}
			return true; 
	}
}



?>