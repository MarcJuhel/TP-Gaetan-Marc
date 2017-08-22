<?php

require_once('data/data.php');

function signin($username,$password)
{
    $users[$username]['mdp'] = md5($password);
    $_SESSION['user'] = $users;
    $_SESSION['login']= true;
};

function authenticate($username, $password, $users)
{
    if(array_key_exists($username, $users) && (md5($password) == $users[$username]['mdp'])){
        $_SESSION['login']=true;
        $_SESSION['user'] = $users;
        return true;
    }else return false;
//    var_dump(md5($password),$result);
}

function logout(){
    $_SESSION['login']=false;
    $_SESSION['user']='';
};

if(array_key_exists('user',$_POST)&&array_key_exists('mdp',$_POST)){
    
    if(authenticate($_POST['user'], $_POST['mdp'], $users)){
        header('Location:panier.php');
    }
    
    
    
}


if(array_key_exists('sure',$_POST)){
    if($_POST['sure']=='on'){
        
        logout();
        header('Location:index.php')
    }
}