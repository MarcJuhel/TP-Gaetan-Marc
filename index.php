<?php
session_start();
if(!array_key_exists('login',$_SESSION)){$_SESSION['login']=false;};
$image = "http://138.68.233.236/wp-content/uploads/2015/07/amazon-2015-v2.png";

require_once 'views/page_top.php';

echo '<h3>Prochains evenements</h3><a href=""><img src= "image/cinema.jpg" alt="" />
<a href=""><img src= "image/jeuxsociete.jpg" alt="" /></a>
<a href=""><img src= "image/ateliers.jpg" alt="" /></a>
<a href=""><img src= "image/cours-japonais.jpg" alt="" /></a>

<div id="grosseDiv">
<div id="carteMembre">

<h3>Carte de membre</h3>
<a href=""><img src= "image/carte-avantages.png" alt="" /></a>
<p>-10% sur l\'achat de tous vos mangas!</p>
<span>+</span><p>journée de lecture offerte par mois</p>
</div>

<h3>Cadeau à faire : visez juste</h3>
<a href=""><img src= "image/certificat-cadeau.jpg" alt="" /></a></div>';





require_once 'views/page_bottom.php';
echo '</body></html>';
