<!DOCTYPE html>
<html>
	<head>
		<title>minichat</title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		
	</head>
    <body>
        <div id="title">
            <div class="text">
                <h1>TP: Mini chat</h1>
            </div>
            <div class="illustration">
                <img src="chat.png" alt="chat" >           
            </div>
        
        </div>
        <div id="formulaire">
            <!--ici j'envoie des infos à ma base de données-->
            <form action="minichat_post.php" method="post">
                <p><label>Pseudo <input type="text" name="pseudo" id="pseudo" ></label></p>
                <p><label>Message <input type="text" name="message" id="message" ></label></p>
                <p><input type="submit" value="Envoyez"></p>
            </form>
        </div>
        <div id="post">
            <!--ici je veux afficher les données-->
            <?php
            $bdd = new PDO('mysql:host=localhost;dbname=bdminichat',"root","");
            $reponse=$bdd->query('SELECT*FROM minichat');
            while($donnees = $reponse->fetch())
            {
                echo'<p><strong>'. htmlspecialchars($donnees['pseudo']) .':</strong> '. htmlspecialchars($donnees['message']).'</p>';
            }
            $reponse->closeCursor();
            ?>
        </div>

    </body>
    
</html>
