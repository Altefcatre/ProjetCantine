<?php
session_start();
session_destroy();
?>

<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<title>Reservation cantine</title>
		<meta name="author" content="Talmant Benjamin" />
		<link href="CSS_Identifiants.css" rel="stylesheet" type="text/css"/>
	</head> 	
	<body>
		<FORM name="formulaire" METHOD="POST" action="Verification.php" style ="margin-left:5px;">
			<center><table id="B1" style="margin-top:200px;height:250px;width:500px;border-width:0.5px;"></center>
			<tr>
			<td style="font-size:18px;">
				<br><b>Identifiant : </b><input placeholder="Identifiant" type="text" 
				style="margin-left:20px;margin-right:5%" size=20 name="Id" value="" required></br>
			</td>
			</tr>
			<tr>
			<td style="font-size:18px;">
				<br><b>Mot de passe :</b><input placeholder="Mot de passe" type="password" 
				style="margin-left:20px;margin-right:5%" size=20 name="Mdp" value="" required></br>
			</td>
			</tr>
			<tr>
			<td>
				<input id="bouton" align="button" class="btn-primary" type="submit" 
				style ="width:100px;margin-left:200px;margin-right:auto;display:block;margin-top:20px;margin-bottom:5%" value="Se connecter">
			</td>
			</tr>
			</table>
		</FORM>

	</body>
</html>
