<?php

session_start();    /** je me suis connectée */


if(is_post2()){
    /** si on fait requetes à part celle de l'affichage on suppose qu'on n'a pas d'error */
    $previous_errors = [];
    $previous_inputs = [];
} else {
    /** si on est dans une méthode get = l affichage */
    $previous_errors = $_SESSION['previous_errors'] ?? [];
    $previous_inputs = $_SESSION['previous_inputs'] ?? [];
    $_SESSION['previous_errors'] = []; /* réinitialiser le tableau*/
    $_SESSION['previous_inputs'] = [];
}

function partial($name, $params=[]){
    extract($params);/* je comprends pas la foctionnalité d'extract*/ 
    require(__DIR__."/html_partials/{$name}.html.php");
}


function is_post2(){
    return $_SERVER['REQUEST_METHOD'] === 'POST';
}

function redirect($url){
     header("Location :$url");
}



function pdo(){
    $pdo = new PDO("mysql:host=localhost;dbname=magasin", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $pdo;
}


function abort_404(){
    http_response_code(404);
    die();
    }
    

function redirect_unless_admin(){
    if(!($_SESSION['admin']   ?? null))
        redirect('login.php');
     }
  
function is_on_page($page){
    $_SERVER['SCRIPT_NAME'] === $page;
}



function import($lib){
    require_once(__DIR__."/../lib/{$lib}.php");
}



function save_inputs(){
    foreach($_POST as $key=>$value ){
       if(in_array($key, ['password']))
       continue;
    }
    $_SESSION['previous_inputs'][$key] = $value;
}

function redirect_self(){
    redirect($_SERVER['REQUEST_URI']);
}





function flash_success($message)
{
    flash('success', $message);
}

function flash($type, $message)
{
    $SESSION['flash'] = compact('type', 'message');
}
?>