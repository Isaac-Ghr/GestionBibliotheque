<?php
try
{
    include('../connexionPDO.php');
    // on prépare la requête mais on ne l'exécue pas tt de suite pour sécu
    $req = $monPdo->prepare("DELETE FROM genre WHERE libelle = 'Espionnage'");
    
    // on exec la req et récupérons le résultat (nbr de lignes affectées)
    $nbr = $req->execute();

    echo "nombre d'insertions : ".$nbr."<br />";
    //affichage de l'ID créé automatiquement (auto-incrément)
    $id = $monPdo->lastInsertId();
    echo "le numéro attribué est : ".$id;
    // fermer la connexion
    $monPdo = null;
}
catch ( PDOException $e )
{
    echo $e->getMessage();
    $monPdo=null;
}

?>