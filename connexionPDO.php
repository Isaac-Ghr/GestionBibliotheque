<?php
$hostnom = 'host=btssio.dedyn.io'; // nom ou IP du serveur
$usernom = 'GHORZII'; // nom de l'utilisateur
$password = '30/08/2004'; // mot de passe de l'utilisateur
$bdd = 'GHORZII_Gutenberg'; // nom de la base de donnée

try
{
  // permet de se connecter à la base de données
  // constructeur
  $monPdo = new PDO("mysql:$hostnom;dbname=$bdd;charset=utf8", $usernom, $password);
  // permet d'activer la gestion des erreurs en les affichant à l'écran
  $monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
  // ^ affichage des erreurs
}
catch (PDOException $e)
{
  echo $e->getMessage();
  $monPdo = null; // ferme la connexion à la base de données / détruit l'objet
}

?>