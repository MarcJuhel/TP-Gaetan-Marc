<?php
session_start();
if(!array_key_exists('login',$_SESSION)){$_SESSION['login']=false;};
$image = "http://138.68.233.236/wp-content/uploads/2015/07/amazon-2015-v2.png";
require_once 'common/utils.php';
creatHeader('Nozama','Site de vente de goodies et bandes dessiné nippon', 'style/main.css','js/main.js');
echo '<html><body>';
require_once 'views/page_top.php';



echo '<h3>Prochains evenements</h3><a href=""><img src= "'.$cinema.'" alt="" />
<a href=""><img src= "'.$jeuxsociete.'" alt="" /><a href=""><img src= "'.$ateliers.'" alt="" />
<a href=""><img src= "'.$cours1.'" alt="" /><h3>Carte de membre</h3>
<a href=""><img src= "'.$cartemembre.'" alt="" />
<p>-10% sur l\'achat de tous vos mangas!</p>
<span>+</span><p>journée de lecture offerte par mois</p>
<h3>Cadeau à faire : visez juste</h3>
<a href=""><img src= "'.$cartecadeau.'" alt="" />';





require_once 'views/page_bottom.php';
echo '</body></html>';
