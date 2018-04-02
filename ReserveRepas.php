<?php
session_start();
$idUser = $_SESSION['idUser'];

	try{
		$bdd = new PDO('mysql:host=localhost;dbname=cantineetudiants;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur :'.$e->getMessage());
	}
	
	$req = $bdd->prepare('UPDATE reservation SET reserveRepas = 1 WHERE identifiant = :idUser');
	$req->execute(array('idUser' => $idUser));
?>
<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>Reservation cantine</title>
    <meta name="author" content="Pellerin Matthieu" />
	<link href="CSS_InfosCompte.css" rel="stylesheet" type="text/css"/>
	<meta http-equiv="refresh" content="4; URL=Reservation.php">
	</head> 	
<body>

<?php
	echo('<p style=\'text-align:center;\'> Redirection vers la page de Reservation...</p>');
	

?>


	</body>
</html>