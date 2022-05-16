<?php
$conn = new mysqli("localhost", "root", "", "ufr_sds");
if ($conn->connect_error) {
  echo "Erreur de connexion";
}
?>

<?php
if (isset($_GET['submit'])) {
  $nom = $_GET['nom'];
  $prenom = $_GET['prenom'];
  $naissance = $_GET['nais'];
  $email = $_GET['mail'];
  $tel = $_GET['tel'];

  $sql = "INSERT INTO `etudiant_sds` (nom,prenom,naissance,email,tel,id_tuteur)
            values('$nom','$prenom','$naissance','$email','$tel')";
  $result = mysqli_query($conn, $sql);
  if ($result) {
  }
}
?>

<?php
if (isset($_GET['tuteur'])) {
  $nom = $_GET['name'];
  $prenom = $_GET['last'];
  $mail = $_GET['mail'];
  $contact = $_GET['tel'];
  $sqli = "INSERT INTO `etudiant_sds` (id_tuteur) value('$contact')";
  $sql = "INSERT INTO `tuteur` (nom,prenom,email,numero) 
         values('$nom','$prenom','$mail','$contact')";
  $result = mysqli_query($conn, $sql);


  print_r($result);
  if ($result) {


    //  echo "success";
    //  header('Location: table.php');
    //  exit;
  }
}

