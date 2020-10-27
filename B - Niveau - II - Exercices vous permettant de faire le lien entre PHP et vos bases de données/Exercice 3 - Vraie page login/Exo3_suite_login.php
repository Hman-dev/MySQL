<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Page de Connexion</title>
</head>
<body>
<div align="center">
<h1>Connexion Utilisateur</h1>
<form action="Exo3_suite_login.php" method ="post">
    <label>Email :</label>
    <input type="email" name="utilisateur" placeholder ="Votre email" required/>
    <label>Password :</label>
    <input type="password" name= "mdp" placeholder ="Votre mot de passe" required/>
    <input type="submit" value="valider" name= "envoyer"/>
    
</form>
</div>


<?php
session_start();

if(isset($_POST["envoyer"])){

    if(isset($_POST['utilisateur']) && isset($_POST['mdp'])){

        $base = new PDO('mysql:host=localhost;dbname=niveau2;charset=utf8', 'root', '');

        $login = htmlspecialchars($_POST['utilisateur']);
        $mdp = $_POST['mdp'];
        date_default_timezone_set('Europe/Paris');
        setlocale(LC_TIME,"fr_FR.UTF-8", "French_France.1252");
        $date = date('Y-m-d H:i:s');
        
        $search = $base->prepare("SELECT * FROM utilisateur WHERE email=?");
        $search ->execute([$login]);
        $loginexist = $search->fetch();
        // var_dump ($loginexist);

        if($loginexist != false ){

            $hash = $loginexist['motdepasse'];
            $result = password_verify($mdp,$hash);
             

            if($result){
                echo ("<font color='red'>login réussi !");
                $_SESSION['utilisateur'] = $loginexist['email'];
                header("location:home.php?utilisateur=".$_SESSION['utilisateur']); /* la fonction header location va rediriger
                 l'utilisateur vers sa session home.php 
                 */
                $base = new PDO('mysql:host=localhost;dbname=niveau2;charset=utf8', 'root', '');
                $sql = "INSERT INTO connexions(login,PASSWORD,heure_connexion) VALUES('$login','$result', '$date')";
                $base -> query($sql);
            
                echo $sql."<br><br>";
            }
            else{
                echo("<div align='center'><p><font color='red'>Les idendtifiants que vous avez tapé sont incorrectes !</p></div>");
            }

           

        }else{
            echo ('<body onLoad="alert(\'Membre non reconnu, Veuillez rentrer tous les champs merci!\')">');
        }


            }

        
        
    

}


?>

</body>
</html>