<?php include "include/header.php"; 
include "connexionPDO.php";
$action = $_GET['action'];
$libelle=$_POST['libelle'];
if ($action == "Ajouter")
{
    $req=$monPdo->prepare("INSERT INTO nationalite(libelle) VALUES(:libelle)");
    $req->bindParam(':libelle', $libelle);
}
else
{
    $num=$_POST['num'];
    $req=$monPdo->prepare("UPDATE nationalite SET libelle = :libelle WHERE num = :num");
    $req->bindParam(':num', $num);
    $req->bindParam(':libelle', $libelle);
}
$nb = $req->execute();

echo '<div class="container mt-5">
<div class="row">
<div class="col mt-3">';
if($nb ==1)
{
    echo '<div class="alert alert-success" role="alert">
        L\'action a bien été réalisé </div>';
} else {
    echo '<div class="alert alert-danger" role="alert">
        L\'action n\'a pas été réalisé </div>';
}
echo '</div> </div>';
?>
<a href="listeNationalite.php" class="btn btn-primary">Revenir à la liste</a>
</div>

<?php include "include/footer.php"; ?>