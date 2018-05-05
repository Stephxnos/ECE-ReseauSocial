<?php

$pseudo = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
$idutilisateur = isset($_POST["idutilisateur"])? $_POST["idutilisateur"] : ""; 
$age = isset($_POST["age"])? $_POST["age"] : ""; 
$mdp = isset($_POST["mdp"])? $_POST["mdp"] : ""; 
//identifier votre BDD
$database = "bdd";
//connecter l'utilisateur dans BDD
$db_handle = mysqli_connect('localhost','root',''); 
$db_found = mysqli_select_db($db_handle, $database); 
//si la BDD existe
if ($db_found) {
	$sql = "SELECT * FROM utilisateur";

	if ($pseudo != "") {
		$sql .= " WHERE Pseudo LIKE '%$pseudo%' "; 
		if ($auteur != "") {
		$sql .= " AND Auteur LIKE '%$auteur%' "; 
	} //fin if
} //fin if

//deux solutions possibles: en utilisant fetch_assoc et fetch_row 
$result = mysqli_query($db_handle,$sql);
while ($data = mysqli_fetch_assoc($result)) {
	echo "Pseudo:" . $data['Pseudo'] . '<br>';
	echo "IDUTILISATEUR:" . $data['IDUTILISATEUR'] . '<br>';
	echo "AGE:" . $data['AGE'] . '<br>';
	echo "MDP:" . $data['MDP'] . '<br>';
	echo "SEXE:" . $data['SEXE'] . '<br>';
}
//une autre solution
//while ($data = mysqli_fetch_row($result)) {
// echo "ID: " . $data[0] . '<br>';
// echo "Titre: " . $data[1] . '<br>';
// echo "Auteur: " . $data[2] . '<br>';
// echo "Annee: " . $data[3] . '<br>';
// echo "Editeur: " . $data[4] . '<br>'; //}
}
else {
}
//fermer la connexion 
mysqli_close($db_handle);

?>