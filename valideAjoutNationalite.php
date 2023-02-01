<?php include "include/header.php"; 
include "connexionPDO.php";
$libelle=$_POST['libelle']; // donnée du formulaire

$req=$monPdo->prepare("INSERT INTO nationalite(libelle) VALUES(:libelle)");
$req->bindParam(':libelle', $libelle);
$nb = $req->execute();

echo '<div class="container mt-5">
<div class="row">
<div class="col mt-3">';
if($nb ==1)
{
    echo '<div class="alert alert-success" role="alert">
        La nationalité a bien été ajoutée </div>';
} else {
    echo '<div class="alert alert-danger" role="alert">
        La nationalité n\'a pas été ajoutée ! </div>';
}
echo '</div> </div> </div>';
?>
<a href="listeNationalite.php" class="btn btn-primary">Revenir à la liste</a>
<?php include "include/footer.php"; ?>