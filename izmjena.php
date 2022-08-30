<?php
	include_once ("veza_pr.php");
	if (isset ($_POST['potvrdi'])){
		$id= $_POST ['id'];
		echo $id;
		$naslov=$_POST['naslov'];
		$opis=$_POST['opis'];
		$godina=$_POST['godina'];
		$odredisna_slika = basename($_FILES["putanja_slike"]["name"]);
		if ($odredisna_slika == ""){
		$sUpdate = "UPDATE film SET naslov='$naslov', opis='$opis', godina='$godina' WHERE id= '$id' ";}
		else{
		move_uploaded_file($_FILES["putanja_slike"]["tmp_name"],$odredisna_slika);
		$sUpdate = "UPDATE film SET naslov='$naslov', opis='$opis', godina='$godina', putanja_slike='$odredisna_slika' WHERE id= '$id' ";}
		$zapis=mysqli_query($con,$sUpdate);		
		header ("Location:admin.php");	
	}
?>

<?php
	$id = $_GET ['id'];
	$zapis="SELECT * FROM film WHERE id=$id";
	$rez=$con->query($zapis);
	if($rez->num_rows>0){
		while ($row=$rez->fetch_assoc()){
			$naslov = $row ['naslov'];
			$opis = $row ['opis'];
			$godina = $row ['godina'];
			$odredisna_slika = $row["putanja_slike"];
		}
	} 
?>

<html>
	<head>
		<title> Izmjena </title>
	</head>
	<body>
		<div>
			<a href ="admin.php"> Upravljanje filmovima </a> <br /> <br />
			<form action="izmjena.php" method="post" name="izmjena" enctype="multipart/form-data">
				<table >
					<tr>
						<td> Naslov </td>
						<td> <input type="text" size="40" name="naslov" value="<?php echo $naslov; ?>" >  </input> </td>
					</tr>
					<tr>
						<td> Opis </td>
						<td> <textarea name ="opis" rows="5" cols="40"><?php echo $opis; ?></textarea> </td>
					</tr>
					<tr>
						<td> Godina </td>
						<td> <input name ="godina" size="5" value="<?php echo $godina; ?>" >  </input> </td>
					</tr>
					<tr>
						<td>Select image:</td>
						<td> <input type="file" name="putanja_slike" value="<?php echo $odredisna_slika; ?>" />  </td>
					</tr>
					<tr>
						<td> <input type="hidden" name = "id" value =" <?php echo $_GET['id']; ?> "/>  </td>
						<td> <input type="submit"  name="potvrdi" value="Uredi" /> </td>
					</tr>
				</table>
			</form>
		</div>
	</body>
</html>