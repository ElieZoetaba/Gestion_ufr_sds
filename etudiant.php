<?php
$conn= new mysqli("localhost","root","","ufr_sds");
if($conn->connect_error){
    echo "Error";
}
?>
<?php
 if(isset($_POST['submit'])){
     $nom=$_POST['nom'];
     $prenom=$_POST['prenom'];
     $naissance=$_POST['nais'];
     $email=$_POST['mail'];
     $contact=$_POST['tel'];
        
         $sql= "INSERT INTO `etudiant_sds` (nom,prenom,naissance,email,tel)
         values('$nom','$prenom','$naissance','$email','$contact')";
         $result = mysqli_query($conn, $sql);
         if ($result) {
             header("Location: inscri_etud.php");
         }
    }
 
?>