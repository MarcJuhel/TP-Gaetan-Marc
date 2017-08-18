<?php

const PANIER = 'panier';
const MDP = 'password';

$user = array();

function signin($username,$password){
    global $user;
    $user[$username][MDP] = md5($password);
};

function authenticate($username, $password)
{
    global $user;
    if($result = array_key_exists($username, $user) && (md5($password) === $user[$username][MDP])){
        return $user[$username];
    }else return false;
//    var_dump(md5($password),$result);

}
