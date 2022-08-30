<?php
	include_once("veza_pr.php");
?>
<html>

	<head>
		<title> Naslovna stranica </title>
		<meta charset="utf-8" />
	</head>
	
	<body >
	<div>
	<a href= "index.php" > Naslovnica </a> </br> 
		<a href= "unos.php" > Dodaj novi zapis </a> </br> </br>						
		<table  border=1> 
		
	<?php
		 $zapis="SELECT * FROM film ORDER BY id ASC";
		 $rez=$con->query($zapis);
		 
		 if($rez->num_rows>0){
			 echo " <tr>
			 			<th>Slika </th> 
			 			<th>Naslov</th> 
			 			<th>Opis</th> 
			 			<th>Godina nastanka</th> 
			 			<th>Radnja</th>";
			 while ($row=$rez->fetch_assoc()){
				 echo "<tr>
				 		<td width = '100'>"."<img width ='100' src='".$row['putanja_slike']."'>"."</td>
				 		<td>".$row["naslov"]."</td>
				 		<td width='400' align = 'justify'>".$row["opis"]."</td>
				 		<td align='center'>".$row["godina"]."</td>";
				 echo "<td> <a href = \"brisi.php?id=$row[id]\"> Briši </a> | <a href = \"izmjena.php?id=$row[id]\"> Uredi </a> </td>
				 	</tr>";
			 }
		 }
		 else{
			 echo "Nema rezultata";
		 }

		
	?>
	</table>
	</div>
	</body>

</html>