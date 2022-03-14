<?php
require_once('../Functions/bootstrap.php');
    ?>
    <form method="post" >
    <p class=" font-semibold ">
    <label for="name"  value="<?= $previous_inputs['name'] ?? '' ?>">name</label>
    <input type="text" name="name" id="name" class="border border-gray-300 px-1 py-1 focus:border-black" value="<?= $previous_inputs['name'] ?? '' ?>" required>
    </p>
    <p class=" font-semibold ">
    <label for="password"    >password  </p>
    <input type="password" name="password" class="border border-gray-300 px-1 py-1 focus:border-black" required>
    </p>
    <p class="mt-6">
    <button  class="font-semibold w-full border-2 py-1 bg-gray-200 btn btn-primary" >Connexion</button>
    <button class="btn btn-primary">créer nouveau admin</button>
    </p>
    <br><br>
    </form>
    <?php
if(is_post2()){

    $pdo=pdo();
    $query=$pdo->prepare('INSERT INTO admins (name, password) VALUES(?, ?)');
    $query->execute([ $_POST['name'], password_hash( $_POST['password'], PASSWORD_DEFAULT)]);



    echo "cet object a ete cree et voilà \n ce qu'il continet comme son type et ses valeurs\n";
    redirect('Connexion/login.php');
}

?>
    





