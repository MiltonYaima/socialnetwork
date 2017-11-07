 <?php
error_reporting(0);
include_once('include/database.php');

if(isset($_POST['id_comentario']))
{
	$comentario_id=$_POST['id_comentario'];
	$data=$database->eliminar_comentario($comentario_id);
	echo $data;
}
?>
