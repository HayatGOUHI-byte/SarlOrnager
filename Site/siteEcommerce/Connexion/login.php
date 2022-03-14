
<!DOCTYPE html>
<html>
  
    <head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia&effect=fire">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../static/css/style.css" >
    <title>SarlL'oranger</title>
        
    </head>
   

    <body class="h6 ">
      <div class="container">

      <div class="justify-content-center">
<nav class="navbar  navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
<div class="container-fluid">
<a class="navbar-brand" href="../index.php">
<img src="../static/images/logo.png" alt="" width="60" height="60" class="d-inline-block align-text-top">



</a>
</div>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">


<li class="nav-item">
  <a class="nav-link " href="../Admin/contact.php">Contact</a>
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
if(is_post2()){
$previous_errors=[];
$previous_inputs=[];
}else {
$previous_errors=$_SESSION['previous_errors'] ?? [];
$_SESSION['previous_errors']=[];
$previous_inputs=$_SESSION['previous_inputs'] ?? [];
$_SESSION['previous_inputs']=[];
}
?>
<center>
<?php
if (is_post2()){
$query  = pdo()->prepare('SELECT * FROM admins WHERE name = ?');
$query->execute([$_POST['name']]);
$admin = $query->fetch();

  if((password_verify( $_POST['password'], $admin['password'] )) && $admin ){
    $_SESSION['admin_connecte'];
    echo '<script type="text/javascript"> alert("Vous êtes connectés!"); </script>';
    ?>
    <form method="POST" action="../Admin/dashboard.php">
    <br><br>
    <button class="btn btn-primary">vers Dashboard</button>
    <br><br>
    </form>
    <?php
            }else{
                 $_SESSION['previous_errors']['credentials'] = 'Identifiants incorrects';
                 $_SESSION['previous_inputs']['name'] = $_POST['name'];
                 echo '<script type="text/javascript"> alert("les coordonnées ne sont pas correctes!"); </script>';
                //redirect('login.php');
             }
            }
?>
<div  class="min-w-screen min-h-screen bg-gray-200 flex justify-center items-center">
<div class="bg-white shadow-lg p-8 mt-100 ">
<h1 class="text-xl  font-semibold font-effect-fire">la connexion admin</h1>
<br>
<p>
<?php if (isset($previous_errors['credentials'])): ?>
<?= $previous_errors['credentials'] ?>
<?php endif ?>
</p>
<form method="post" >
<p class=" font-semibold ">
<label for="name"  value="<?= $previous_inputs['name'] ?? '' ?>">name</label>
<input type="text" name="name" id="name" class="border border-gray-300 px-1 py-1 focus:border-black" value="<?= $previous_inputs['name'] ?? '' ?>" required>
</p>
<p class=" font-semibold ">
<label for="password">password  </p>
<input type="password" name="password" class="border border-gray-300 px-1 py-1 focus:border-black" required>
</p>
<p class="mt-6">
<button  class="font-semibold w-full border-2 py-1 bg-gray-200 btn btn-primary" >Connexion</button>
</p>
</form>

<!--<form method="post" action="../Admin/create_admin.php">--> 
<button class="btn btn-primary">créer nouveau admin</button> 
</form>

</div>
</div>
<br><br><br><br><br><br><br><br>
<br><br><br><br><br>
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
    </center>
</html>