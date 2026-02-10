<?php
    require_once 'connect.php';

    if($_SERVER['REQUEST_METHOD']==="POST"){
        $nom=$_POST['nom'];
        $password=$_POST['password'];
        echo $nom . " " . $password;
        # je vérifie les coordonnées
        $requete=$database->prepare("SELECT password FROM administrateur WHERE nom='$nom'");
        $resultat=$requete->execute();
        $ligne=$requete->fetchAll(PDO::FETCH_ASSOC);

        if ($ligne){
            foreach ($ligne as $InfoLigne){
                if ($password===$InfoLigne['password']){
                    echo "admin connecter";
                         header("location: parchemins.php?");
                    exit;
                }else{
                    echo "Erreur de Mot de passe ";
                    header("location: index.php? message=Mot de passe incorrecte");
            
                    exit;

                }
            }
        }else{
            echo "Erreur de nom";
            header ("location: index.php? message= erreur de nom ");
            exit;
        }

    }else{
        echo "données non récupérées";
         header ("location: index.php? message= problème rencontrez veillez contacter l'equipe technique");
        exit;
    }
?>