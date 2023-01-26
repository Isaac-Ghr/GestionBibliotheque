
<?php include "include/header.php"; 
include "connexionPDO.php";
$req=$monPdo->prepare("SELECT * FROM nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchAll();
?>

<div class="container mt-5">

    <div class="row pt-3">
        <div class="col-9"><h2>Liste des Nationalités</h2></div>
        <div class="col-3"><a href="" class="btn btn-success">Modifier la table</a></div>
    </div>

    <form action="#" method="POST">

    </form>

</div>

<?php include "include/footer.php"; ?>
