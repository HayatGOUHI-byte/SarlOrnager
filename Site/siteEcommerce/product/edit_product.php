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
<?php
import('products');
import('categories');
$categories = get_all_categorie();
?>
<?php
// // import("validation");
  if (($_SERVER['REQUEST_METHOD'] == "POST")){
    $var1 = rand(1111,9999);  // generate random number in $var1 variable
    $var2 = rand(1111,9999);  // generate random number in $var2 variable
    $var3 = $var1.$var2;  // concatenate $var1 and $var2 in $var3
    $var3 = md5($var3);   // convert $var3 using md5 function and generate 32 characters hex number
    $fnm = $_FILES["image"]["name"];    // get the image name in $fnm variable
    $dst = "./images/".$var3.$fnm;  // storing image path into the {all_images} folder with 32 characters hex number and file name
    $dst_db = "images/".$var3.$fnm; // storing image path into the database with 32 characters hex number and file name
    move_uploaded_file($_FILES["image"]["tmp_name"],$dst);  // move image into the {all_images} folder with 32 characters hex number and image name
   $query  = pdo()->prepare('UPDATE products SET name=?, id2=?,  description=?, prix=?, image=?  WHERE id = ?');
     $query->execute([$_POST['name'], $_POST['id2'], $_POST['description'], $_POST['prix'], $dst_db, $_GET['id']]);
echo '<script type="text/javascript"> alert("les modifications!"); </script>';  // alert message
  ?>
  <?php
 } 
?>
<center>
<h4 class="font-effect-fire">modifier le produit  : </h4> 
<br><br>
<form method="POST" enctype="multipart/form-data" >
<p>
      <label for="name">name</label>
      <br>
      <input type="text" name="name" id="name" required >
 
  <p>
      <label for="description">description</p>
      <input type="description" name="description" required>
  </p>
  <p>
      <label for="prix">prix  </p>
      <input type="text" name="prix" required>
      <br>
  </p>
  <input type="file" name="image" Required>
  <br><br>
  <label for="id2">Catégorie :</label>
      <select name="id2" id="id2">
          <?php   foreach($categories as $category) :?>
       <option value="<?= $category->id  ?>"  ><?= $category->name?></option>
          <?php endforeach ?>
      </select>
      <p class="mt-6">
        <br>
      <button  class=" w-full border-2 py-1 bg-gray-200 btn btn-primary"  value="Upload" >enregistrer modification</button>
  </p>
  </form>
  <form method="post" action="index_product.php">
      <button class="btn btn-primary">vers page produit</button>
    </form>
</center>
<?php
     ?>
   <br><br> <br><br>
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
      </div>
</body>
</html>

