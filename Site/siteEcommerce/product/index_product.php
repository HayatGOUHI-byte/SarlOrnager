<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="static/css/style.css" >
    <title>SarlL'oranger</title>
    </head>
    <body class="h6 ">
      <div class="container">
      <?php
require_once('../Functions/bootstrap.php');
if(is_post2()){
?>
<!-- ici la séléction des catégories -->
        <div class="justify-content-center">
        <nav class="navbar  navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
        <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">
        <img src="../static/images/logo.png" alt="" width="60" height="60" class="d-inline-block align-text-top">
    </a>
  </div>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="index.phpnavbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="../Connexion/login.php">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../Connexion/logout.php" >Déconnexion</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</div>
<center>
<h3 class="font-effect-fire">les produits qui existent pour l'instant pour tous les catégories!</h3>
</center>
    <?php
    define('START_MICROTIME', microtime(true) );

//récupérer des produits depuis la base de données
require_once('../Functions/bootstrap.php');

// register_shutdown_function(function(){
//     var_dump(microtime(true) - START_MICROTIME);
// });
import('products');
import('categories');
$query = pdo()->query('SELECT * FROM categories');
$categories = $query->fetchall(PDO::FETCH_CLASS, "Category");
$query2 = pdo()->query('SELECT * FROM products');
$products=$query2->fetchall(PDO::FETCH_CLASS, "Product");
foreach ($products as $product):?>

<!-- bootstrap -->
 <div class="inline">
<div class="card" style="width: 18rem;">
  <img class="card-img-top" src="<?= $product->image ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title"><?= $product->name ?></h5>
    <h5 class="card-title " style="color:blue"><?= $product->prix ?>€</h5>
    <p class="card-text"><?= $product->description ?></p>
  </div>
  <div class="card-body">
    <a href="delete_product.php?id=<?= $product->id ?>" class="card-link">supprimer</a>
    <a href="edit_product.php?id=<?= $product->id ?>" class="card-link">modifier</a>
  </div>
</div>
</div>
<!-- bootstrap -->
<?php
?>
<!-- <p><a href="edit_product.php?id=<?= $product->id ?>">modifier</a></p>
<form method="POST" action="delete_product.php?id=<?= $product->id ?>">
<button>supprimer</button></form> -->
<?php
endforeach
?>
<br>
<center>
  <a href="add_product.php">ajouter un produit</a></center>
<br><br>
<nav class="navbar navbar-expand-lg navbar-light bg-gray font-semibold text-white bg-dark ">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <pre>
    SARL L'ORANGER, société à responsabilité limitée est en activité depuis 22 ans. Implantée à LA SENTINELLE (59174), 
  elle est spécialisée dans le secteur d'activité du commerce d'alimentation générale. Son effectif est compris entre 1 et 2 salariés. 
  Sur l'année 2013 elle réalise un chiffre d'affaires de 167 600,00 €. Societe.com recense 1 établissement et le dernier événement notable de cette entreprise date du 13-02-2020. 
  Lahcen GOUHI, est gérant de l'entreprise SARL L'ORANGER.
    </pre>
  </div>
</nav>
<?php
}else{
  ?>
  <h1><center>Cette page n'est pas accessible!</center></h1>
  <?php
}
?>
      </div>


</body>
</html>

