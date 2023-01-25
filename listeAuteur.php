
<?php include "include/header.php"; 
include "connexionPDO.php";
$req=$monPdo->prepare("SELECT * FROM auteur");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesAuteurs=$req->fetchAll();
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
        foreach($lesAuteurs as $auteur)
        {
            echo "<tr>";
            echo "<td>{$auteur->num}</th>";
            echo "<td>{$auteur->nom}</th>";
            echo "<td>{$auteur->prenom}</th>";
            echo "<td>1</th>";
            echo "</tr>";
        }
        ?>
    </tbody>
    </table>

</div>
</main>

<?php include "include/footer.php"; ?>
