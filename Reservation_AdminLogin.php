<?php
session_id("session1");
session_start();
$_SESSION['donnees_user'] = NULL;
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<title>Reservation cantine</title>
		<meta name="author" content="Pellerin Matthieu" />
		<link href="CSS_Identifiants.css" rel="stylesheet" type="text/css"/>
	</head> 	
	<body>
		<FORM name="formulaire" METHOD="POST" action="Reservation_Admin.php" style ="margin-left:5px;">
			<center><table id="B1" style="margin-top:200px;height:250px;width:500px;border-width:0.5px;"></center>
			<tr>
			<td style="font-size:18px;">
				<br><b>Identifiant de l'utilisateur: </b><input placeholder="Identifiant" type="text" 
				style="margin-left:20px;margin-right:5%" size=20 name="Id" value="" required></br>
			</td>
			</tr>
			<td style="font-size:18px;">
				<br><b>Confirmer votre Mot de Passe :</b><input placeholder="mot de passe" type="password" 
				style="margin-left:20px;margin-right:5%" size=20 name="Mdp" value="" required></br>
			</td>
			</tr>
			<tr>
			<td>
				<input id="bouton" align="button" class="btn-primary" type="submit" 
				style ="width:100px;margin-left:200px;margin-right:auto;display:block;margin-top:20px;margin-bottom:5%" value="Valider">
			</td>
			</tr>
			</table>
		</FORM>
	<a href="Accueil_Admin.php"><input class="btn-retour" type="button" value="Retour"></a>
	</body>
</html>
