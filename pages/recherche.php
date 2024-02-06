<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membre</title>
    <link rel="stylesheet" href="../style/style.css">
</head>
<body>
    <header>
        <h1 class="logo">LOGO</h1>
        <nav>
            <ul>
                <li><a href="../index.html">Accueil</a></li>
                <li><a href="./membre.php">Membre</a></li>
                <li><a href="">Apropos</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <div class="body">
        <h2>Listes de membres inscrit dans notre association</h2>
        <br>
        <br>
        <form action="" method="get" class="search">
            <select name="colonne" id="">
                <option value="nom">Selectionnez </option>
                <option value="nom">Nom</option>
                <option value="niveau">Niveau</option>
                <option value="parcours">Parcours</option>
                <option value="etablissement">Etablissement</option>
            </select>
            <input type="text" name="value"><button>Rechercher</button>
        </form>
        <br>
        <br>

        <?php

        $colonne = $_GET['colonne'];
        $val = $_GET['value'];
                        $conn = new PDO("mysql:host=localhost;dbname=tp", "root", "");
                        $req = "SELECT * FROM association WHERE $colonne LIKE '%$val%'";
                        $reponse = $conn->query($req);
                        $membre = $reponse->fetchAll();
                    
                       
        ?>
        <table>
            <tr>
                <th>#</th>
                <th>Nom</th>
                <th>Sexe</th>
                <th>Niveau</th>
                <th>Parcours</th>
                <th>Etablissement</th>
            </tr>
            <?php  
                if (empty($membre)) {
                    ?>
                    <tr>
                        <td colspan="6">
                            <h3>Aucun membre correspond à cette recherche</h3>
                        </td>
                    </tr>
                    <?php
                } else {
                    foreach ($membre as $List) { 
                        ?>
                        <tr>
                            <td><?=$List['numero']?></td>
                            <td><?=$List['nom']?></td>
                            <td><?=$List['sexe']?></td>
                            <td><?=$List['niveau']?></td>
                            <td><?=$List['parcours']?></td>
                            <td><?=$List['etablissement']?></td>
                        </tr>
                        <?php
                    }
                }
                ?>

        </table>
    </div>
</body>
</html>