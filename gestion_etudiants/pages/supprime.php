<?php
$conn=new mysqli("localhost", "root", "" ,"ufr_sds");
if ($conn->connect_error){
echo "Erreur de connexion";
}
?>
<?php 
$nom = $_GET["value"];

$query = "DELETE FROM `etudiant_sds` where `nom` like '$nom'";
$res = mysqli_query($conn, $query);

if ($res) {
    header("Location:table.php");
    exit;
}else{
    echo "echec de suppression";
}
?>