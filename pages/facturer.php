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
                <li><a href="./ajout.html">Nouveau membre</a></li>
                <li><a href="./cotisation.html">Cotisation</a></li>
                <li><a href="">Contact</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <div class="body">
        <h2>Listes de membres effectuer la cotisation</h2>
        <br>
        <br>
        <form action="./filtreMensuel.php" method="get" class="search">
            <select name="value" id="">
                <option value="">Selectionnez par mois </option>
                <option value="janvier">janvier</option>
                <option value="fevrier">fevrier</option>
                <option value="mars">mars</option>
                <option value="avril">avril</option>
            </select><button>Rechercher</button>
        </form>
        <br>
        <br>

        <?php
                        $conn = new PDO("mysql:host=localhost;dbname=tp", "root", "");
                        $req = "SELECT * FROM cotisation";
                        $reponse = $conn->query($req);
                        $membre = $reponse->fetchAll();
                    
                       
        ?>
        <table>
            <tr>
                <th>#</th>
                <th>Nom du Membre</th>
                <th>Mois de</th>
                <th>Montant</th>
                <th>Date de payement</th>
            </tr>
            <?php  
                    foreach ($membre as $List)
                        { 

                            $num = $List['numero'];
                            $res =$conn->query("SELECT * from association where numero='$num'");
                            $mb = $res->fetchAll(); 
                            foreach ($mb as $data)
                            {
                                // $nom = $data['nom'];
                               
            ?>
            <tr>
                <td><?=$List['id']?></td>
                <td><?=$data['nom']?></td>
                <td><?=$List['mois']?></td>
                <td><?=$List['montant']?></td>
                <td><?=$List['date']?></td>
            </tr>

            <?php }} ?>
        </table>
    </div>
</body>
</html>