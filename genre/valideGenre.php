<?php include "../include/header.php"; 
include "../connexionPDO.php";
$action = $_GET['action'];
if ($action == "Modifier")
{
    $num=$_POST['num'];
    $libelle=$_POST['libelle'];
} 
else if ($action == "Ajouter")
{
    $libelle=$_POST['libelle'];
}
// vérifie quelle action on souhaite effectuer
if ($action == "Modifier") 
{    
    $req=$monPdo->prepare("UPDATE genre SET libelle = :libelle WHERE num = :num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
}
else if ($action == "Ajouter")
{
    $req=$monPdo->prepare("INSERT INTO genre(libelle) VALUES(:libelle)");
    $req->bindParam(':libelle', $libelle);
}
else if ($action == "Supprimer")
{
    $numDel = $_GET['num'];
    $req=$monPdo->prepare("DELETE FROM genre WHERE num = :num");
    $req->bindParam(':num', $numDel);
}

$nb = $req->execute();

echo '<div class="container mt-5">
<div class="row">
<div class="col mt-3">';
if($nb ==1) { $_SESSION['message'] = ["success" => "L'action a bien été réalisée."]; } 
else { $_SESSION['message'] = ["danger" => "L'action n'a pas été réalisée."]; }
echo '</div> </div> </div>';

header('location: listeNationalite.php');
exit();

?>