<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h3>INSCRIPTION</h3>
    <form action="inscription.php" method="POST">
        <label for="nom">Nom</label>
        <input type="text" name="nom">
        <br>
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom">
        <br>
        <label for="email">mail</label>
        <input type="email" name="mail">
        <br>
        <label for="login">login</label>
        <input type="text" name="login">
        <br>
        <label for="mdp">password</label>
        <input type="text" name="password1">
        <br>
        <label for="mdp">confirmer le mot de passe</label>
        <input type="text" name="password2">
        <br>
        <input type="submit">
        <br>
    </form>
    <h3>CONNEXION</h3>
    <form action="connexion.php" method="POST">
        <label for="login">Login</label>
        <input type="text" name="login">
        <br>
        <label for="password">Password</label>
        <input type="text" name="password">
        <br>
        <input type="submit">
        <br>
    </form>
</body>
</html>