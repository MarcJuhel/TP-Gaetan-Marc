<?php
/**
 *
 */
$date = date('j', time()).' '.date('F',time()).' '.date('y' ,time());
?>

<footer>
    <?php

    $librairie ="image/bouton-la-librairie.png";
    $cafe = "image/bouton-le-cafe.png";
    $salon = "image/bouton-salon-lecture.png";


    echo '<span id="tispan" class="footer span date">Site mise a jour le : '.$date.'</span></br>

    <div id="coord">
    <span id="coor1" class="footer span">Nos coordonnées : </span> <span id="coor2" class="footer span">12345 rue de la chaudière <br>H2D 4P5<br>Montréal</span>
    </div>

    <div id="rezosocio">

    <a class="rezo footer" href="www.facebook.com"><img class="rezo footer" src="image/facebook_r.png"></a>
    <a class="rezo footer" href="www.twitter.com"><img class="rezo footer" src="image/twitter_r.png"></a>
    <a class="rezo footer" href="www.instagram.com"><img class="rezo footer" src="image/mail_r.png"></a>



    </div>';
    ?>
</footer>
</body>
</html>