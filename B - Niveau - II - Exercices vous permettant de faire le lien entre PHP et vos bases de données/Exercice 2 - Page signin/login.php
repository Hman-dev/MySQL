<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
</head>
<body>
<h1>Connexion Utilisateur</h1>
<form action="login.php" method ="post">
    <label>Login :</label>
    <input type="text" name="utilisateur" required/> 
    <label>password</label>
    <input type="password" name= "mdp" required/>
    <input type="submit" value="valider">
    
</form>

<?php

if(isset($_POST['utilisateur']) && isset($_POST['mdp'])){

$login = $_POST['utilisateur'];
$mdp = $_POST['mdp'];
date_default_timezone_set('Europe/Paris');
setlocale(LC_TIME,"fr_FR.UTF-8", "French_France.1252");
$date = date('Y-m-d H:i:s');



$base = new PDO('mysql:host=localhost;dbname=niveau2;charset=utf8', 'root', '');

$sql = "INSERT INTO connexions(login,PASSWORD, heure_connexion) VALUES('$login','$mdp', '$date')"; 
$base-> query($sql);



}
?>

</body>
</html>