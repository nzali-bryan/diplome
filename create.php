<?php
    use setasign\Fpdi\Fpdi;
    require_once 'connect.php';
    require_once 'FPDI/FPDI/src/autoload.php';
    require_once 'FPDF/fpdf.php';

    if($_SERVER['REQUEST_METHOD']==='POST'){
        $nom=ucwords($_POST['nom']) ;
        $mention=ucwords($_POST['mention']);
        // echo $nom . "et a la mention " . $mention;
       
        // $resultat=$requete->execute();

        #kjhjghsgjhk
       

        $pdf = new FPDF('L','mm','A4');
        $pdf->AddPage();

        // Ajouter le PNG Canva comme fond
        $pdf->Image('diplome.png', 0, 0, 297, 210); 

        // Ajouter le nom
        $pdf->SetFont('Arial','B',45);
        $pdf->SetTextColor(170, 112, 5);
        $pdf->SetXY(50,80);
        $pdf->Cell(200,10,$nom,0,0,'C');

        // Ajouter la mention
        $pdf->SetFont('Arial','I',18);
        $pdf->SetTextColor(170, 112, 5);
        $pdf->SetXY(1,103); 
        $pdf->Cell(200,10,$mention,0,0,'C');

        // Télécharger PDF
        $pdf->Output('D','diplome_'.ucwords($nom).'.pdf');

        // enregistrer le diplome
        $NomPdf= "diplome_".time().".pdf";
        $chemin="diplomes/" . $NomPdf;
        
        $pdf->Output('F' , $chemin);
        $requete=$database->prepare("INSERT INTO enfantdechoeur (chemin,nom,mention) values ('$chemin','$nom','$mention')");
        $resultat=$requete->execute();
        echo $chemin;
        exit;

        #jkhgfggh
    }else{
        echo "données non récuperées";
    }

?>
