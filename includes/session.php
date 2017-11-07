
<?php
if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
	$query="SELECT * FROM usuario WHERE email='".$_SESSION['usuario']."'";
	$us=mysql_query($query);
	$numfilas=mysql_num_rows($us);

	if($numfilas==1){
		$array=mysql_fetch_array($us);
		echo "<table  align='right'><tr><td rowspan='2'><img src='archivos/".$_SESSION['usuario'].
		"/".$array['fotos']."' width='150' heigth='150' ></td>";
		echo "<td>".$array['nombre']."<td></tr>";
		echo "<tr><td align='right'><a href='pinicio.php?cerrar=ok'>Cerrar Sesion</a></td></tr></table>";
	}else{
		echo "<center>Error</center>";
	}
}

?>