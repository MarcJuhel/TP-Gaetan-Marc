<?php

require_once('data/data.php');

//var_dump(basename($_SERVER['REQUEST_URI']));

foreach($pages as $page => $is)
    if($is['path']==basename($_SERVER['REQUEST_URI'])){echo
        '<!DOCTYPE html>
    <html lang="fr">
<head><meta charset="utf-8">
<title>Nozama : '.$page.'</title><meta name="author" content="Marc Camil Gaetan" >
    <meta name="description" content="'.$is['description'].'">
    <link rel="stylesheet" type="text/css" href="style/main.css" media="screen" />
    <script src="js/main.js"></script>

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

</head>
<body>
<img src="image/background.jpg" id="background">
<main>


<div id="ban">
    <a href="index.php"><img src="image/banniere.jpg"></a>
</div>        
<a href="index.php"><img src= "image/logo.png" alt="" /></a>';                                           
                                                       require_once 'menu.php';
                                                      };

