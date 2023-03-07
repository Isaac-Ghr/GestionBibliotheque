
<?php include "../include/header.php"; 
include "../connexionPDO.php";
// nationalités
$textreq = "SELECT n.num, n.libelle, c.libelle AS 'continent' FROM nationalite n, continent c WHERE n.numContinent=c.numCont ";
if (!empty($_GET))
{
  if($_GET['libelle'] != "") { $textreq.= "AND n.libelle LIKE '%".$_GET['libelle']."%' "; }
  if($_GET['continent'] != 0) { $textreq.= "AND c.numCont = ".$_GET['continent']." "; }
}
$textreq.= "ORDER BY n.num ";
$req=$monPdo->prepare($textreq);
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$lesNationalites=$req->fetchAll();
// continents
$reqCont=$monPdo->prepare("SELECT * FROM continent");
$reqCont->setFetchMode(PDO::FETCH_OBJ);
$reqCont->execute();
$lesContinents=$reqCont->fetchAll();

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
        <div class="col-9"><h2>Liste des Nationalités</h2></div>
        <div class="col-3"><a href="formNationalite.php?action=Ajouter" class="btn btn-success btn-block">Ajouter une nationalité</a></div>
    </div>
    <hr>
    <form action="" method="get" class="mt-3 mb-3">
      <div class="row">
        <div class="col">
          <input type="text" class="form-control" id="libelle" placeholder="saisir le libellé" name="libelle" value=<?php if (!empty($_GET['libelle'])) { echo "'{$_GET['libelle']}'"; } else { echo "''"; } ?>>
        </div>
        <div class="col">
          <select name="continent" class="custom-select">
            <option value=0>Tout les continents</option>
            <?php 
            foreach ($lesContinents as $continent)
            {
              $select = $continent->numCont == $_GET['continent'] ? 'selected=' : '';  
              echo "<option value='$continent->numCont' $select>$continent->libelle</option>";
            }
            ?>
          </select>
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
        <th scope="col" class="col-4">Libellé</th>
        <th scope="col" class="col-4">Continent</th>
        <th scope="col" class="col-2">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($lesNationalites as $nationalite)
        {
            echo "<tr>";
            echo "<td class='col-2'>{$nationalite->num}</th>";
            echo "<td class='col-4'>{$nationalite->libelle}</th>";
            echo "<td class='col-4'>{$nationalite->continent}</th>";
            echo "<td class='col-2'>
            <a href='formNationalite.php?action=Modifier&num=$nationalite->num' class='btn btn-primary' role='button'>Editer</a>
            <a href='#confirmSuppr' data-toggle='modal' data-suppr='valideNationalite.php?action=Supprimer&num=$nationalite->num' class='btn btn-danger' role='button'>Supprimer</a>            
            </td>";
            echo "</tr>";
            // valideNationalite.php?action=Supprimer&num=$nationalite->num
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
