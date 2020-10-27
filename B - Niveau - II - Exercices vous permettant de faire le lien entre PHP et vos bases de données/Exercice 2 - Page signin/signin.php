<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signin</title>
</head>
<body>
<h1>Page d'inscription</h1>
<form action="signin.php" method ="post">

    <label>Nom: </label>
    <input style= "background:red" type="text" name="nom" /></br></br>

    <label>Prénom: </label>
    <input style= "background:red" type="text" name= "prénom" /></br></br>

    <label>Email: </label>
    <input style= "background:red" type="email" name= "mail" /></br></br>

    <label >Mot de passe: </label>
    <input style= "background:red" type="password" name= "mdp" /></br></br>
    <label >Confirmez mot de passe</label>
    <input style= "background:red" type="password" name= "mdp2" /></br></br>

    <p>Etes-vous ?<p>
    <input style= "background:red" type="radio" name= "statut" value="professionnel">
    <label for="professionnel">Professionnel</label><br>
    
    <input  type="radio" name= "statut" value = "particulier">
    <label for="particulier">Particulier</label><br><br>

    <input type="checkbox" name="condition">
    <label><a href="#">Je reconnais avoir pris connaissance des conditions d'utilisation et y adhère totalement</a></label></br></br>
  

    <input type="submit" name="soummettre" value="valider"></br></br>
    
</form>

<?php





if(isset($_POST['soummettre'])){


    if(empty($_POST['condition'])){
       
        echo '<script type="text/javascript">';
        echo 'alert("Vous devez accepter les conditions et remplir tousles champs !")'; 
        echo '</script>';
     
    }else{

        if((isset($_POST["nom"])) && isset($_POST["prénom"]) 
            && isset($_POST["mail"]) && isset($_POST["mdp"]) && isset($_POST["mdp2"]) 
            && isset($_POST["statut"])){
                
                $nom = htmlspecialchars($_POST["nom"]);
                $prenom = htmlspecialchars($_POST["prénom"]);
                $email = htmlspecialchars($_POST["mail"]);
                $mdp = htmlspecialchars($_POST["mdp"]);
                $pass = password_hash($mdp, PASSWORD_DEFAULT);
                $mdp2= $_POST["mdp2"];
                $statut = $_POST["statut"];

                if($mdp !== $mdp2){

                    echo'<script type="text/javascript">';
                    echo'alert("Vos deux mots de passes ne sont pas indentiques!")';
                    echo'</script>';

                    if(!preg_match('`^\w{4,8}$`',$mdp,$mdp2)){
                    echo'<script type="text/javascript">';
                    echo'alert("Votre mot de passe doit contenir entre 4 et 8 des lettres et des chiffres!")';
                    echo'</script>';
                    }
                }else{
                        
                    $base1 = new PDO('mysql:host=localhost;dbname=niveau2;charset=utf8', 'root', '');
                    // on verifie ici que le mail n'existe pas.
                    $email = htmlspecialchars($_POST['mail']);
                    $stmt = $base1->prepare("SELECT * FROM utilisateur WHERE email=?");
                    $stmt->execute([$email]); 
                    $mailexist = $stmt->fetch();
                    if($mailexist){

                        echo'<script type="text/javascript">';
                        echo'alert("Cette email existe dejà!")';
                        echo'</script>';
                        // email n'existe pas   
                        
                    }else{

                        $base1 = new PDO('mysql:host=localhost;dbname=niveau2;charset=utf8', 'root', '');
                        $sql1 = "INSERT INTO utilisateur(nom,prénom,email,motdepasse,statut) VALUES('$nom','$prenom', '$email' ,'$pass' ,'$statut')";
                        $base1 -> query($sql1);
            
                        echo $sql1."<br><br>";
                        
                        
            
                    } 
                    
                }
            
            }

            

       
        
         
    }
    


        



   

    
}
  

?>

</body>
</html>