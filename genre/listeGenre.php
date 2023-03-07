<?php include "../include/header.php"; 
include "../connexionPDO.php";
// nationalités
$textreq = "SELECT num, libelle FROM genre ";
if (!empty($_GET))
{
  if($_GET['libelle'] != "") { $textreq.= "WHERE libelle LIKE '%".$_GET['libelle']."%' "; }
}
$req=$monPdo->prepare($textreq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesGenres=$req->fetchAll();

if (!empty($_SESSION['message']))
{
  $notification = $_SESSION['message'];
  foreach ($notification as $key=>$message)
  {
    echo '
    <div class="container pt-5 mt-3">
    <div class = "alert alert-'.$key.' alert dismissible fade show" role = "alert">'.$message.'
    <button type = "button" class = "close" data-dismiss = "alert" aria-label = "Close">
      <span aria-hidden = "true">&times;</span>
    </div> </div>
    ';
  }
  $_SESSION['message']=[];
}

?>



<div class="container mt-5">

    <div class="row pt-3">
        <div class="col-9"><h2>Liste des Genres</h2></div>
        <div class="col-3"><a href="formGenre.php?action=Ajouter" class="btn btn-success btn-block">Ajouter un genre</a></div>
    </div>
    <hr>
    <form action="" method="get" class="mt-3 mb-3">
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" id="libelle" placeholder="saisir le libellé" name="libelle" value=<?php if (!empty($_GET['libelle'])) { echo "'{$_GET['libelle']}'"; } else { echo "''"; } ?>>
        </div>
        <div class="col">
          <button type="submit" class="btn btn-success btn-block">Rechercher</button>
        </div>
      </div>
    </form>

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
        foreach($lesGenres as $genre)
        {
            echo "<tr>";
            echo "<td class='col-2'>{$genre->num}</th>";
            echo "<td class='col-8'>{$genre->libelle}</th>";
            echo "<td class='col-2'>
            <a href='formGenre.php?action=Modifier&num=$genre->num' class='btn btn-primary' role='button'>Editer</a>
            <a href='#confirmSuppr' data-toggle='modal' data-suppr='valideGenre.php?action=Supprimer&num=$genre->num' class='btn btn-danger' role='button'>Supprimer</a>            
            </td>";
            echo "</tr>";
            // valideGenre.php?action=Supprimer&num=$genre->num
        }
        ?>
    </tbody>
    </table>

</div>

<div id="confirmSuppr" class="modal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Attention</h5>
      </div>
      <div class="modal-body">
        <p>souhaitez-vous vraiment supprimer cette donnée ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
        <a href="" class="btn btn-primary" id="confirm">Confirmer</a>
      </div>
    </div>
  </div>
</div>

<?php include "../include/footer.php"; ?>
