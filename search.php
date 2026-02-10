<?php
session_start();
 require_once 'connect.php';

  if ($_SERVER['REQUEST_METHOD']==='POST'){
    $nom=htmlspecialchars($_POST['nom']);
    $MotDuNom=explode(' ',$nom);
    $condition="";
    for($i=0;$i<=5;$i++){
        if (isset($MotDuNom[$i])){
            if($i===0){
                $condition="nom LIKE '%$MotDuNom[$i]%' ";
            }else{
                $condition=$condition . "AND nom LIKE '%$MotDuNom[$i]%'";
            }
        }else{
            $i=$i+5;
        }
    }
   

    $requete=$database->prepare("SELECT * FROM enfantdechoeur WHERE $condition ORDER BY id_Enfant");
    $requete->execute();
    $resultat=$requete->fetchAll(PDO::FETCH_ASSOC);

    if ($resultat){
        $_SESSION['info_diplome']=$resultat;
        header("location: parchemins.php?");
    }else{
        $_SESSION['erreur']="Aucun resultat pour ce Nom";
        header("location: parchemins.php?");
    }
    }else{
    echo "désolé mais les données ne sont pas arrivées";
  }


    ?> 


 
