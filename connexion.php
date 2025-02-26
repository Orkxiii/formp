<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
<?php
define ('SERVER', "localhost:3306");
define ('LOGIN', "root");
define ('MDP', "root");
define ('BDD', "Formulaire");
try{
 //On crée un objet $conn qui représente la connexion au SGBD
 $conn = new PDO("mysql:host=".SERVER.";dbname=".BDD, LOGIN, MDP);
 //On crée un rapport d’erreur et on définit le mode d'erreur de PDO sur Exception
 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $select = $conn->prepare("SELECT * FROM membre WHERE (login=:login);");
 $select ->bindParam(':login', $_POST['login']);
 $select->execute();
 //Retourne un tableau associatif pour chaque entrée de la table
 $resultat = $select->fetch(PDO::FETCH_ASSOC); // ou fetchall pour plusieurs lignes
 //print_r pour afficher le résultat de la requête
 //<pre> rend le tout un peu plus lisible  
 //fin du try

 if ( $_POST["password"] === $resultat["mdp"] ){
    session_start();
    $_SESSION["login"]=$_POST["login"];
    header("Location: espace-membre.php");
 }
 else {
 echo "Mot de passe incorrect.";
}
}

 //On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci

 catch(PDOException $e){
 echo "Erreur : " . $e->getMessage();
 }
 ?> 
</body>
</html>
