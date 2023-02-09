<?php include "include/header.php"; 
include "connexionPDO.php";
$num=$_POST['num']; 
$libelle=$_POST['libelle']; // donnée du formulaire

$req=$monPdo->prepare("UPDATE nationalite SET libelle = :libelle WHERE num = :num");
$req->bindParam(':num', $num);
$req->bindParam(':libelle', $libelle);
$nb = $req->execute();

echo '<div class="container mt-5">
<div class="row">
<div class="col mt-3">';
if($nb ==1)
{
    echo '<div class="alert alert-success" role="alert">
        La nationalité a bien été modifiée </div>';
} else {
    echo '<div class="alert alert-danger" role="alert">
        La nationalité n\'a pas été modifiée ! </div>';
}
echo '</div> </div>';
?>
<a href="listeNationalite.php" class="btn btn-primary">Revenir à la liste</a>
</div>
<?php include "include/footer.php"; ?>