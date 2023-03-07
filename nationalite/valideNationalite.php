<?php include "../include/header.php"; 
include "../connexionPDO.php";
$action = $_GET['action'];
if ($action == "Modifier")
{
    $num=$_POST['num'];
    $libelle=$_POST['libelle'];
    $continent=$_POST['continent'];
} 
else if ($action == "Ajouter")
{
    $libelle=$_POST['libelle'];
    $continent=$_POST['continent'];
}
// vérifie quelle action on souhaite effectuer
if ($action == "Modifier") 
{    
    $req=$monPdo->prepare("UPDATE nationalite SET libelle = :libelle, numContinent= :continent WHERE num = :num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
    $req->bindParam(':continent', $continent);
}
else if ($action == "Ajouter")
{
    $req=$monPdo->prepare("INSERT INTO nationalite(libelle, numContinent) VALUES(:libelle, :continent)");
    $req->bindParam(':libelle', $libelle);
    $req->bindParam(':continent', $continent);
}
else if ($action == "Supprimer")
{
    $numDel = $_GET['num'];
    $req=$monPdo->prepare("DELETE FROM nationalite WHERE num = :num");
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