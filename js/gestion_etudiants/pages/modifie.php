<?php
$conn=new mysqli("localhost", "root", "" ,"ufr_sds");
if ($conn->connect_error){
echo "Erreur de connexion";
}
?>
<?php

if (isset($_GET['id'])) {
    $id= $_GET['id'];
    
$query = "SELECT * FROM `etudiant_sds` WHERE id = $id";
$resultats = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($resultats);
$id= $_GET['id'];
echo "$id";
            if ($row) {
                print_r($row);
                echo "
                    <div class='col formula add'>
                    <form method='get'>
                        <h3>ETUDIANT</h3>
                        <fieldset>
                            <input type='text' name='nom' id='' placeholder=' $row[nom] ' value='$row[nom]'>
                        </fieldset>
                        <fieldset>
                            <input type='text' name='prenom' id='' placeholder='  $row[prenom]' value='$row[prenom]' requiered>
                        </fieldset>
                        <fieldset>
                            <input type='date' name='nais' id='' placeholder='$row[naissance]' value='$row[naissance]'>
                        </fieldset>
                        <fieldset>
                            <input type='email' name='mail' id=' placeholder=' $row[email]' value='$row[email]'>
                        </fieldset>
                        <fieldset>
                            <input type='texte' name='tel' id='' placeholder='$row[tel]' value='$row[tel]'>
                        </fieldset>
                        <fieldset>
                            <button type='reset' class='btn btn-danger'>Annuler</button>
                            <input type='submit' value='Ajouter' name='submit'>
                        </fieldset>
                    </form>
                </div>
            ";
            }
        }else{
            echo 'error';
        }
        
    if (isset($_GET["submit"])) {
        
        $nom=$_GET['nom'];
        $prenom=$_GET['prenom'];
        $nais=$_GET['nais'];
        $email=$_GET['mail'];
        $tel=$_GET['tel'];
        print_r($nom);
        $quer = "UPDATE `etudiant_sds` SET 
        nom='$nom',prenom='$prenom' ,naissance='$nais',email='$email',tel='$tel', WHERE id=$id";
        $modif = mysqli_query($conn, $quer);
        if ($modif){
            echo ' entrez';
        header("Location: ./table.php");
        }
    }else{
        echo ' submit not getted';
    }
    ?>
    <script src="../assets/js/uikit.min.js"></script>
    <script src="../assets/js/uikit-icons.min.js"></script>
</body>

</html>