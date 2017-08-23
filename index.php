<?php


session_start();

if(!array_key_exists('login',$_SESSION)){$_SESSION['login']=false;};

require_once 'views/page_top.php';

echo '
<div id="event">
<h3>Prochains evenements</h3><a href=""><img src= "image/cinema.jpg" alt="" />
<a href="http://www.otakulounge.com/Evenements/"><img src= "image/jeuxsociete.jpg" alt="" /></a>
<a href="http://www.otakulounge.com/Evenements/"><img src= "image/ateliers.jpg" alt="" /></a>
<a href="http://www.otakulounge.com/Evenements/"><img src= "image/cours-japonais.jpg" alt="" /></a>
</div>

<div id="grosseDiv">
<div id="carteMembre">

<h3>Carte de membre</h3>
<a href=""><img src= "image/carte-avantages.png" alt="" /></a>
<p>-10% sur l\'achat de tous vos mangas!</p>
<span>+</span><p>journée de lecture offerte par mois</p>
</div>

<div id="titeDiv">
<h3>Cadeau à faire : visez juste</h3>
<a href=""><img src= "image/certificat-cadeau.jpg" alt="" /></a></div></div>';


require_once 'views/page_bottom.php';
echo '</body></html>';
