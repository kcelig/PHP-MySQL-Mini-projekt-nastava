<?php
	include_once ("veza_pr.php");
	$id = $_GET ['id'];
	$upit = mysqli_query ($con,"DELETE FROM film WHERE id = $id");
	header ("Location:admin.php");
?>