<?php 
session_start();
$donnees_admin = $_SESSION['donnees'];

?>

<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>Reservation cantine</title>
    <meta name="author" content="Pellerin Matthieu" />
	<link href="CSS_InfosCompte.css" rel="stylesheet" type="text/css"/>
	
<?php 
	$Identifiant = $_POST['Id'];
	$Mdp = $_POST['Mdp'];
	$safeVar = 1;
	
	if($Mdp != $donnees_admin['mdp']){ // entrer un mauvais mot de passe
		goto wrongMdp;
	}
	
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=cantineetudiants;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur :'.$e->getMessage());
	}
	
	$reponse = $bdd->query("SELECT * FROM utilisateurs");
	$utilisateurExiste = 0;
	while ($donnees = $reponse->fetch()){
		if($Identifiant == $donnees['identifiant']){
			$utilisateurExiste = 1;
			$savedata = $donnees;
			$reponse->closeCursor(); // Termine le traitement de la requête	
		}
	}
	
	if($utilisateurExiste == 0){
		$safeVar = 0;
		echo "<script>alert(\"L'utilisateur n'existe pas\")</script>"; 
?>
		<meta http-equiv="refresh" content="0; URL=RechargerCompte_Admin.php">
	</head> 	
<body>

<?php
	}
	wrongMdp:
	if($Mdp != $donnees_admin['mdp']){ // entrer un mauvais mot de passe
		$safeVar = 0;
		echo "<script>alert(\"Votre mot de passe est incorrect\")</script>";
		?>
		<meta http-equiv="refresh" content="0; URL=RechargerCompte_Admin.php">
	</head> 	
	<?php 
	}
	if($safeVar == 1){
?>
	</head> 	
<body>
	<center><table id="B1" style="margin-top:50px;height:200px;width:500px;border-width:0.5px;">
			<tr>
			<td>
				<br>Statut : <?php 
				$statut = $savedata['statut'];
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
				<br>Identifiant : <?php echo $savedata['identifiant'];?></br>
			</td>
			</tr>
			<tr>
			<td>
				<br>Solde du compte : <?php echo $savedata['solde'];?> &euro;</br>
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
	

	<a href="Accueil_Admin.php"><input class="btn-retour" type="button" value="Retour"></a>
		
<?php 
	}
	
	?>
</body>
</html>