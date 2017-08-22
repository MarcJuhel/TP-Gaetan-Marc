<?php

session_start();
if(!array_key_exists('login',$_SESSION)){$_SESSION['login']=false;};
$image = "http://138.68.233.236/wp-content/uploads/2015/07/amazon-2015-v2.png";

require_once 'views/page_top.php';



echo '<p>VOTRE COMMANDE : </p>';




require_once 'views/page_bottom.php';

