<?php
if(isset($_SESSION['usuario']) && !empty($_SESSION['usuario'])){
	$query="SELECT * FROM usuario WHERE email='".$_SESSION['usuario']."'";
	$us=mysql_query($query);
	$numfilas=mysql_num_rows($us);

	if($numfilas==1){
		$array=mysql_fetch_array($us);
		echo "<table  align='right'  bgcolor='#4db6ac'><tr><td rowspan='2'><img src='archivos/".$_SESSION['usuario'].
		"/".$array['fotos']."' width='250' heigth='150' ></td>";
		echo "<td style='font-size: 40px' class='orange-text text-lighten-5'>".$array['nombre']."<td></tr></table>";
	}else{
		echo "<center>Error</center>";
	}
}

?>