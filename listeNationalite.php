
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
        <div class="col-3"><a href="ajoutNationalite.php" class="btn btn-success">Modifier la table</a></div>
    </div>

    <table class="table table-hover table-striped">
    <thead>
        <tr>
        <th scope="col" class="col-2">Numéro</th>
        <th scope="col" class="col-8">Libellé</th>
        <th scope="col" class="col-2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($lesNationalites as $nationalite)
        {
            echo "<tr>";
            echo "<td class='col-2'>{$nationalite->num}</th>";
            echo "<td class='col-8'>{$nationalite->libelle}</th>";
            echo "<td class='col-2'>
            <a href='#' class='btn btn-primary' role='button'>Editer</a>
            <a href='#' class='btn btn-danger' role='button'>Supprimer</a>
            </td>";
            echo "</tr>";
        }
        ?>
    </tbody>
    </table>

</div>

<?php include "include/footer.php"; ?>
