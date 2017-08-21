<?php
session_start();
if(!array_key_exists('login',$_SESSION)){$_SESSION['login']=false;};
$image = "http://138.68.233.236/wp-content/uploads/2015/07/amazon-2015-v2.png";

echo '<html><body>';
require_once 'views/page_top.php';

echo
    '<label for="user">Username</label><input type ="username" name="user"/>

    <label for="mdp"/>Mot de passe</label><input type ="password" name="mdp"/> 
    
    <input type ="submit" value ="Login" />';
        
        
        

require_once 'views/page_bottom.php';
echo '</body></html>';


