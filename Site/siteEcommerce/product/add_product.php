<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="static/css/style.css" >
    <title>SarlL'oranger</title>
    </head>
    <body class="h6 ">
      <?php
     require_once('../Functions/bootstrap.php');
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
<body>
<?php 
require_once('../Functions/bootstrap.php');
import("categories");
$categories = get_all_categorie();
if (is_post2()){
    $var1 = rand( 1111 , 9999 );  // générer un nombre aléatoire dans la variable $var1 
    $var2 = rand( 1111 , 9999 );  // générer un nombre aléatoire dans la variable $var2
    $var3 = $var1 . $var2 ;  // concaténer $var1 et $var2 dans $var3 
    $var3 = md5( $var3 );   // convertit $var3 à l'aide de la fonction md5 et génère un nombre hexadécimal de 32 caractères
    $fnm = $_FILES[ "image" ][ "name" ] ;    // récupère le nom de l'image dans la variable 
    $dst = "./images/" . $var3 . $fnm ;  // stockage du chemin de l'image dans le dossier {all_images} avec un nombre hexadécimal de 32 caractères et le nom de fichier 
    $dst_db = "images/" . $var3 . $fnm ; // stockage du chemin de l'image dans la base de données avec un nombre hexadécimal de 32 caractères et un nom de fichier
    move_uploaded_file($_FILES[ "image" ][ "tmp_name" ],$dst_db);  // déplace l'image dans le dossier {all_images} avec un numéro hexadécimal de 32 caractères et le nom de l'image
  $query = pdo()->prepare('INSERT INTO products (name, id2, description, prix, image) VALUES (?, ?, ?, ?, ?)');
  $query->execute([$_POST['name'], $_POST['id2'], $_POST['description'], $_POST['prix'],$dst_db ]);
//   redirect('index_product.php');
  echo '<script type="text/javascript"> alert("le produit a été insée correctement"); </script>';  
    ?> 
<?php
}     
 ?>
<center>
    <br><br>
<p class="font-effect-fire">Ajouter un produit!</p>
<br>
<form method="post" enctype="multipart/form-data">
 <p class="mb-4 font-semibold ">
     <label for="name" class="block text-sm px-3 mb-1 w-full font-effect-fire">name</label>
     <br>
     <input type="text" name="name" id="name" class="border border-gray-300 px-1 py-1 focus:border-black" value="<?= $previous_inputs['name'] ?? '' ?> " required >
 </p>
 <?php if(isset(   $_SESSION['previous_errors']['name'])) :?>
    <p class="border ">
<?=  $_SESSION['previous_errors']['name']  ?>
</p>
<?php  endif ?>
 <p class="mb-4 font-semibold ">
     <label for="description" class="block text-sm px-3 mb-1 w-full font-effect-fire"   >Description  </p>
     <input type="text" name="description" class="border border-gray-300 px-1 py-1 focus:border-black" required>
 </p>
 <p class="mb-4 font-semibold ">
     <label for="prix" class="block text-sm px-3 mb-1 w-full font-effect-fire"   >prix  </p>
     <input type="text" name="prix" class="border border-gray-300 px-1 py-1 focus:border-black" required>
 </p>
 <?php if(isset(   $_SESSION['previous_errors']['description'])) :?>
    <p class="border ">
<?=  $_SESSION['previous_errors']['description']  ?>
</p>
<?php  endif ?>
  <div class="font-semibold font-effect-fire">choisir la catégorie: </div> <br> <select name="id2" id="id2">
         <?php   foreach($categories as $category) :?>
         <option value="<?= $category->id ?>"> <?= $category->name ?></option>
         <?php endforeach ?>
     </select>
 </div>
 <br><br>
 <input type="file" name="image" Required>
 <br><br>
 <p class="mt-6">
     <button  class="font-semibold  border-2  bg-gray-200 btn btn-primary" value="Upload" >Ajouter</button>
 </p>
 </form>
 <form action="index_product.php" method="post">
    <button class="btn btn-primary">produit</button>
    </form>
</center> 
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
</body>
</html>