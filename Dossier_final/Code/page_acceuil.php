<?php 

session_start();

$admin=0;

?>


<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8" />
		<link rel="stylesheet" href="style_acceuil.css" /> <!-- Lien vers fichier css -->
		<title>projet web acceuil</title>
	</head>

	<body> 

		<header> 
			<h1>LinkECE</h1>
			
		</header>
		<h2>ECE Social Network</h2>
		<div id="bloc1"> <!--Bloc d'inscription et de connexion -->
			<a href="<?php echo "page_inscription.php?admin=".$admin; ?>">Inscription</a><br/>
			<a href='page_connexion.php'>Connexion</a>     
		</div>

	</body>
</html> 