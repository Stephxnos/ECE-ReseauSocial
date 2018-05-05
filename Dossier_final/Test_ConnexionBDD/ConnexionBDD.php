<?php

//identifier le nom de base de données 
$database = "bdd";

//connecter l'utilisateur dans BDD
//votre serveur = localhost | votre login = root | votre mot de pass = ‘’ (rien)
$db_handle = mysqli_connect(‘localhost’, ‘root’, ‘’); 
$db_found = mysqli_select_db($db_handle, $database);

//si le BDD existe, faire le traitement 
if ($db_found) {
	$sql = "SELECT * FROM UTILISATEUR";
	$result = mysqli_query($db_handle, $sql); 
	while ($data = mysqli_fetch_assoc($result)) {
		echo "Pseudo:" . $data['Pseudo'] . '<br>';
		echo "IDUTILISATEUR:" . $data['IDUTILISATEUR'] . '<br>';
		echo "AGE:" . $data['AGE'] . '<br>';
		echo "MDP:" . $data['MDP'] . '<br>';
		echo "SEXE:" . $data['SEXE'] . '<br>';

}//end while

}//end if
//si le BDD n'existe pas
else {
	echo "Database not found";
}//end else
//fermer la connection mysqli_close($db_handle); 
?>