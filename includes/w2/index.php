<?php 
	include("include/database.php");
	include('include/time_stamp.php');
?>
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	
    <head>
		
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Sistema de comentarios</title>
        
        <!-- The stylesheet -->
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/demo.css" />
        
        <!-- Google Fonts -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Rochester|Bree+Serif" />
        
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    
    <body>

		<header>
			<h2>Bienvenidos</h2>
			<h1>Comentarios</h1>
			<div id="twitter-container">
			  <form id="tweetForm" action="#" method="post">
			    <span class="counter">140</span>
			    <textarea name="inputField" id="inputField" tabindex="1" rows="2" cols="40"></textarea>
			    <input class="g-button g-button-black" name="submit" type="submit" value="comentar" disabled="disabled" id="update_button"/>
			    <div class="clear"></div>
		      </form>
		  </div>
    </header>
		
        <div id="main">
          <div id='flashmessage'>	
    <div id="flash"></div>
	  		</div>
   		  <div id="comentarios">
       			<?php
					$comentarios=$database->comentario();
					if($comentarios>0){
						foreach($comentarios as $data)
 						{				
							$comentario_id=$data['idcomentario'];
							$usuario_id=$data['idusuario'];
							$fecha = $data['fecha'];
							$comentario = stripslashes(htmlentities($data['comentario']));
							$imagen=$database->imagen($usuario_id);
				?>

				<div class="stbody" id="stbody<?php echo $comentario_id; ?>">
    				<div class="sttimg"><img src="images/<?php echo $imagen; ?>" class='big_face'/></div> 
    				<div class="sttext"><a class="stdelete" href="#" id="<?php echo $comentario_id;?>" title="Borrar comentario">X</a>
    					
						<?php echo $comentario;?>
   						<div class="sttime"><?php time_stamp($fecha);?></div> 
    				</div>  
				</div>
    <?php
 		}
	}
	?>
    </div>
        
        
        </div>
        
        <footer>
	        <h2><i>Tutorial:</i> Comentarios tipo facebook jquery, php &amp; css</h2>
        </footer>
        
        <!-- JavaScript includes - jQuery and our own script.js -->
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
		<script type="text/javascript" src="js/jquery.oembed.js"></script>
        <script type="text/javascript" src="js/jquery.watermarkinput.js"></script>
        
    </body>
</html>