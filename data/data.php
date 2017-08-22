<?php
/**
 *
 */


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
        
    ''=>array(
    'description'=>'d\'acceuil de notre site',
        'path'=>'',
    ),
        
        'logout'=>array(
    'description'=>'Dectonnection de notre site',
        'path'=>'logout.php',
    ),
        
);


$users = array(
    'un' => array(
        'mdp'=>md5('abc'),
        'panier' => array(),
    ),
    'deux' => array(
        'mdp'=>md5('def'),
        'panier' => array(),
    ),
    'trois'=>array(
        'mdp'=>md5('ghi'),
        'panier' => array(),
    ),
);


