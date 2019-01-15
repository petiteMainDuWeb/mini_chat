<!--insère le message reçu avec$_POSTdans la base de données puis redirige vers minichat.php.-->

<?php
try
{
 $bdd = new PDO('mysql:host = localhost;dbname=bdminichat',"root","");   
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

// Effectuer ici la requête qui insère le message
$requete = $bdd->prepare('INSERT INTO minichat (pseudo, message) VALUES(?, ?)');
$requete->execute(array($_POST['pseudo'],$_POST['message']));
// Puis rediriger vers minichat.php comme ceci :
header('Location: minichat.php');
?>