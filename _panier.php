<?php


$_SESSION['panier']=array(
    'KlK'=> array(
        'prx' => 15,
        'name'=>'Figurine de Ryuko',
        'cat'=>'figurine',
        'path'=>'image/figurine-kill-la-kill-leger.jpg',
        'taille'=>'6pouces',
    ),
    'gundam'=>array(
        'prx' => 20,
        'name'=>'Figurine d\'un Gundam',
        'cat'=>'figurine',
        'path'=>'image/figurine-gundam-leger.jpg',
        'taille'=>'9pouces',
    ),
    'naruto'=>array(
        'prx' => 2,
        'name'=>'Minis figurines de Naruto',
        'cat'=>'figurine',
        'path'=>'image/figurine-naruto-leger.jpg',
        'taille'=>'2pouces',
    ),
    'postOnepiece'=>array(
        'prx' => 20,
        'name'=>'Poster One Piece',
        'cat'=>'poster',
        'path'=>'image/poster-one-piece-leger.jpg',
        'taille'=>'30x90cm'
    ),
    'postGurren'=>array(
        'prx' => 25,
        'name'=>'Poster Gurren Laggan',
        'cat'=>'poster',
        'path'=>'image/poster-gurren-laggan-leger.jpg',
        'taille'=>'50x90cm',
    ),
    'postReborn'=>array(
        'prx' => 19,
        'name'=>'Poster Reborn',
        'cat'=>'poster',
        'path'=>'image/poster-reborn-leger.jpg',
        'taille'=>'130x90cm',
    ),
    'deathNote'=>array(
        'prx' => 35,
        'name'=>'Death Note',
        'cat'=>'Goodies',
        'path'=>'image/Cahier-Death-Note-leger.jpg',
        'poid'=>'800g',
    ),

    'kunai'=>array(
        'prx' => 5,
        'name'=>'Petits Kunai',
        'cat'=>'Goodies',
        'path'=>'image/kunai-leger.jpg',
        'poid'=>'30g',
    ),

    'kimono'=>array(
        'prx' => 145,
        'name'=>'Kimono',
        'cat'=>'Goodies',
        'path'=>'image/Kimono-leger.jpg',
        'poid'=>'2100g',
    ),

    );


if(array_key_exists('KlK',$_POST)){

    $_SESSION['panier']=array(
        'KlK'=> array(
            'qty' => $_POST['KlK'],
        ),
        'gundam'=>array(
            'qty' => $_POST['gundam'],
        ),
        'naruto'=>array(
            'qty' => $_POST['naruto'],
        ),
        'postOnepiece'=>array(
            'qty' => $_POST['postOnepiece'],
        ),
        'postGurren'=>array(
            'qty' => $_POST['postGurren'],
            ),
        'postReborn'=>array(
            'qty' => $_POST['postReborn'],
        ),
        'deathNote'=>array(
                'qty' => $_POST['deathNote'],
    ),
        'kunai'=>array(
                    'qty' => $_POST['kunai'],
    ),
        'kimono'=>array(
                    'qty' => $_POST['kimono'],
    ),
);

    if($_SESSION['login']==false){
        header('Location:login.php');
    }else{header('Location:panier.php');}

}




