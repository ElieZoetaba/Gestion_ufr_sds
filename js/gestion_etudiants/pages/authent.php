<?php
if(isset( $_POST['retour'])){
    header('Location: ./index.html');
}
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
    $un=$_POST['mail'];
    $pas=$_POST['pass'];
    $pw= md5($_POST['pass']);
        
    $conn = $db->prepare('SELECT * FROM admin_ufr WHERE email = :email AND passe = :passe');
    $conn->execute(array(
        'email' => $un, 'passe' => $pw
    ));
    $res = $conn->fetch();
    if (!$res) {
        $error="Donnes invalides";
    }
    else{
        header('Location:./table.php');
        exit;
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
    <link rel="stylesheet" href="../css/ins_etud.css">
    <title>Authentification</title>
</head>
<body class="">
    <main class=" col-8 offset-2 border border-3 aut">
        <div class="container authent2 border border-1">
            <div class="row">
                <div class="col text-center text-light authent">
                    <div class="logo">
                        <img src="../img/arton112289-removebg-preview.png" alt="" srcset="">
                    </div>
                    <h4>UNIVERSITE JOSEPH KI-ZERBO UFR/SDS</h4>
                    <h6 class="text-warning">AUTHENTIFIEZ-VOUS</h6>
                </div>
                <div class="col formula bg-#ffffffda">
                    <form method="post">
                        <h3>Authentification</h3>
                        <fieldset>
                            <input type="email" name="mail" id="" placeholder="Adresse mail" required autocomplete="off">
                        </fieldset>
                        <fieldset>
                            <input type="password" name="pass" id="" placeholder="Mot de passe" required autocomplete="off">
                        </fieldset>
                        <fieldset>
                            <button class="btn btn-danger"> Annuler</button>
                            <button type="submit" name="submit" class="btn btn-success" >Connexion</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
