<?php

define("DB_SERVER", "localhost"); //Servidor
define("DB_USER", "root"); //Nombre del usuario
define("DB_PASS", ""); //Contraseña
define("DB_NAME", "w2"); //Nombre de la base de datos

$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS) or die(mysql_error());
$database = mysql_select_db(DB_NAME) or die(mysql_error());

class MySQLDB
{
	 function imagen($uid) 
	{
		$q = mysql_query("SELECT imagen FROM usuarios WHERE idusuario='$uid'") or die(mysql_error());
	   	$row=mysql_fetch_array($q);
	   	if(!empty($row))
	   	{
	    	$data=$row['imagen'];
			return $data;
         }
		 else
		 {
		 	echo "usuario.jpg";
			return;
		 }
	}
	
	function comentario(){
		$q = mysql_query("SELECT * FROM comentario ORDER BY fecha DESC") or die(mysql_error());
			while($row=mysql_fetch_array($q))
	    	$data[]=$row;
        	if(!empty($data))
			{
       			return $data;
         	}
   }
   function insertar_comentario($idu,$comentario,$time){
	   
	   $query = mysql_query("SELECT idcomentario,comentario FROM comentario WHERE idusuario='$idu' ORDER BY fecha DESC LIMIT 1") 
	   or die(mysql_error());
	   $result = mysql_fetch_array($query);
	   
	   if ($comentario!=$result['comentario']) {
	   		$query=mysql_query("INSERT INTO comentario(idusuario,fecha,comentario) VALUES ('$idu','$time','$comentario')") or die(mysql_error());
			
			$newquery = mysql_query("SELECT idcomentario FROM comentario WHERE idusuario='$idu' AND fecha='$time' limit 1");
            $row=mysql_fetch_array($newquery);
	   		if(!empty($row))
	   		{
	    		$data=$row['idcomentario'];
				return $data;
         	}
        } 
		else
		{
				 return false;
		}
   }
   
   function eliminar_comentario($id_com) 
	{
	   
		$q = mysql_query("DELETE FROM comentario WHERE idcomentario = '$id_com'") or die(mysql_error());
        return true;
      	       
    }
}

$database = new MySQLDB;

?>