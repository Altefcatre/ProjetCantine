<?php 
session_start();
$donnees = $_SESSION['donnees']; 
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<title>Reservation cantine</title>
		<meta name="author" content="Talmant Benjamin" />
		<link href="CSS_Accueil.css" rel="stylesheet" type="text/css"/>
	</head> 	
	<body>
		<center><table id="B1" style="margin-top:150px;height:500px;width:500px;border-width:0.5px;">
			<tr>
			<td>
				<a href="Reservation.php"><input class="btn-choice" type="button" value="Reservation repas"></a>
			</td>
			</tr>
			<tr>
			<td>
				<a href="InfosCompte.php"><input class="btn-choice" type="button" value="Consulter mon compte"></a>
			</td>
			</tr>
			<tr>
			<td>
				<a href="RechargerCompte.php"><input class="btn-choice" type="button" value="Recharger mon compte"></a>
			</td>
			</tr>
			<tr>
			<td>
				<a href="Identifiants.php"><input class="btn-deco" type="button" value="Se deconnecter"></a>
			</td>
			</tr>
		</table></center>
	</body>
</html>