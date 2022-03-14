<!DOCTYPE html>
<html>
  
    <head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../static/css/style.css" >
    <title>SarlL'oranger</title>
    </head>
    <?php 
    require_once('../Functions/bootstrap.php');
    if(is_post2()){
      ?>
      <body class="h6 ">
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
      <!-- <form method="post" action = "../Connexion/logout.php">      
      <button class="border border-2 mt-2   btn btn-success">Déconnexion</button>
      </form>
         -->
         <br><br><br>
         <center>
         <p>SARL L'ORANGER, société à responsabilité limitée est en 
        activité depuis 22 ans. Implantée à LA SENTINELLE (59174), elle est 
        spécialisée dans le secteur d'activité du commerce d'alimentation générale. 
        Son effectif est compris entre 1 et 2 salariés. Sur l'année 2013 elle réalise un 
        chiffre d'affaires de 167 600,00 €. Societe.com recense 1 établissement et le dernier 
        événement notable de cette entreprise date du 13-02-2020. Lahcen GOUHI, est gérant de 
        l'entreprise SARL L'ORANGER.</p>
        <form method="post" action="../product/index_product.php">
        <button class="btn btn-primary">Produits</button>
      </form>
         </center>
         <br><br><br><br><br><br>
         <br><br><br><br><br><br>
         <br><br><br><br><br><br>
         <br><br><br><br><br><br>
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
      <?php
    }
   
?>


    
</html>