?>
<?php
if (isset($_GET['join'])) {
  $nom = $_GET['nam'];
  $prenom = $_GET['lname'];
  $mail = $_GET['email'];
  $contact = $_GET['call'];

  $query = "SELECT * FROM `etudiant_sds` WHERE id = $id";
  $resultats = mysqli_query($conn, $query);
  $row = mysqli_fetch_assoc($resultats);
  $sqli = "SELECT * FROM  `etudiant_sds` where `id`=$id";
  $print = mysqli_query($conn, $sqli);
  $etudiant = mysqli_fetch_assoc($print);
  if ($etudiant) {
    print_r($etudiant);
  }


  $sql = "INSERT INTO `etudiant_sds` (id_tuteur) value('$contact')";
  $result = mysqli_query($conn, $sql);


  print_r($result);
  if ($result) {


    //  echo "success";
    //  header('Location: table.php');
    //  exit;
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/table.css">
  <title>Tableau d'etudiants</title>
</head>

<body class="p-0 m-0">


  <div class="corps border border-3">
    <header>
      <div class="col-2">
        <img src="../img/arton112289-removebg-preview.png" alt="" class="logo">
      </div>
      <ul class="nav nav-pills nav-justified w-100">
        <div class="container">
          <div class="row">
            <div class="col col-10 d-flex justify-content-start fs-4">
              <li>
                <p class="text-light">UNIVERSITE JOSEPH KI-ZERBO/SDS</p>
              </li>
            </div>

            <div class="col col-2 text-center">
              <li>
                <button class=" btn btn-info"> Connecté</button>
              </li>
            </div>
          </div>
        </div>
      </ul>
    </header>

    <main class="bg-" id="grad">
      <div class="container">
        <div class="row">
          <div class="col-2 ">
            <ul>
              <li>
                <form action="" method="post">
                  <input type="search" name="recherche" id="" class="form-control" placeholder="Rechercher______">
                </form>
              </li>
              <button type="button" class="btn border border-1 text-light fs-5" data-bs-toggle="modal">
                <ion-icon name="people"></ion-icon>Liste
              </button>

            </ul>
            <!-- Button trigger modal -->
            <button type="button" class="btn border border-1 text-light fs-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
              <ion-icon name="person-add"></ion-icon> Ajouter</a>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title bg-brown" id="exampleModalLabel">Ajoutez un etudiant</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body d-block">

                    <form method="get" class="d-block">
                      <fieldset>
                        <input type="text" name="nom" id="" placeholder="Nom" required>
                      </fieldset>
                      <fieldset>
                        <input type="text" name="prenom" id="" placeholder="Prenom" required>
                      </fieldset>
                      <fieldset>
                        <input type="date" name="nais" id="" placeholder="Date de naissance" required>
                      </fieldset>
                      <fieldset>
                        <input type="email" name="mail" id="" placeholder="Adresse mail" required>
                      </fieldset>
                      <fieldset>
                        <input type="texte" name="tel" id="" placeholder="Téléphone" required>
                      </fieldset>
                      <fieldset>
                        <label>Choisir</label>
                        <?php
                        $query_tutors = "SELECT * FROM `tuteur`";
                        $result_tutors = mysqli_query($conn, $query_tutors);
                        ?>
                        <select type="select" name="tutor" id="" class='w-100 border border-2'>
                          <?php
                          while ($ro = mysqli_fetch_assoc($result_tutors)) {
                            echo "<option>$ro[nom] $ro[prenom]</option>";
                          }
                          ?>

                        </select>
                      </fieldset>
                      <fieldset>
                        <button type="button" class="btn btn-info border border-1 fs-5  mt-3" data-bs-toggle="modal" data-bs-target="#tuteurModal">
                          <ion-icon name="add"></ion-icon></a>
                        </button>
                      </fieldset>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" name="submit" class="btn btn-primary">
                    <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value="Fermer">
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- Button trigger modal -->
            <button type="button" class="btn border border-1 text-light fs-5  mt-3" data-bs-toggle="modal" data-bs-target="#tuteurModal">
              <ion-icon name="add"></ion-icon>
              <ion-icon name="person"></ion-icon>Tuteur</a>
            </button>
            <!-- Modal -->
            <div class="modal fade" id="tuteurModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title bg-brown" id="exampleModalLabel">Ajoutez un tuteur</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body d-block">
                    <form method="get" class="d-block">
                      <fieldset>
                        <input type="text" name="name" id="" placeholder="Nom" required>
                      </fieldset>
                      <fieldset>
                        <input type="text" name="last" id="" placeholder="Prenom" required>
                      </fieldset>
                      <fieldset>
                        <input type="email" name="mail" id="" placeholder="Email" required>
                      </fieldset>
                      <fieldset>
                        <input type="texte" name="tel" id="" placeholder="Téléphone" required>
                      </fieldset>
                      </fieldset>
                  </div>
                  <div class="modal-footer">
                    <input type="submit" name="tuteur" class="btn btn-primary" name="tuteur" value="Envoyer">
                    <input type="submit" class="btn btn-secondary" data-bs-dismiss="modal" value="Fermer">
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-9">
            <h3 class="text-center border-3 border-bottom">GESTION DES ETUDIANTS DE L'UFR/SDS</h3>
            <div class="d-flex justify-content-end">
              <div class="text-light fs-6 circle text-center ">
                <?php
                $sql_rec = "select * from `etudiant_sds`";

                $count= "select COUNT(*) from `etudiant_sds`";
                $counter = mysqli_query($conn, $count);
                $counte = mysqli_fetch_assoc($counter);
                ?>
                <?php  print_r($counte['COUNT(*)']);?></div>
            </div>
            <table class="">
              <table id="example" class="display table">
                <thead class="border border-0">
                  <tr>
                    <th scope="col">
                      <ion-icon name="list"></ion-icon>
                    </th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prenom</th>
                    <th scope="col">Adresse mail</th>
                    <th scope="col">Telephone</th>
                    <th scope="col">Options</th>
                  </tr>
                </thead>
                <tbody>


                  <?php
                  $sql_rec = "select * from `etudiant_sds`";
                  $resulta = mysqli_query($conn, $sql_rec);
                  $query_tutors = "SELECT * FROM tuteur";
                  $result_tutors = mysqli_query($conn, $query_tutors);
                  
                  if (isset($resulta)) {
                    while ($row = mysqli_fetch_assoc($resulta)) {

                      echo "  
                        <tr>
                        <th scope='row'></th>
                        <td>$row[nom]</td>
                        <td>$row[prenom]</td>
                        <td>$row[email]</td>
                        <td>$row[tel]</td>
                        <td colspan='1'>
                          <a href='./profil.php?id=$row[id]'><button class='btn btn-success'><ion-icon name='eye'></button></a>
                          <a href='./modifie.php?id=$row[id]'>
                          <button class='btn btn-primary'><ion-icon name='create-outline'></ion-icon></button>
                          </a>

                            <a href='./supprime.php?value=$row[nom]'><button class='btn btn-danger'><ion-icon name='trash-outline'></ion-icon></button></a> 
                        </td>
                        </tr> 
                        ";
                    }
                  }
                  ?>

                </tbody>
              </table>
            </table>
          </div>
        </div>
      </div>
    </main>
  </div>
  <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method='get' class="d-block">
            <fieldset>
              <input type="text" name="nam" id="" placeholder="Nom" required>
            </fieldset>
            <fieldset>
              <input type="text" name="lname" id="" placeholder="Prenom" required>
            </fieldset>
            <fieldset>
              <input type="email" name="email" id="" placeholder="Email" required>
            </fieldset>
            <fieldset>
              <input type="texte" name="call" id="" placeholder="Téléphone" required>
            </fieldset>
            </fieldset>

        </div>
        <div class="modal-footer">

          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
          <button type="button" class="btn btn-primary" name="tuteur">Envoyer</button>
          <input type="submit" name="join">
          </form>
        </div>
      </div>
    </div>
  </div>

  <script src="../css/bootstrap.min.js"></script>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
</body>

</html>