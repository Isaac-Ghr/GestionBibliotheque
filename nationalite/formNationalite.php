<?php include "../include/header.php"; 
include "../connexionPDO.php";
$action = $_GET['action'];
if ($action == "Ajouter" )
{
    $req=$monPdo->prepare("SELECT * FROM nationalite");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->execute();
    $lesNationalites=$req->fetchAll();
}
else if ($action == "Modifier" )
{
    $num=$_GET['num'];
    $req=$monPdo->prepare("SELECT * FROM nationalite WHERE num=:num");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->bindParam(':num', $num);
    $req->execute();
    $laNationalite=$req->fetch();
}
$reqCont=$monPdo->prepare("SELECT * FROM continent");
$reqCont->setFetchMode(PDO::FETCH_OBJ);
$reqCont->execute();
$lesContinents=$reqCont->fetchAll();
?>

<div class="container mt-5">

    <div class="row pt-3">
        <div class="col-md-6 offset-md-4"><h2><?php echo $action;?> une Nationalité</h2></div>
    </div>

    <form action="valideNationalite.php?action=<?php echo $action;?>" method="post" class='col-md-6 offset-md-3'>
    <div class="form-group">
        <label for="libelle">Nationalité</label>
        <input type="text" class='form-control' placeholder='Saisir le libellé' name='libelle' value= "<?php if ($action == "Modifier") echo $laNationalite->libelle;?>">
    </div>
    <div class="form-group">
        <label for="continent">Continent</label>
        <select class="custom-select" name="continent">
            <?php 
            foreach ($lesContinents as $continent)
            {
                $select = $continent->numCont == $laNationalite->numContinent ? 'selected=' : '';
                echo "<option value='$continent->numCont' $select>$continent->libelle</option>";
            }
            ?>
        </select>
    </div>
    <?php if ($action == "Modifier") echo "<input type='hidden' name='num' id='num' value= '$laNationalite->num'>"; ?>
    <div class="row">
        <div class="col"><a href="listeNationalite.php" class='btn btn-primary btn-block'>Revenir à la liste</a></div>
        <div class="col"><button type='submit' class='btn btn-success btn-block'><?php echo $action;?></button></div>
    </div>
    </form>

</div>

<?php include "../include/footer.php"; ?>