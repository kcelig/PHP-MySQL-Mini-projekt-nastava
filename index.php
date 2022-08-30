<?php
	include_once("veza_pr.php");
?>
<html>
	<head>
		<title> Naslovna stranica </title>
		<meta charset="utf-8" />
	</head>
	
	<body >
		<div style="width:500px;">
			<a href= "admin.php" > Upravljanje filmovima </a> <br /> <br />						
			<h1>Popis filmova</h1> <br />
			<?php
				 $zapis="SELECT * FROM film ORDER BY id ASC";
				 $rez=$con->query($zapis);
				 if($rez->num_rows>0){
					 while ($row=$rez->fetch_assoc()){
						 echo "<div>
						 		<h2>".$row["naslov"]."</h1>
						 		<h4>".$row["godina"]."</h3>
						 		<div>"."<img width ='500' src='".$row['putanja_slike']."'>"."</div>
						 		<p align='justify'>".$row["opis"]."</p>
						 	</div> <hr/>";
					 }
				 }
				 else{
					 echo "Nema rezultata";
				 }
			?>
		</div>
	</body>
</html>