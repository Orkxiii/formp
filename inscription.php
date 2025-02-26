<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if($_POST["password1"]==$_POST["password2"]){
        define ('SERVER', "localhost:3306");
        define ('LOGIN', "root");
        define ('MDP', "root");
        define ('BDD', "Formulaire");
    
        try{
        //On crée un objet $conn qui représente la connexion au SGBD
        $conn = new PDO("mysql:host=".SERVER.";dbname=".BDD, LOGIN, MDP);
        //On crée un rapport d’erreur et on définit le mode d'erreur de PDO sur Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $select = $conn->prepare("SELECT COUNT(*) FROM membre WHERE (login=:login);");
        $select ->bindParam(':login', $_POST['login']);
        $select->execute();
        //Retourne un tableau associatif pour chaque entrée de la table
        $resultat = $select->fetch(PDO::FETCH_NUM); // ou fetchall pour plusieurs lignes
        //print_r pour afficher le résultat de la requête
        //<pre> rend le tout un peu plus lisible
        /*echo '<pre>';
        print_r($resultat);
        echo '</pre>';*/
        if($resultat[0]==0){
            //Exemple d’enregistrement de données dans la table « membres » à partir d’un formulaire
            $insert = $conn->prepare("INSERT INTO membre(nom, prenom, login, mdp, mail) 
            VALUES(:nom, :prenom, :login, :mdp, :mail);");
            $insert ->bindParam(':nom', $_POST['nom']);
            $insert ->bindParam(':prenom', $_POST['prenom']);
            $insert ->bindParam(':login', $_POST['login']);
            $insert ->bindParam(':mdp', $_POST['password1']);
            $insert ->bindParam(':mail', $_POST['mail']);
            $insert ->execute();
            header("location:index.php");
        }  
        }   
        //fin du try
        catch(PDOException $e){
            echo "Erreur : " . $e->getMessage();
            }
}

 //On capture les exceptions si une exception est lancée et on affiche les informations relatives à celle-ci

 ?>
</body>
</html>