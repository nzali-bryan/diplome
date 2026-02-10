<?php
    require_once 'comemnt_connect.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parchemins</title>
    <link rel="stylesheet" href="css1/index.css">
    <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
    <div class="containeur">
        <div class="formu">
            <?php
                if(isset ($_GET['message'])){
                    echo "<h2 class='erreur'>". htmlspecialchars( $_GET['message']) . "</h2>";
                }
            ?>
            <h2 class=" text-white">Connectez vous </h2>
            <form action="test_connection.php" method="POST" class="inputcon">
                <input type="text" placeholder="Votre Nom" name="nom" aria-describedby="entrer votre nom" required><br>
                <input type="password" placeholder="Mot De Passe" name="password" required>
                <button class=" bouton">Se Connecter</button>
            </form>
        </div>
    </div>
    

</body>
</html>
