<?php

session_start();

$adminrecup=$_GET['admin'];

if(isset($_POST['forminscription']))
{

	if(!empty($_POST['nom']) AND !empty($_POST['pseudo']) AND !empty($_POST['age']) AND !empty($_POST['mdp']))
	{

		// Recuperation des données et initialisation dans des variables
		$nom =  isset($_POST["nom"])?$_POST["nom"]:"";
		$pseudo = isset($_POST["pseudo"])?$_POST["pseudo"]:""; 
		$mdp = isset($_POST["mdp"])?$_POST["mdp"]:"";
		$age= isset($_POST["age"])?$_POST["age"]:""; 
		$sexe= isset($_POST["sexe"])?$_POST["sexe"]:"";
		$favorite_pic= isset($_POST["favorite_pic"])?$_POST["favorite_pic"]:""; 

		//connexion à notre base de données resece
		//include("connexion_bdd.php");

		//On verifie que le pseudo n'existe pas deja
		$sql="SELECT `Pseudo` FROM `resece`.`utilisateur` WHERE";
		$sql.="`Pseudo`= '$pseudo'";
		$query = $bdd->query($sql); 
		$count = $query->rowCount(); 

		//s'Il est unique
		if($count == 0) 
		{ 
			$admindefaut=0;
			$sql = "INSERT INTO `resece`.`utilisateur` (`Identifiant`, `Nom`, `Admin`, `MotDePasse`, `Pseudo`, `Sexe`, `ModeSecurite`, `Age`,`NbAlbum`,`FavPic`) VALUES(";
			$sql.="' ','$nom','$admindefaut','$mdp','$pseudo','$sexe','$securite','$age',0,'$favorite_pic')";
			$query = $bdd->query($sql); 


			//on initialise l'avatar par défaut
			if($sexe == 'F')
			{
				$avatar="logoF.png";


			}
			else{
				$avatar="logoH.png";
			}
			
			//On ajoute l'avatar 
			$update=$bdd->prepare("UPDATE `resece`.`utilisateur` SET `Avatar`= ? WHERE `Pseudo` = ?");
			$update->execute(array($avatar,$pseudo));




			session_start();

			$sql2="SELECT * FROM `resece`.`utilisateur` WHERE";
			$sql2.="`Pseudo`= '$pseudo'";
			$result2=$bdd->query($sql2);

			$donnes=$result2->fetch();  



			//Recuperation variable de session
			if($adminrecup==0){

				$_SESSION['id']=$donnes['Identifiant'];
				$_SESSION['admin']=$admindefaut;

				header("Location: page_utilisateur.php?id=".$_SESSION['id']."&admin=".$_SESSION['admin']);
			}	
			elseif($adminrecup==1){
				
				//Redirection vers la page des amis
				header("Location: page_amis.php");

			}	

		}
		else
		{
			$message_erreur="Ce pseudo est déjà utilisé";
		}
	}
}

?>

<!DOCTYPE html>
<html>
	<head> 
		<meta charset="utf-8" />
		<title>Projet web</title>
		<link rel="stylesheet" href="style_inscription.css" /> <!-- Lien vers fichier css -->
	</head>
	<header> 
		<h1>LinkECE</h1>
	</header>
	<body>
		<div class='formulaire2'>
			<h3> <?php if($adminrecup==1){
	echo "Ajouter un utilisateur"; }  ?></h3><br/>
			<form method="POST" action="">
				<div class='phrase'>
					<p><i>Complétez le formulaire. Les champs marqués par </i><em>*</em> sont obligatoires</p><br/>
				</div>
				<label for="nom">Nom <em>*</em></label>
				<input type="text" name="nom" placeholder="Nom.." autofocus="" required="required" size="30"><br/>
				<label for="pseudo">Identifiant <em>*</em></label>
				<input type="text" name="pseudo" placeholder="Pseudo ou email" autofocus="" required="required" size="30"><br/>
				<label for="mdp">Mot de Passe <em>*</em></label>
				<input type="password" name="mdp" placeholder="Mot de passe..." required="required"><br/>
				<label for="age">Age</label>
				<input type="number" name="age"><br>
				<label for="sexe">Sexe</label>
				<select  name="sexe">
					<option value="F" >Femme</option>
					<option value="H" selected >Homme</option>
				</select><br><br/>
				<label for="favorite_pic">Photo de couverture</label>
				<input type="file" name="favorite_pic" style="margin-left:95px;"><br/>

				<p><input type="submit" value="Inscription" name="forminscription"></p>
				<br/>

				<div class="erreurpseudo" name="erreur"><?php if(!empty($message_erreur)){echo $message_erreur ;} ?></div> <!-- Message d'erreur lorsque le formulaire n'est pas rempli correctement -->
			</form>

		</div>
	</body>
</html> 