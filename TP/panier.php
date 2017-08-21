<?php
session_start();
if(!array_key_exists('login',$_SESSION)){$_SESSION['login']=false;};
$image = "http://138.68.233.236/wp-content/uploads/2015/07/amazon-2015-v2.png";
require_once 'common/utils.php';
creatHeader('Nozama votre panier','', 'style/main.css','js/main.js');
echo '<html><body>';
require_once 'views/page_top.php';








require_once 'views/page_bottom.php';
echo '</body></html>';
