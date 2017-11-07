<?php
session_start();
if(isset($_GET['email']) && $_GET['email']==$_SESSION['usuario']){
	header("Location: ../muro.php");
}else{
	$_SESSION['amigo']=$_GET['email'];
	header("Location: ../muroamigo.php");
}
?>