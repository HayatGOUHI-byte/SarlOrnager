
<p>ici l'index des catégories:</p>


<?php
require_once('../Functions/bootstrap.php');

import('categories');



$pdo=pdo();

/*selecter tous ls categories de la base de données */

$query = pdo()->query('SELECT * FROM categories');
$categories = $query->fetchall(PDO::FETCH_CLASS, "Category");

?>

  <?php
foreach ($categories as $category):
?>
   <h1> <?=  $category->id; ?> </h1>
     <h1><?= $category->name;?>  </h1>
    
     <img src="<?= $category->image_categorie; ?>  "width="50" height="60" >
     <p><a href="category_edit.php?id_categorie=<?= $category->id ?>">modifier la categorie</a></p>

     <form method="post" action="supprimer_category.php?id_categorie=<?= $category->id ?>">
     <button>supprimer</button>
     </form>
    <?php

endforeach;
?>

<?php
?>
<a href="ajouter_categorie.php">ajouter la categorie</a>
<?php
?>
 <!-- forum pour inserer un nouveau categorie  -->


<?php

?>