<?php

session_start();

const PANIER = 'panier';
const MDP = 'password';

$user = $_SESSION['user'];

function signin($username,$password){
    global $user;
    $user[$username][MDP] = md5($password);
    $_SESSION['user'] = $user;
};

function authenticate($username, $password)
{
    global $user;
    if($result = array_key_exists($username, $user) && (md5($password) === $user[$username][MDP])){
        return $user[$username];
    }else return false;
//    var_dump(md5($password),$result);

}
