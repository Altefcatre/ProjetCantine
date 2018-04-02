<?php
session_id("session2");
session_start();
$donnees = $_SESSION['donnees_user'];
$idUser = $donnees['identifiant'];


	try{
		$bdd = new PDO('mysql:host=localhost;dbname=cantineetudiants;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur :'.$e->getMessage());
	}
	$statut = $donnees['statut'];
	$solde = $donnees['solde'];
	$newsolde = -1;
	
	$canPay = 0;
	switch($statut){
		case 1: // etudiant 5 euros
			$newsolde = $solde - 5;
			if($newsolde >= 0){
				$canPay = 1;
			}
			break;
		case 2: // prof 7 euros
			$newsolde = $solde - 7;
			if($newsolde >= 0){
				$canPay = 1;
			}
			break;
		case 3: // personnel 7 euros
			$newsolde = $solde - 7;
			if($newsolde >= 0){
				$canPay = 1;
			}
			break;
		default:
			$newsolde = $solde;
			break;
	}
	
	if($canPay == 1){
		$req = $bdd->prepare('UPDATE utilisateurs SET solde = :newsolde WHERE identifiant = :idUser');
		$req->execute(array('newsolde' => $newsolde,'idUser' => $idUser));
		
		$req = $bdd->prepare('UPDATE reservation SET reserveRepas = 1 WHERE identifiant = :idUser');
		$req->execute(array('idUser' => $idUser));
		
		$reponse = $bdd->query("SELECT * FROM utilisateurs");
		while ($donnees = $reponse->fetch()){
			if($idUser == $donnees['identifiant']){
				$reponse->closeCursor(); // Termine le traitement de la requête
				$_SESSION['donnees_user'] = $donnees; // Mise a jour des donnees de la session
			}
		}
	}

	
	
	
?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>Reservation cantine</title>
    <meta name="author" content="Pellerin Matthieu" />
	<link href="CSS_InfosCompte.css" rel="stylesheet" type="text/css"/>
	<meta http-equiv="refresh" content="4; URL=Reservation_Admin.php">
	</head> 	
<body>

<?php
	if($canPay == 0){
		echo('<p style=\'text-align:center;\'> Impossible de reserver <br /> Solde insuffisant</p>');
	}
	echo('<p style=\'text-align:center;\'> Redirection vers la page de Reservation...</p>');
	

?>


	</body>
</html>