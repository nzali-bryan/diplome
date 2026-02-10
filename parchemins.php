<?php
    require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parchemins</title>
    <link rel="stylesheet" href="css1/parchemins.css">
</head>
<body>
    <section class="recherche">
        <form action="search.php" method="post">
            <input type="text" name="nom" required placeholder="Rechercher un Diplome">
            <button type="submit"><span>🔍</span></button>
        </form>
    </section>
    <section class="containeur">
        
        <div class="tete">
            <div class="fils-tete">
                <div class="deco"></div>

                <h3>CREATION DE PARCHEMINTS</h3>
                <h4>Plateforme de création des parchements des Enfants de choeur de la paroisse  St PIE X</h4>
                <p>remplisser les informations ci dessus pour générer votre parchemins</p>
                <hr>
                <p style="color:red;"><span class="" >*</span> indiquera une question requise</p>
            </div>
        </div>  
        <form action="create.php" method="POST">
            <div class="tete">
                <div class="fils-tete">
                    <div class="deco deco-input"></div><br>
                    <label for="nom"><span style="color: red;" >*</span>NOMS et PRENOMS</label>
                    <input type="text" name="nom" requided placeholder="Noms & Prenoms">
                </div>
            </div>
            <div class="tete">
                <div class="fils-tete">
                    <div class="deco deco-input"></div><br>
                    <label for="mention"><span style="color: red;" >*</span>MENTIONS</label>
                    <select name="mention" id="">
                        <option value="PASSABLE">PASSABLE</option>
                        <option value="ASSEZ BIEN">ASSEZ BIEN</option>
                        <option value="BIEN">BIEN</option>
                        <option value="TRES BIEN">TRES BIEN</option>
                        <option value="EXCELLENT">EXCELLENT</option>
                    </select>
                </div>
            </div>
            <button type="submit"> Génerer</button>
        </form>
</section>
<footer>
    <p>Tous droits resevés </p>
    <p>Pour tous probmème sur la plateforme contacter <span style="text-decoration: underline;" >+237 655473150</span></p>
</footer>
</body>
</html>