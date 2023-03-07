<?php include "../include/header.php"; 
include "../connexionPDO.php";
$action = $_GET['action'];
if ($action == "Ajouter" )
{
    $req=$monPdo->prepare("SELECT * FROM genre");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->execute();
    $lesGenres=$req->fetchAll();
}
else if ($action == "Modifier" )
{
    $num=$_GET['num'];
    $req=$monPdo->prepare("SELECT * FROM genre WHERE num=:num");
    $req->setFetchMode(PDO::FETCH_OBJ);
    $req->bindParam(':num', $num);
    $req->execute();
    $leGenre=$req->fetch();
}
?>

<div class="container mt-5">

    <div class="row pt-3">
        <div class="col-md-6 offset-md-4"><h2><?php echo $action;?> un genre</h2></div>
    </div>

    <form action="valideGenre.php?action=<?php echo $action;?>" method="post" class='col-md-6 offset-md-3'>
    <div class="form-group">
        <label for="libelle">Genre</label>
        <input type="text" class='form-control' placeholder='Saisir le libellé' name='libelle' value= "<?php if ($action == "Modifier") echo $leGenre->libelle;?>">
    </div>
    <?php if ($action == "Modifier") echo "<input type='hidden' name='num' id='num' value= '$leGenre->num'>"; ?>
    <div class="row">
        <div class="col"><a href="listeGenre.php" class='btn btn-primary btn-block'>Revenir à la liste</a></div>
        <div class="col"><button type='submit' class='btn btn-success btn-block'><?php echo $action;?></button></div>
    </div>
    </form>

</div>

<?php include "../include/footer.php"; ?>