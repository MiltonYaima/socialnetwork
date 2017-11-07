<?php
error_reporting(0);
include_once('include/database.php');
include_once('include/time_stamp.php');

$idu="3"; // id del usuario

if(isset($_POST['update']))
{
	if(mb_strlen($_POST['update']) < 1 || mb_strlen($_POST['update'])>140){
	die("0");}
	
	$time=time();
	$update=utf8_decode($_POST['update']); 
	$comentario=stripslashes(htmlentities(strtolower($update))); 
	$img=$database->imagen($idu);
	$idcom=$database->insertar_comentario($idu,$comentario,$time);
	
	
 ?>
<div class="stbody" id="stbody<?php echo $idcom; ?>">
    <div class="sttimg"><img src="images/<?php echo $img; ?>" class='big_face'/></div> 
    <div class="sttext"><a class="stdelete" href="#" id="<?php echo $idcom;?>" title="Borrar comentario">X</a>
    <?php echo $comentario;?>
   	<div class="sttime"><?php time_stamp($time);?></div> 
</div> 

<?php
}
?>