<?php
	$numero=10;
	if(isset($_GET['aumenta']) && $_GET['aumenta']==1 ){
		$_SESSION['numero']=$_SESSION['numero']+$numero;
	}else{
		$_SESSION['numero']=10;
	}
	$where=$_SESSION['amigo'];
	$tpub="SELECT publicaciones.idpub, publicaciones.email, publicaciones.emailamigo, publicaciones.texto, 
	publicaciones.fecha, COUNT(comentarios.idcom) AS numcom, publicaciones.imagen, publicaciones.video,
	usuario.fotos, usuario.nombre FROM usuario INNER JOIN (publicaciones LEFT JOIN comentarios ON 
	publicaciones.idpub=comentarios.idpub)ON publicaciones.emailamigo=usuario.email WHERE 
    publicaciones.emailamigo='$where' GROUP BY publicaciones.idpub, 
	publicaciones.texto,publicaciones.fecha ORDER BY publicaciones.fecha DESC LIMIT 0,".$_SESSION['numero'];
	$ej=mysql_query($tpub);   
	$nf=mysql_num_rows($ej);
	$tp=mysql_fetch_assoc($ej);

	$user="SELECT * FROM usuario WHERE email='".$_SESSION['usuario']."'";
	$ejuser=mysql_query($user);
	$nfuser=mysql_num_rows($ejuser);
	$auser=mysql_fetch_assoc($ejuser);


