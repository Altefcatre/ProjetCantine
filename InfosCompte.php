<?php session_start();
$donnees = $_SESSION['donnees'];
?>

<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>Reservation cantine</title>
    <meta name="author" content="Talmant Benjamin" />
	<link href="CSS_InfosCompte.css" rel="stylesheet" type="text/css"/>
	</head> 	
<body>
	<center><table id="B1" style="margin-top:50px;height:200px;width:500px;border-width:0.5px;">
			<tr>
			<td>
				<br>Statut : <?php 
				$statut = $donnees['statut'];
				switch ($statut) {
					case 0:
						echo "Admin";
						break;
					case 1:
						echo "&Eacute;tudiant";
						break;
					case 2:
						echo "Professeur";
						break;
					case 3:
						echo "Personnel";
						break;
				}?>
				</br>
			</td>
			</tr>
			<tr>
			<td>
				<br>Solde du compte : <?php echo $donnees['solde'];?> &euro;</br>
			</td>
			</tr>
	</table></center>
	<center><table id="B1" style="margin-top:50px;height:500px;width:500px;border-width:0.5px;">
			<tr>
			<td>
				<br>Historique des debits :</br>
			</td>
			</tr>
	</table></center>
	<a href="Accueil.php"><input class="btn-retour" type="button" value="Retour"></a>
</body>
</html>