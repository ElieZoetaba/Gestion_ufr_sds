<?php
try {
 $db = new PDO('mysql:host=localhost;dbname=ufr_sds;charset=utf8', 'root', '');
}
catch (Exception $e)
{
    die('Erreur : ' . $e->getMessage());
}
?>
<?php
    if(isset($_POST['submit'])){
        $nom=$_POST['nom_ad'];
        $prenom=$_POST['prenom_ad'];
        $mail=$_POST['mail_ad'];
        $hash = md5($_POST['pass_ad']);

        $conn = $db->prepare('SELECT * FROM admin_ufr WHERE email = :email AND passe = :passe');
        $conn->execute(array(
        'email' => $mail, 'passe' => $hash
        ));
        $res = $conn->fetch();
        if (!$res) {
        $sql = "insert into admin_ufr(nom,prenom,email,passe) Value('$nom','$prenom','$mail','$hash')";
            $statement = $db->prepare($sql);
            $statement->execute();
                header("Location: ./table.php");
            }
            else{
                header('location: ./authent.php');
            }

        }
        else{
        echo '';
        
        }
    
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/ins_etud.css">
    <title>Inscription</title>
</head>
<body>
    <main class=" p-8 ">
        <div class="container border border-3 col-9 aut">
            <div class="row">
                <div class="col info ins_ad">
                    <div class="logo">
                        <img src="../img/arton112289-removebg-preview.png" alt="" srcset="">
                    </div>
                    <h4>UNIVERSITE JOSEPH KI-ZERBO UFR/SDS</h4>
                    <h6 class="text-warning">ENREGISTREZ VOUS EN TANT QU'ADMINISTRATEUR</h6>
                </div>
                <div class="col formula add">
                    <form method="post">
                        <h3>ADMINISTRATEUR</h3>
                        <fieldset>
                            <input type="text" name="nom_ad" id="" placeholder="Nom">
                        </fieldset>
                        <fieldset>
                            <input type="text" name="prenom_ad" id="" placeholder="Prenom">
                        </fieldset>
                        <fieldset>
                            <input type="email" name="mail_ad" id="" placeholder="Adresse mail">
                        </fieldset>
                        <fieldset>
                            <input type="password" name="pass_ad" id="" placeholder="Confirmer">
                        </fieldset>
                        <fieldset>
                            <a href="../index.html" class="text-light nav-link"></a><button type="submit" class="btn btn-danger"> Annuler</button></a>
                            <button type="submit" name="submit" class="btn btn-success" >S'inscrire</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>