if(isset($_POST['np']) && $_POST['np']=="ok"){
	$imagen=$_FILES['imagen']['name'];
	$texto=$_POST['texto'];
	$video=$_POST['video'];
	$email=$_SESSION['usuario'];
	$emailamigo=$_SESSION['usuario'];
	$f=$_POST['fecha'];
	$insertar="INSERT INTO publicaciones VALUES( NULL, '$email','$texto','$imagen','$video',NULL,'$emailamigo')";
	$ejecutar=mysql_query($insertar);
	if($imagen!=''){
		copy($_FILES['imagen']['tmp_name'],"archivos/".$email."/".$imagen);
	}
		header("Location: pinicio.php");
}
if(isset($_POST['nc']) && $_POST['nc']=="ok"){
	$texto=$_POST['comen'];
	$email=$_SESSION['usuario'];
	$idpub=$_POST['idpub'];
	$insertar="INSERT INTO comentarios VALUES( NULL,$idpub,'$texto', '$email',NULL)";
	$ejecutar=mysql_query($insertar);
	header("Location: pinicio.php");
}
?>
			<hr>
			
					<hr>
			<table width="500" align="left">
			<?php do{ ?>
				<tr >
					<td align="right" width="40">
					<img src="archivos/<?php echo $tp['emailamigo']."/".$tp['fotos']; ?>" width="40" height="40">	
					</td>
					<td>
						<p size="10" face="Arial Black" align="justify"><a href="includes/cambiar.php?email=<?php echo $tp['email'];?>"><?php echo $tp['nombre']; ?></a>
						<small><?php $date= $tp['fecha'];   $sqldate=date('d / M / Y ',strtotime($date));
							$d=date('d',strtotime($date));
							$m=date('M',strtotime($date));
							$a=date('Y',strtotime($date));				 
							 $sqldate2=date('h:i a',strtotime($date)); echo " el ".$sqldate." a las: ".$sqldate2; ?></small></p>
					</td>
				</tr>
				<tr>
					<td colspan="2" bgcolor="#e0f2f1">
						<p size="8" face="Arial" align="justify" ><?php echo $tp['texto'];?></p>
						<?php
						if($tp['imagen']!=''){
						 echo "<center><img src='archivos/".$tp['emailamigo']."/".$tp['fotos']."' width='250' height='250'></center>";
						}
						if($tp['video']!=''){
						 echo "<iframe width='460' height='315' src='//www.youtube.com/embed/".$tp['video']."' frameborder='0' allowfullscreen></iframe>";
						}
						?>
					</td>
				</tr>
				<tr>
					<td align="left"  colspan="2">
							<?php 
						$usuario=$_SESSION['usuario'];
						$id=$tp['idpub'];
						$l="SELECT * FROM likes WHERE  email='$usuario' AND idpub='$id' ";

						$ejlike=mysql_query($l);
						$nflike=mysql_num_rows($ejlike);
						$alike=mysql_fetch_assoc($ejlike);

						if($nflike==1){
							 		if($alike['like']==1){ echo "<font color='#fb8c00'>a ti Te gusta</font>"; }else{ echo ""; }
							 	}	

						if($nflike==0){ ?>				
							<a href="pinicio.php?like=1&idpub=<?php echo $tp['idpub']; ?>"><?php } 
							$cuantoslikes="SELECT COUNT(*) as nlikes FROM likes WHERE likes.idpub=$id AND likes.like='1'";
							$ejcl=mysql_query($cuantoslikes);
							$acl=mysql_fetch_assoc($ejcl);  ?>
							<img src="includes/like1.png" width="15" height="15"><?php if($nflike==0){ ?></a><?php } 
							if($acl['nlikes']>0){echo "<b> ".$acl['nlikes']."</b>";} if($nflike==0){ ?>
							<a href="pinicio.php?like=0&idpub=<?php echo $tp['idpub']; ?>"><?php } 
							$cuantosdlikes="SELECT COUNT(*) as ndlikes FROM likes WHERE likes.idpub=$id AND likes.like='0'";
							$ejcdl=mysql_query($cuantosdlikes);
							$acdl=mysql_fetch_assoc($ejcdl);?>
							
							<?php if($nflike==0){ ?></a><?php } 
							if($acdl['ndlikes']>0){echo "<b> ".$acdl['ndlikes']."</b>";} ?>
							
							 	<b>&nbsp&nbsp&nbsp&nbsp&nbspTienes <?php echo $tp['numcom']." "; ?>Comentarios</b>
                          	  <hr>
					</td>
				</tr>
				<tr>
					<td align="right" width="40">
					
					</td>
					<td width="360">
						<table  width="100%" bgcolor="#e0f2f1"  >
							<?php  
							$idp=$tp['idpub'];
								$coment="SELECT * FROM usuario LEFT JOIN comentarios ON (comentarios.email=usuario.email)
								WHERE comentarios.idpub=$idp ORDER BY comentarios.fecha ASC ";
								$ejcoment=mysql_query($coment);
								$nfcoment=mysql_num_rows($ejcoment);
								$acoment=mysql_fetch_assoc($ejcoment);

								if($nfcoment>0){

									do{
							?>
							<tr>
								<td valign="top" align="right">
									<img src="archivos/<?php echo $acoment['email']."/".$acoment['fotos']; ?>" width="25" height="25">
								</td>
								<td colspan="2" >
									<p  align="justify" style="font-size:12px" ><a href="includes/cambiar.php?email=<?php echo $acoment['email'];?>"><?php echo $acoment['nombre'];?></a>
										<small><?php $date= $acoment['fecha'];   $sqldate=date('d / M / Y ',strtotime($date));
							$d=date('d',strtotime($date));
							$m=date('M',strtotime($date));
							$a=date('Y',strtotime($date));				 
							 $sqldate2=date('h:i a',strtotime($date)); echo "el ".$sqldate." a las: ".$sqldate2; ?></p> 
									 <p size="8" face="Arial" align="justify" ></small><i><?php echo $acoment['texto'];?></i></p>
								</td>

							</tr><?php }while($acoment=mysql_fetch_assoc($ejcoment)); } ?>
							<tr>
								<td align="right" width="40">
									<img src="archivos/<?php echo $auser['email']."/".$auser['fotos']; ?>" width="25" height="25">	
								</td>
								<td valign="bottom" width="320">
									<form name="enviarcomentario" method="POST" action="pinicio.php">
										<textarea name="comen" cols=35 rows=1  placeholder="Que opinas" ></textarea>
									
								</td>
								<td valign="bottom">
									<input type="submit" class="button teal" value="Comentar">
								</td>								
									<input type="hidden" name="idpub" value="<?php echo $tp['idpub']; ?>">
									<input type="hidden" name="nc" value="ok">
									</form>
							</tr>
						</table>	
						<hr>					
					</td>
				</tr>			
				
		
			<?php } while($tp=mysql_fetch_assoc($ej));?>
			<tr>
				<td colspan="2" align="center">
					<a href="pinicio.php?aumenta=1">MOSTRAR PUBLICACIONES ANTIGUAS</a>
				</td>
			</tr>
		</table>


