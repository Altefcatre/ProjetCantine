<html>
	<head>
	<meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
	<title>Salon de la decoration</title>
    <meta name="author" content="Pellerin Matthieu" />
	<link href="css.css" rel="stylesheet" type="text/css"/>
	</head> 	
	<body>

<?php
	
	try{
		$bdd = new PDO('mysql:host=localhost;dbname=cantineetudiants;charset=utf8', 'root', '');
	}
	catch (Exception $e){
		die('Erreur :'.$e->getMessage());
	}

	$reponse = $bdd->query('SELECT * FROM etudiants');
	
	while ($donnees = $reponse->fetch()){
		$Identifiant = $donnees['identifiant'];
		$Mdp = $donnees['mdp'];
		$Solde = $donnees['solde'];	
		$Statut = $donnees['statut'];	
		
		echo("
		<FORM name=\"formulaire\" METHOD=\"POST\" action=\"Detail.php\" style =\"margin-left:5px;\">
	   <table id=\"B1\" style=\"width:900px;\">
		  <thead>
		   <tr>
		   <th id=\"B2\">Identifiant</th>
		   <th id=\"B2\" >Mot de passe</th>
		   <th id=\"B2\" >Solde</th>
		   <th id=\"B2\" >Statut</th>
	   </tr>
		  </thead>
	   <tbody>
	   <tr>
	   <td id=\"B1\"><p>");
	   echo $Identifiant;
	   echo("</p></td><td id=\"B1\"><p>");
	   echo $Mdp;
	   echo("</p></td><td id=\"B1\"><p>");
	   echo $Solde;
	   echo("</p></td><td id=\"B1\"><p>");
	   echo $Statut;
	  echo("
   </tbody>
</table> ");
	}
	if(!isset($reponse)){
		echo("<table style=\"margin-left:150px; margin-top:200px;height:70px;width:600px\">
			<tbody>
			<tr id=\"B1\">
			<td id=\"B1\"><p>Aucune Commande</p>
			</tr>
			</tbody>
			</table>
			");
	}
$reponse->closeCursor(); // Termine le traitement de la requête

?>

	</body>
</html>
