
<?php include "include/header.php"; 
include "connexionPDO.php";
$req=$monPdo->prepare("SELECT * FROM nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchAll();
?>

<div class="container mt-5">

    <div class="row pt-3">
        <div class="col-9"><h2>Ajouter une Nationalité</h2></div>
        <div class="col-3"><a href="" class="btn btn-success">Modifier la table</a></div>
    </div>

    <form action="valideAjoutNationalite.php" method="post" class='col-md-6 offset-md-3'>
    <div class="form-group">
        <label for="libelle"></label>
        <input type="text" class='form-control' placeholder='Saisir le libellé' name='libelle'>
    </div>
    <div class="row">
        <div class="col"><a href="listeNationalite.php" class='btn btn-primary btn-block'>Revenir à la liste</a></div>
        <div class="col"><button type='submit' class='btn btn-success btn-block'>Valider</button></div>
    </div>
    </form>

</div>

<?php include "include/footer.php"; ?>
