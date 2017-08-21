<?php
$facebook ="image/facebook_r.png";
$twitter = "image/twitter_r.png";
$courriel = "image/mail_r.png";
$librairie ="image/bouton-la-librairie.png";
$cafe = "image/bouton-le-cafe.png";
$salon = "image/bouton-salon-lecture.png";
$cinema = "image/cinema.jpg";
$jeuxsociete = "image/jeuxsociete.jpg";
$ateliers = "image/ateliers.jpg";
$cours1 = "image/cours-japonais.jpg";
$cartemembre ="image/carte-avantages.png";
$cartecadeau = "image/certificat-cadeau.jpg";
?>
    <!DOCTYPE html>
    <html lang="fr">
<head><meta charset="utf-8">
<title>'.$titre.'</title><meta name="author" content="Marc Camil Gaetan" >
    <meta name="description" content="'.$description.'">
    <link rel="stylesheet" type="text/css" href="style/main.css" media="screen" />
    <script src="js/main.js"></script>

    <!--[if lt IE 9]>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->

</head>
<body>
<img src="image/background.jpg" id="background">
<main>

    
<div id="ban">
    <a href="index.php"><img src="image/banniere.jpg"></a>
</div>


<?php
echo '<a href="http://www.index.php/"><img src= "image/logo.png" alt="" /></a>';
require_once 'menu.php';

?>