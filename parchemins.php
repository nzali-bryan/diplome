<?php
    session_start();
    require_once 'connect.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parchemins</title>
    <link rel="stylesheet" href="css1/parchemins.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body>
    <section class="recherche">
        <form action="search.php" method="post">
            <input type="text" name="nom" required placeholder="Rechercher un Diplome">
            <button type="submit"><span>🔍</span></button>
            <?php
                if(isset ($_SESSION['erreur'])){
                    $message=$_SESSION['erreur'];
                    unset ($_SESSION['erreur']);
                    echo "<h3>".$message."</h4>";
                }           
            ?>

        </form>
    <?php

            if(isset ($_SESSION['info_diplome'])){
                $resultat=$_SESSION['info_diplome'];
                unset($_SESSION['info_diplome']);

                echo "

                            <div class='dwonload'>";
                                foreach($resultat as $info_ligne){
                                    $chemin=$info_ligne['chemin'];
                                    $nom=$info_ligne['nom'];
                                    $mention=$info_ligne['mention'];
                                    echo "<p>".$nom . "_". $mention . ".pdf</p>";
                                    echo "<a href='$chemin'  download='$nom"."_"."$mention' ><i class='bi bi-download icons'></i></a>";
                                }

                echo "      </div>";
            }
    ?>
    </section>
    <section class="containeur">

        <div class="tete">
            <div class="fils-tete">
                <div class="deco"></div>

                <h3>CREATION DE PARCHEMINS</h3>
                <h4>Plateforme de création des parchemins des Enfants de choeur de la paroisse  St PIE X</h4>
                <p>remplisser les informations ci dessus pour générer votre parchemin</p>
                <hr>
                <p style="color:red;"><span class="" >*</span> indiquera un champ requis</p>
            </div>
        </div>  
        <form action="create.php" method="POST">
            <div class="tete">
                <div class="fils-tete">
                    <div class="deco deco-input"></div><br>
                    <label for="nom"><span style="color: red;" >*</span>NOMS et PRENOMS</label>
                    <input type="text" name="nom" required placeholder="Noms & Prenoms">
                </div>
            </div>
            <div class="tete">
                <div class="fils-tete">
                    <div class="deco deco-input"></div><br>
                    <label for="mention"><span style="color: red;" >*</span>MENTIONS</label>
                    <select name="mention" id="" required>
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