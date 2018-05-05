<?php 
session_start();

//connexion à la base de données resece
//include("connexion_bdd.php");

//Si le formulaire a été envoyé
if(isset($_POST['formconnexion'])){

	//Si le pseudo est le mot de passe sont bien remplis
	if(!empty($_POST['pseudo']) AND !empty($_POST['mdp'])) 
	{
		// On récupère les données
		$pseudo = isset($_POST["pseudo"])?$_POST["pseudo"]:""; 
		$mdp   = isset($_POST["mdp"])?$_POST["mdp"]:"";

		//on vérifie si elles existent
		$sql="SELECT `Pseudo`,`MotDePasse` FROM `resece`.`utilisateur` WHERE";
		$sql.="`Pseudo`= '$pseudo' AND `MotDePasse`='$mdp'";
		$result=$bdd->query($sql);

		//Si il existe bien un utilisateur avec ces identifiants
		if($result->fetch())
		{
			//on récupere son statut (admin ou utilisateur)
			$sql2="SELECT * FROM `resece`.`utilisateur` WHERE";
			$sql2.="`Pseudo`= '$pseudo'";
			$result2=$bdd->query($sql2);
			$donnes=$result2->fetch();  

			//Recuperation variable de session
			$_SESSION['id']=$donnes['Identifiant'];
			$_SESSION['admin']=$donnes['Admin'];

			//Si c'est un administrateur
			if($donnes['Admin']==1)
			{
				//On redirige vers la page des amis
				header("Location: page_amis.php?id=".$_SESSION['id']."&admin=".$_SESSION['admin']);
			}
			elseif($donnes['Admin']==0)// S'il s'agit d'un utilisateur lambda
			{
				//on redirige vers la page de l'utilisateur
				header("Location: page_utilisateur.php?id=".$_SESSION['id']."&admin=".$_SESSION['admin']);

			}

		}	
		else{
			$message_erreur="Identifiant ou mot de passe incorrect! ";
		}

	}

}


?>


<html>
	<head>
		<meta charset="utf-8" />
		<title>Projet web</title>
		<link rel="stylesheet" href="style_connexion.css" /> <!-- Lien vers fichier css -->
	</head>
	<header>
		<h1>LinkECE</h1>
	</header>
	<body>
		<!-- Formulaire de connexion-->
		<div class='formulaire'>
			<h2> Connexion</h2><br/>
			<form method="post" action="page_utilisateur.php">
				<input type="text" name="pseudo" placeholder="Entrez votre pseudo..."><br/><br/>
				<input type="password" name="mdp" placeholder="Entrez votre mot de passe..."><br/><br/>
				<input type="submit" value="Connexion" name="formconnexion"><br/>
				<br/>
				<div><?php if(!empty($message_erreur)){echo $message_erreur ;} ?></div><!-- Affiche message d'erreur si les champs ne sont pas remplis correctement-->
				<br/>

			</form>
		</div>
	</body>
</html> 

