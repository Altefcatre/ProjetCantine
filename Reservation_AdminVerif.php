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
	</head> 	
<body>
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
	$utilisateurExiste = 0;
	$reponse = $bdd->query("SELECT * FROM utilisateurs"); 
	while ($donnees = $reponse->fetch()){	
		if($donnees['identifiant'] == $Identifiant){
			$savedonnees = $donnees;
			$utilisateurExiste = 1;
			$reponse->closeCursor(); // Termine le traitement de la requête
			$_SESSION['donnees']['temp_user'] = $savedonnees;
		}
	}

	
	
	if($utilisateurExiste == 0){
		$safeVar = 0;
		echo "<script>alert(\"L'utilisateur n'existe pas\")</script>"; 
?>
		<meta http-equiv="refresh" content="0; URL=Reservation_AdminLogin.php">
	</head> 	
<body>

<?php


	}
	wrongMdp:
	if($Mdp != $donnees_admin['mdp']){ // entrer un mauvais mot de passe
		$safeVar = 0;
		echo "<script>alert(\"Votre mot de passe est incorrect\")</script>";
		?>
		<meta http-equiv="refresh" content="0; URL=Reservation_AdminLogin.php">
	</head> 	
	<?php 
	}
	if($safeVar == 1){
?>
	<meta http-equiv="refresh" content="0; URL=Reservation_Admin.php">
	</head>
<?php 
	}
?>
</html>