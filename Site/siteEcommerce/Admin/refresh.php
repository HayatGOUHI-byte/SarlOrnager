

<!DOCTYPE html>
<html>
<head>
    <title>ici sql pour la base  de donnéees </title>
</head>
<body>

<?php 

require_once('../Functions/bootstrap.php');

$pdo=pdo();

$pdo -> exec('CREATE TABLE products (
     id SERIAL,
     name TEXT ,
     description TEXT
     )');

echo 'la table a ete cree';
?>

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<h1>tout marche bon dans cette page</h1>
</body>
</html>
