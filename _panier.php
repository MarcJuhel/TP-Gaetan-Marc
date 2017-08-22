<?php



if(array_key_exists('KlK',$_POST)){

    $_SESSION['panier']=array(
        'KlK'=>$_POST['KlK'],
        'gundam'=>$_POST['gundam'],
        'naruto'=>$_POST['naruto'],
        'postOnepiece'=>$_POST['postOnepiece'],
        'postGurren'=>$_POST['postGurren'],
        'postReborn'=>$_POST['postReborn'],
    );

    if($_SESSION['login']==false){
        header('Location:login.php');
    }else{header('Location:panier.php');}
    
}




