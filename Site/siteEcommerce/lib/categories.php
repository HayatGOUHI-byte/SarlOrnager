<?php

class Category{
    public $id;
    public $image_categorie;
    public $name;
}

/*
*
*@return category[]
*/
function get_all_categorie()
{
    $query=pdo()->query('SELECT *  FROM categories');
     return $query->fetchall(PDO::FETCH_CLASS, Category::class);
}






?>