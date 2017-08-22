<?php



if(array_key_exists('KlK',$_POST)){

    $_SESSION['panier']=array(
        'KlK'=> array(
            'qty' => $_POST['KlK'],
            'prx' => 15,
            'name'=>'Figurine de Ryuko',
        ),
        'gundam'=>array(
            'qty' => $_POST['gundam'],
            'prx' => 20,
            'name'=>'Figurine d\'un Gundam',
        ),
        'naruto'=>array(
            'qty' => $_POST['naruto'],
            'prx' => 2,
            'name'=>'Minis figurines de Naruto',
        ),
        'postOnepiece'=>array(
            'qty' => $_POST['postOnepiece'],
            'prx' => 20,
            'name'=>'Poster One Piece',
        ),
        'postGurren'=>array(
            'qty' => $_POST['postGurren'],
            'prx' => 25,
            'name'=>'Poster Gurren Laggan',
            ),
        'postReborn'=>array(
            'qty' => $_POST['postReborn'],
            'prx' => 19,
            'name'=>'Poster Reborn',
    ),);

    if($_SESSION['login']==false){
        header('Location:login.php');
    }else{header('Location:panier.php');}

}




