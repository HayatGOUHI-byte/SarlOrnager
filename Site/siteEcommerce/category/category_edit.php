<?php
require_once('../Functions/bootstrap.php');
import('categories');
if (is_post2()){

    
    // inserer l image dans la base de données 
    $var1 = rand( 1111 , 9999 );  // générer un nombre aléatoire dans la variable $var1 
    $var2 = rand( 1111 , 9999 );  // générer un nombre aléatoire dans la variable $var2
	
    $var3 = $var1 . $var2 ;  // concaténer $var1 et $var2 dans $var3 
    $var3 = md5( $var3 );   // convertit $var3 à l'aide de la fonction md5 et génère un nombre hexadécimal de 32 caractères

    $fnm = $_FILES[ "image_categorie" ][ "name" ] ;    // récupère le nom de l'image dans la variable 
    $dst = "./images/" . $var3 . $fnm ;  // stockage du chemin de l'image dans le dossier {all_images} avec un nombre hexadécimal de 32 caractères et le nom de fichier 
    $dst_db = "images/" . $var3 . $fnm ; // stockage du chemin de l'image dans la base de données avec un nombre hexadécimal de 32 caractères et un nom de fichier

    move_uploaded_file($_FILES[ "image_categorie" ][ "tmp_name" ],$dst_db);  // déplace l'image dans le dossier {all_images} avec un numéro hexadécimal de 32 caractères et le nom de l'image

    echo 'jusq ici tout est obvn';

 

    $query  = pdo()->prepare('UPDATE categories SET name=?, image_categorie=? WHERE id = ?');
    $query->execute([$_POST['name'], $dst_db, $_GET['id_categorie']]);
    echo 'les modifications on tete faits';   
}



?>


   

<form method="post"  enctype="multipart/form-data">

<p class="mb-4 font-semibold ">
    <label for="name" class="block text-sm px-3 mb-1 w-full">name</label>
    <input type="text" name="name" id="name" class="border border-gray-300 px-1 py-1 focus:border-black"  required >
</p>

<p class="mb-4 font-semibold ">
    <label for="image_categorie" class="block text-sm px-3 mb-1 w-full"   >image de la catégorie </p>
    <input type="file" name="image_categorie" Required>
</p>


    <button  class="font-semibold w-full border-2 py-1 bg-gray-200"  value="Upload" >Modifier</button>
</p>

</form> 

