<?php

require_once('../Functions/bootstrap.php');
import('categories');

    echo 'je suis au-dessus de la verification de la condition';
  
    $query=pdo()->prepare('DELETE FROM categories WHERE id=?');
    $query->execute([$_GET['id_categorie']]);
    echo 'la suppression est faite !';


?>