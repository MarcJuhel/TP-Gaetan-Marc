<?php
$image = "image/logo.png";
$facebook ="image/facebook_r.png";
$twitter = "image/twitter_r.png";
$courriel = "image/mail_r.png";
$librairie ="image/bouton-la librairie.png";
$cafe = "image/bouton-le cafe.png";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>

    </style>
  <meta charset="UTF-8">
  <title></title>
</head>
<body>
<div>
<header>
<?php

print '<a href="http://www.index.html/"><img src= "'.$image.'" alt="" />';
require_once 'menu.php';

//Debut caroussel
/*
$listImages = array('img1.jpg'=>'Titre img 1', 'img2.jpg'=>'Titre img 2', 'imgN.jpg'=>'Titre img N');

foreach($listImages as $image=>$title){

    static $i = 1;

    $caroussel = '<div id="slide'.$i.'" class="slide">';

    $caroussel .= '<div class="visu">';
    $caroussel .= '<img src="image/logo.png'.$image.'" alt="'.$title.'">';
    $caroussel .= '</div>';
    
    
        $caroussel .= '<div class=\" title\">'.$title.'</div>';
 
    $caroussel .= '</div>';
 
    echo $caroussel;
     
    $i++;
}
*/
print '<a href="https://www.facebook.com/Otakumangalounge/"><img src= "'.$facebook.'" alt="" />';
print '<a href="https://twitter.com/OTAKU_Lounge"><img src= "'.$twitter.'" alt="" />';
print '<a href="http://www.otakulounge.com/Salon/contact/"><img src= "'.$courriel.'" alt="" />';

print '<a href="http://www.otakulounge.com/Salon/librairie-o-taku-manga-lounge"><img src= "'.$librairie.'" alt="" />';
print '<a href="http://www.otakulounge.com/Salon/salon-de-lecture"><img src= "'.$cafe.'" alt="" />';
print '<a href="http://www.otakulounge.com/Salon/le-cafe"><img src= "'.$courriel.'" alt="" />';
?>
</header>
</div>
</body>
</html>