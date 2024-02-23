<?php
require_once '../vendor/autoload.php';

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetTitle('Liste des membres');
$pdf->SetHeaderData('', 0, 'Logo', 'Association', array(0,64,255), array(0,64,128));
$pdf->setFooterData(array(0,64,0), array(0,64,128));
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(0, 10, 'Liste des membres de l\'association', 0, true, 'C', 0, '', 0, false, 'M', 'M');
$pdf->SetFont('helvetica', '', 10);

// Ajouter les en-têtes du tableau
$pdf->Cell(10, 7, 'Numéro', 1, 0, 'C');
$pdf->Cell(40, 7, 'Nom', 1, 0, 'C');
$pdf->Cell(20, 7, 'Sexe', 1, 0, 'C');
$pdf->Cell(40, 7, 'Contact', 1, 0, 'C');
$pdf->Cell(30, 7, 'Niveau', 1, 0, 'C');
$pdf->Cell(40, 7, 'Parcours', 1, 0, 'C');
$pdf->Cell(50, 7, 'Etablissement', 1, 1, 'C');

$conn = new PDO("mysql:host=localhost;dbname=tp", "root", "");
$req = "SELECT * FROM association";
$reponse = $conn->query($req);
$membres = $reponse->fetchAll();

foreach ($membres as $row) {
    $pdf->Cell(10,7,$row['numero'],1,0,'C');
    $pdf->Cell(40,7,$row['nom'],1,0);
    $pdf->Cell(20,7,$row['sexe'],1,0,'C');
    $pdf->Cell(40,7,$row['contact'],1,0);
    $pdf->Cell(30,7,$row['niveau'],1,0);
    $pdf->Cell(40,7,$row['parcours'],1,0);
    $pdf->Cell(50,7,$row['etablissement'],1,1);
}

// Sortie du PDF
$pdf->Output('liste_membres.pdf', 'D');
?>
