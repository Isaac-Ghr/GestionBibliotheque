
<?php include "include/header.php"; 
include "connexionPDO.php";
$req=$monPdo->prepare("SELECT * FROM nationalite WHERE num=:num");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->bindParam(':num', $num);
$req->execute();
$lesNationalites=$req->fetchAll();
$num=$_GET['num'];
?>

<div class="container mt-5">

    <div class="row pt-3">
        <div class="col-9"><h2>Modifier une Nationalité</h2></div>
        <div class="col-3"><a href="" class="btn btn-success">Modifier la table</a></div>
    </div>

    <form action="valideModifNationalite.php" method="post" class='col-md-6 offset-md-3'>
    <div class="form-group">
        <label for="libelle"></label>
        <input type="text" class='form-control' placeholder='Saisir le libellé' name='libelle'>
    </div>
    <input type="hidden" name="num" id="num">
    <div class="row">
        <div class="col"><a href="listeNationalite.php" class='btn btn-primary btn-block'>Revenir à la liste</a></div>
        <div class="col"><button type='submit' class='btn btn-success btn-block'>Valider</button></div>
    </div>
    </form>

</div>

<?php include "include/footer.php"; ?>
