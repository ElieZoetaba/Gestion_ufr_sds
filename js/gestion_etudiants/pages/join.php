<?php
$conn = new mysqli("localhost", "root", "", "ufr_sds");
if ($conn->connect_error) {
  echo "Erreur de connexion";
}
?>
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sqli = "SELECT numero FROM  `tuteur`";
  $print = mysqli_query($conn, $sqli);
  $etudiant = mysqli_fetch_assoc($print);
  $tu = $etudiant['numero'];
  if ($etudiant) {
    print_r($tu);
  

$sqli = "SELECT id_tuteur FROM  `etudiant_sds`";
$print = mysqli_query($conn, $sqli);
$etud = mysqli_fetch_assoc($print);

if ($etud) {
  print_r($etud);
  // print_r($tu);
  $tutors=" `etudiant_sds` (id_tuteur)
  values('$tu')";
$result = mysqli_query($conn, $sqli);
}
}
}
?>