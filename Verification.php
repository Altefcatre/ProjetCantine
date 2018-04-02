<?php
	session_start();
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
	
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=cantineetudiants;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur :'.$e->getMessage());
	}
	
	$reponse = $bdd->query("SELECT * FROM etudiants");
	$bonIdentifiant = 0;
	while ($donnees = $reponse->fetch()){
		if($Identifiant == $donnees['identifiant'] && $Mdp == $donnees['mdp']){
			$bonIdentifiant = 1;
			$reponse->closeCursor(); // Termine le traitement de la requête
			$_SESSION['donnees'] = $donnees;
?>
	<meta http-equiv="refresh" content="1; URL=Accueil.php">
	</head> 	
<body/>
	
<?php
		
		}
	}
	if($bonIdentifiant == 0){
		echo "<script>alert(\"Vos Identifiant sont incorrect\")</script>"; 
		?>
		<meta http-equiv="refresh" content="0; URL=Identifiants.php">
	</head> 	
<body>
<?php	}
	

?>

	</body>
</html>
