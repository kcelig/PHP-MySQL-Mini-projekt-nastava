<?php
	include_once("veza_pr.php");
?>
<html>
	<head>
		<title> Unos </title>
		<meta charset="utf-8" />
	</head>
	<body>
		<div>
			<a href ="admin.php"> Upravljanje filmovima </a> <br /> <br />
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="dodavanje" enctype="multipart/form-data">
					<table>
						<tr>
							<td> Naslov </td>
							<td> <input type="text" size="40" name="naslov"> </input> </td>
						</tr>
						<tr>
							<td> Opis </td>
							<td> <textarea name ="opis" rows="5" cols="40"></textarea> </td>
						</tr>
						<tr>
							<td> Godina </td>
							<td> <input name ="godina" size="5">  </input> </td>
						</tr>
						<tr>
							<td>Odaberi sliku:</td>
							<td> <input type="file" name="putanja_slike" id="putanja_slike"></td>
						</tr>
						<tr>
							<td>  </td>
							<td> <input type="submit" name="potvrdi" value="Dodaj" /> </td>
						</tr>
					</table>
				</form>
		</div>
	</body>

</html>

<?php	
	if (isset($_POST['potvrdi'])) {
		$naslov=$_POST['naslov'];
		$opis=$_POST['opis'];
		$godina=$_POST['godina'];
		$odredisna_slika = basename($_FILES["putanja_slike"]["name"]);
		move_uploaded_file($_FILES["putanja_slike"]["tmp_name"],$odredisna_slika);
		$zapis=mysqli_query($con,"INSERT INTO film(naslov,opis,godina,putanja_slike) VALUES('$naslov','$opis','$godina','$odredisna_slika')");			
		echo "<font color='green'> Uspješno dodani podaci. </font>";
		echo "<br/> <a href='admin.php'> Pregled zapisa </a>";
	}
?>