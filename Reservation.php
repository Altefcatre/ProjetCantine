<?php 
session_start();
$donnees = $_SESSION['donnees'];
$idUser = $donnees['identifiant'];
?>

<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>Reservation cantine</title>
    <meta name="author" content="Pellerin Matthieu" />
	<link href="CSS_InfosCompte.css" rel="stylesheet" type="text/css"/>
	</head> 	
<body>
	<?php 
	
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=cantineetudiants;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur :'.$e->getMessage());
	}
	
	$reponse = $bdd->query("SELECT * FROM reservation"); 
	$bonIdentifiant = 0;
	while ($datareserve = $reponse->fetch()){
		
		if($datareserve['identifiant'] == $idUser){
			$savedata = $datareserve;
			$reponse->closeCursor(); // Termine le traitement de la requête
		}
	}
	$statut = $donnees['statut'];
	$strStatut = "";
	switch($statut){
		case 1: // etudiant 5 euros
			$prix = 5;
			$strStatut = "&Eacute;tudiant";
			break;
		case 2: // prof 7 euros
			$prix = 7;
			$strStatut = "Professeur";
			break;
		case 3: // personnel 7 euros
			$prix = 7;
			$strStatut = "Personnel";
			break;
	}
	$solde = $donnees['solde'];
	
	?>
	<center><table id="B1" style="margin-top:50px;height:200px;width:500px;border-width:0.5px;">
			<tr>
			<td>
				<br>Statut Reservation: 
				<?php 
				$reserve = $savedata['reserveRepas'];
				switch ($reserve) {
					case 0:
						echo "Non Reserv&eacute";
						echo "<br />Solde = ".$solde." &euro;";
						echo "<br />Statut = ".$strStatut;
						echo "<br />Prix d'un repas = ".$prix." &euro;";
						break;
					case 1:
						echo "Reserv&eacute";
						echo "<br />Solde = ".$solde." &euro;";
						break;
					default:
						echo "Bug";
						break;

				}?>
				</br>
			</td>
			</tr>
			<tr>
			<td>
			<?php 
				switch ($reserve) {
					case 0:
						echo "<br><a href=\"ReserveRepas.php\"><input class=\"btn-reserver\" type=\"button\" value=\"Reserver\"></a>
						</br>";
						break;
					case 1:
						echo "<br><a href=\"DereserveRepas.php\"><input class=\"btn-dereserver\" type=\"button\" value=\"Annuler Reservation\"></a>
						</br>";
						break;
					default:
						echo "Bug";
						break;

				}
				
			?>
			</td>
			</tr>
	</table></center>
	<a href="Accueil.php"><input class="btn-retour" type="button" value="Retour"></a>
</body>
</html>