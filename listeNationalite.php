
<?php include "include/header.php"; 
include "connexionPDO.php";
$req=$monPdo->prepare("SELECT * FROM nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchAll();
?>

<main role="main">
<div class="containner">

    <table class="table table-striped">
    <thead>
        <tr>
        <th scope="col">Numéro</th>
        <th scope="col">Libellé</th>
        <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($lesNationalites as $nationalite)
        {
            echo "<tr>";
            echo "<td>{$nationalite->num}</th>";
            echo "<td>{$nationalite->libelle}</th>";
            echo "<td>1</th>";
            echo "</tr>";
        }
        ?>
    </tbody>
    </table>

</div>
</main>

<?php include "include/footer.php"; ?>
