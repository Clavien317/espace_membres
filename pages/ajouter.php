<?php


$conn= new PDO ("mysql:host=localhost;dbname=tp","root","");

if(isset($_POST['valide']))
{
    if(isset($_POST['nom']) and isset($_POST['parcours']) and isset($_POST['niveau']) and isset($_POST['etablissement']))
    {
        $nom = htmlspecialchars($_POST['nom']);
        $contact = htmlspecialchars($_POST['contact']);
        $sexe = htmlspecialchars($_POST['sexe']);
        $niveau = htmlspecialchars($_POST['niveau']);
        $parcours = htmlspecialchars($_POST['parcours']);
        $etab = htmlspecialchars($_POST['etablissement']);


        $req= ("INSERT INTO association(nom,sexe,contact,niveau,parcours,etablissement) VALUES ('$nom','$sexe','$contact','$niveau','$parcours','$etab')");
        $reponse = $conn ->prepare($req);
        if($reponse ->execute())
        {
            echo "Bien enregistree";
            header("location:membre.php");
        }
        else
        {
            echo "Non enregistree";
        }
    }
}

?>