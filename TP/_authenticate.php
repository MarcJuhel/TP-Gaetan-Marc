<?php

function authenticate($username, $password) {
    $users = array(
        'brice' => '456',
        'hatem' => '789',
        'tania' => '101',
    );
    return array_key_exists($username,$users)&&(md5($password) === $users[$username]);
//var_dump($users);
}
