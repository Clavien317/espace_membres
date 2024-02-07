<?php


$conn= new PDO ("mysql:host=localhost;dbname=tp","root","");

if(isset($_POST['valide']))
{
    if(isset($_POST['numeroMembre']) and isset($_POST['montant']) and isset($_POST['mois']))
    {
        $numeroMembre = htmlspecialchars($_POST['numeroMembre']);
        $mois = htmlspecialchars($_POST['mois']);
        $montant = htmlspecialchars($_POST['montant']);
        $date = date("Y-m-d h:i:sa");

        $req= ("INSERT INTO cotisation(numero,mois,montant,date) VALUES ('$numeroMembre','$mois','$montant','$date')");
        $reponse = $conn ->prepare($req);
        if($reponse ->execute())
        {
            echo "Bien enregistree";
            header("location:facturer.php");
        }
        else
        {
            echo "Non enregistree";
        }
    }
}

?>