<?php
/**
 *
 */

//var_dump($_SERVER['REQUEST_URI']);

if(basename($_SERVER['REQUEST_URI'])==''){
    header('Location:index.php');
}

$pages = array(
  'acceuil' => array(
          'description'=>'page d\'acceuil de notre site',
          'path'=>'index.php',
  ),

    'catalogue' => array(
        'description'=>'notre catalogue de goodies et manga',
        'path'=>'catalogue.php',
    ),

    'login' => array(
        'description'=>'Notre formulaire d\'insciption ou de connection',
        'path'=>'login.php',
    ),

    'panier' => array(
        'description'=>'Gerrez vos achats',
        'path'=>'panier.php',
        ),
        
   
        'logout'=>array(
    'description'=>'Deconnection de notre site',
        'path'=>'logout.php',
    ),
        
    
);


$users = array(
    'un' => array(
        'mdp'=>md5('abc'),
    ),
    'deux' => array(
        'mdp'=>md5('def'),
    ),
    'trois'=>array(
        'mdp'=>md5('ghi'),
    ),
);


