<?php 
session_start();
$donnees_admin = $_SESSION['donnees'];
$user_temp = $_SESSION['donnees']['temp_user'];
echo $user_temp;
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
	<center><table id="B1" style="margin-top:50px;height:200px;width:500px;border-width:0.5px;">
			<tr>
			<td>
				<br>Statut Reservation: 
		<?php 
				try{
					$bdd = new PDO('mysql:host=localhost;dbname=cantineetudiants;charset=utf8', 'root', '');
				}
				catch (Exception $e){
					die('Erreur :'.$e->getMessage());
				}
/*				$reponse = $bdd->query("SELECT * FROM utilisateurs"); 
				while ($donnees = $reponse->fetch()){	
					if($donnees['identifiant'] == $user_temp['identifiant']){
						$savedonnees = $donnees;
						$reponse->closeCursor(); // Termine le traitement de la requête
					}
				}
*/				$reponse = $bdd->query("SELECT * FROM reservation"); 
				while ($datareserve = $reponse->fetch()){
						
					if($datareserve['identifiant'] == $user_temp['identifiant']){
						$savedata = $datareserve;
						$reponse->closeCursor(); // Termine le traitement de la requête
					}
				}
				$statut = $user_temp['statut'];
				switch($statut){
					case 1: // etudiant 5 euros
						$prix = 5;
						break;
					case 2: // prof 7 euros
						$prix = 7;
						break;
					case 3: // personnel 7 euros
						$prix = 7;
						break;
				}
				$solde = $user_temp['solde'];
				$reserve = $savedata['reserveRepas'];
				switch ($reserve) {
					case 0:
						echo "Non Reserv&eacute";
						echo "<br />Solde = ".$solde." &euro;";
						echo "<br />Prix d'un repas = ".$prix." &euro;";
						echo "<br />Identifiant = ".$user_temp['identifiant'];
						break;
					case 1:
						echo "Reserv&eacute";
						echo "<br />Solde = ".$solde." &euro;";
						echo "<br />Identifiant = ".$user_temp['identifiant'];
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
						echo "<br><a href=\"ReserveRepas_Admin.php\"><input class=\"btn-reserver\" type=\"button\" value=\"Reserver\"></a>
						</br>";
						break;
					case 1:
						echo "<br><a href=\"DereserveRepas_Admin.php\"><input class=\"btn-dereserver\" type=\"button\" value=\"Annuler Reservation\"></a>
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
	<a href="Accueil_Admin.php"><input class="btn-retour" type="button" value="Retour"></a>

</body>
</html>