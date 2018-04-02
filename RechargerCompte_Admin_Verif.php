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
	<link href="CSS_Identifiants.css" rel="stylesheet" type="text/css"/>

<?php
	$Identifiant = $_POST['Id'];
	$Mdp = $_POST['Mdp'];
	$Solde = $_POST['SoldeAjout'];
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
	if($Solde < 0 || !is_numeric($Solde) ){
		$safeVar = 0;
		echo "<script>alert(\"Solde Invalide\")</script>"; 
	?>
		<meta http-equiv="refresh" content="0; URL=RechargerCompte_Admin.php">
	</head> 	
<body>
<?php
	}
	wrongMdp: // mauvais mot de passe
	
	if($Mdp != $donnees_admin['mdp']){ // entrer un mauvais mot de passe
		$safeVar = 0;
		echo "<script>alert(\"Votre mot de passe est incorrect\")</script>";
		?>
		<meta http-equiv="refresh" content="0; URL=RechargerCompte_Admin.php">
	</head> 	
<body>
	<?php 
	}
	
	if($safeVar == 1){
		$newsolde = $savedata['solde'] + $Solde;
		$idUser = $savedata['identifiant'];
		$req = $bdd->prepare('UPDATE utilisateurs SET solde = :newsolde WHERE identifiant = :idUser');
		$req->execute(array('newsolde' => $newsolde,'idUser' => $idUser));
		echo "<script>alert(\"Transaction realisé avec succès\")</script>"; 

?>
<meta http-equiv="refresh" content="0; URL=RechargerCompte_Admin.php">
	</head> 	
<body>
<?php 
}
?>
	</body>
</html>
