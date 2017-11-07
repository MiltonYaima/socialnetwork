<?php
if(isset($_GET['id']) && $_GET['id']!=""){
	include('conectar.php');
	$id=$_GET['id'];
	$upd="UPDATE amigos SET status='amigo' WHERE idamigo=$id";
	$ejupd=mysql_query($upd);	//
	header("Location: ../muro.php");
}
if(isset($_GET['delete']) && $_GET['delete']=="ok"){
	include('conectar.php');
	$id=$_GET['id'];
$del="DELETE FROM amigos WHERE idamigo=$id";
	$ejdel=mysql_query($del);
	header("Location: ../muro.php");
}

	$soli="SELECT * FROM usuario INNER JOIN amigos ON (usuario.email=amigos.email) WHERE amigos.status='enviada' AND amigos.emailamigo='".$_SESSION['usuario']."' ";
	$ejsoli=mysql_query($soli);
	$nfsoli=mysql_num_rows($ejsoli);
	$asoli=mysql_fetch_assoc($ejsoli);
	if($nfsoli>0){
		echo "Solicitudes de Amistad<hr>";
		do{	?>
	<table>
		<tr>
			<td width="20">
			<img src="archivos/<?php echo $asoli['email'];?>/<?php echo $asoli['fotos'];?>" width="20" height="20">
			</td>
			<td>
				<?php echo $asoli['nombre'];?>
			</td>

		</tr>
		
		<tr>
			<td>
				
			</td>
			<td>
				<button type="button" name="button" class="button button-blue" onclick= "self.location.href = 'includes/solicitudes.php?id=<?php echo $asoli['idamigo'];?>'">Confirmar</button>
				<button type="button" name="button" 	 onclick= "self.location.href = 'includes/solicitudes.php?delete=ok&id=<?php echo $asoli['idamigo'];?>'">Rechazar</button>
			</td>
		</tr>
	</table>
	<?php 
} while($asoli=mysql_fetch_assoc($ejsoli));
}else{
echo "Solicitudes de Amistad<hr>";
echo "no hay Solicitudes";

}

?>
<hr>
<table>
	<tr>
		<td colspan="2">Amigos<hr>
		</td>
	</tr>
	<?php
	$amig="SELECT * FROM usuario INNER JOIN amigos ON (usuario.email=amigos.emailamigo) WHERE amigos.status='amigo' AND amigos.email='".$_SESSION['usuario']."'";
	$ejamig=mysql_query($amig);
	$nfamig=mysql_num_rows($ejamig);
	$aamig=mysql_fetch_assoc($ejamig);
		if($nfamig>0){
		do{	?>
	<tr><td width="20">
			<img src="archivos/<?php echo $aamig['emailamigo'];?>/<?php echo $aamig['fotos'];?>" width="30" height="30">
			</td>
			<td>
				<a href="includes/cambiar.php?email=<?php echo $aamig['emailamigo'];?>"><?php echo $aamig['nombre'];?></a>
			</td>
			</tr>
	x		<?php
			}while($aamig=mysql_fetch_assoc($ejamig));
		}
		$amig2="SELECT * FROM usuario INNER JOIN amigos ON (usuario.email=amigos.email) WHERE amigos.status='amigo' AND amigos.emailamigo='".$_SESSION['usuario']."'";
		$ejamig2=mysql_query($amig2);
		$nfamig2=mysql_num_rows($ejamig2);
		$aamig2=mysql_fetch_assoc($ejamig2);
		if($nfamig2>0){
		do{	?>
	<tr><td width="20">
			<img src="archivos/<?php echo $aamig2['email'];?>/<?php echo $aamig2['fotos'];?>" width="30" height="30">
			</td>
			<td>
				<a href="includes/cambiar.php?email=<?php echo $aamig2['email'];?>"><?php echo $aamig2['nombre'];?></a>
			</td>
			</tr>
			<?php
			}while($aamig2=mysql_fetch_assoc($ejamig2));
		}
		if($nfamig2==0 && $nfamig==0){echo "<td colspan='2'>No tienes amigos</td>";}	
			?>
	
</table>



