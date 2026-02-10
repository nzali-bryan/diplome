<?php
    require_once 'connect.php';
    if ($_SERVER['REQUEST_METHOD']==='POST'){
        $nom=$_POST['nom'];
        $MotDuNom=explode(' ',$nom);
        print_r($MotDuNom);
        #jdksgclwdvxcjb kls
// Récupérer la recherche utilisateur
$recherche = trim($nom);

// Séparer la recherche en mots (même s'il y a plusieurs espaces)
// $mots = preg_split('/\s+/', $recherche);
$mots=explode(' ',$nom);

// Construire la requête SQL de base
$sql = "SELECT * FROM enfantdechoeur WHERE 1=1";
$params = [];

// Ajouter un LIKE pour chaque mot
foreach ($mots as $index => $mot) {
    $sql .= " AND nom LIKE :mot$index";
    $params[":mot$index"] = "%$mot%";  // Le % permet de chercher partout dans le nom
    print_r($params);
}


$requete = $database->prepare($sql);
$requete->execute($params);
$resultats = $requete->fetchAll(PDO::FETCH_ASSOC);

if ($resultats) {
    $i=0;
    foreach ($resultats as $row) {
        echo $row['nom'] . " - " . $row['mention'] . "<br>";
        $information[$i]=$row['nom'] . " - " . $row['mention'] .$row['chemin'];
        $i=$i+1;
       
    }

    header ("location: parchemins.php? message='$message'");
} else {
    echo "Aucun résultat trouvé.";
}

    }else{
        echo "données non reçues";
    }
?>