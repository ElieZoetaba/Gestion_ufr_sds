<?php
$conn = new mysqli("localhost", "root", "", "ufr_sds");
if ($conn->connect_error) {
    echo "Erreur de connexion";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/profil.css">

    <title>PROFIL</title>
</head>

<body>
    <div class="corps border border-3">
        <header class="d-flex text-light bg-bronw">
            <img src="../img/arton112289-removebg-preview.png" alt="" class="logo">
            <ul class="nav">
                <div class="container">
                    <div class="row ">
                        <div class="col d-flex justify-content-start fs-4">
                            <li>
                                <p>UNIVERSITE JOSEPH KI-ZERBO/SDS</p>
                            </li>
                        </div>

                        <div class="col col-2 text-center">
                            <li>
                                <a href="./table.php"><button class=" btn bg-info border border-1 pt-2">
                                        <ion-icon name="arrow-back-outline"></ion-icon>Retour
                                    </button></a>
                            </li>
                        </div>
                    </div>
                </div>
            </ul>
        </header>
        <main class="">
            <div class="container d-flex col-12">
                <div class="row col-12">
                    <span class="text-center col-12 border-1 border-bottom my-3">
                        <h3>Profil de l'etudiant de l'UFR/SDS</h3>
                    </span>

                    <?php

                    $id = $_GET['id'];

                    $sqli = "SELECT * FROM  `etudiant_sds` where `id`=$id";
                    $print = mysqli_query($conn, $sqli);
                    $etudiant = mysqli_fetch_assoc($print);
                    echo "

            <div class='row'>
                <ul class='col flex-start p-3'>
                    <li class='pb-2 flex-end border-1 border-bottom'><ion-icon name='eye' class='px-2'></ion-icon>Etudiant
                    <li class='pb-2 border-1 border-bottom'><ion-icon name='calendar' class='px-2'></ion-icon>$etudiant[nom]</li>
                    <li class='pb-2 border-1 border-bottom'><ion-icon name='mail' class='px-2'></ion-icon>$etudiant[prenom]</li>
                    
                   <li class='pb-2 border-1 border-bottom'><ion-icon name='calendar' class='px-2'></ion-icon>$etudiant[naissance]</li>
                   <li class='pb-2 border-1 border-bottom'><ion-icon name='mail' class='px-2'></ion-icon>$etudiant[email]</li>
                    <li class='pb-2 border-1 border-bottom'><ion-icon name='call' class='px-2'></ion-icon>$etudiant[tel]</li>
                </li>
                </ul>
                <ul class='col flex-end p-3'>
                <li class='pb-2 flex-end'><ion-icon name='eye' class='px-2'></ion-icon> Tuteur
                    <li class='pb-2 border-1 border-bottom'><ion-icon name='calendar' class='px-2'></ion-icon>$etudiant[naissance]</li>
                   <li class='pb-2 border-1 border-bottom'><ion-icon name='mail' class='px-2'></ion-icon>$etudiant[email]</li>
                    <li class='pb-2 border-1 border-bottom'><ion-icon name='call' class='px-2'></ion-icon>$etudiant[tel]</li>
                </li>
                </ul>
            </div>
            
                <!-- ";
                    ?>
                </div>
                <div class="col-12 py-2 "></div>
            </div>
    </div>
    </main>
    <img src="<?php echo $profil ?>" alt="">
    </div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>