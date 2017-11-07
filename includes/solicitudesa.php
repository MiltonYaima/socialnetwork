
<table>
	<tr>
		<td colspan="2">Amigos<hr>
		</td>
	</tr>
	<?php
	$u=$_SESSION['amigo'];
	$amig="SELECT * FROM usuario INNER JOIN amigos ON (usuario.email=amigos.email) WHERE 
	(amigos.status='amigo' AND amigos.emailamigo='$u')";
	$ejamig=mysql_query($amig);
	$nfamig=mysql_num_rows($ejamig);
	$aamig=mysql_fetch_assoc($ejamig);
		if($nfamig>0 ){
		do{	
			if($aamig['emailamigo']!=$_SESSION['usuario']){
			?>
		
	<tr><td width="20">
			<img src="archivos/<?php echo $aamig['email'];?>/<?php echo $aamig['fotos'];?>" width="30" height="30">
			</td>
			<td>
				<a href="includes/cambiar.php?email=<?php echo $aamig['email'];?>"><?php echo $aamig['nombre']; ?></a>
			</td> 	
			</tr>
			<?php
			}
			}while($aamig=mysql_fetch_assoc($ejamig));
		}
	$amig2="SELECT * FROM usuario INNER JOIN amigos ON (usuario.email=amigos.emailamigo) WHERE 
	(amigos.status='amigo' AND amigos.email='$u') ";
	$ejamig2=mysql_query($amig2);
	$nfamig2=mysql_num_rows($ejamig2);
	$aamig2=mysql_fetch_assoc($ejamig2);
		if($nfamig2>0){
		do{

		if($aamig2['email']!=$_SESSION['usuario']){	?>
	<tr><td width="20">
			<img src="archivos/<?php echo $aamig2['emailamigo']; ?>/<?php echo $aamig2['fotos'];?>" width="30" height="30">
			</td>
			<td>
				<a href="includes/cambiar.php?email=<?php echo $aamig2['emailamigo'];?>"><?php echo $aamig2['nombre']; ?></a>
			</td> 	
			</tr>
			<?php
		}
			}while($aamig2=mysql_fetch_assoc($ejamig2));

		}
		if($nfamig2==0 && $nfamig==0){ echo "<td colspan='2'>No tiene amigos</td>";}
			?>
	
</table>



