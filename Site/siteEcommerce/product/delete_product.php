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
<?php
require_once('../Functions/bootstrap.php');
import('products');
$query=pdo()->prepare('DELETE FROM products WHERE id=?');
$query->execute([$_GET['id']]);
echo '<script type="text/javascript"> alert("le produit a été supprimé correctement"); </script>';
?>
<br><br><br><br>
   <form method="post" action="index_product.php">
   <button class="btn btn-primary">produit</button>
 </form>
 </div>
</body>
</html>