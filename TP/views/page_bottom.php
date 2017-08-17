<?php
/**
 *
 */

$date = date(j, time()).date(F,time()).date(y ,time());

?>

<footer>


    <?php


    require_once 'menu.php';

    echo '<span id="tispan" class="footer span date">Site mise a jour le'.$date.'</span>';

    echo '<span id="coor1" class="footer span">Nos coordonnées : </span> <span id="coor2" class="footer span">12345 rue de la chaudière <br>H2D 4P5<br>Montréal</span>';


    echo '<div id="rezosocio">';
    echo '<a class="rezo footer" href="www.facebook.com"><img class="rezo footer" src="../image/facebook_r.jpg"></a>';
    echo '<a class="rezo footer" href="www.twitter.com"><img class="rezo footer" src="../image/twitter_r.png"></a>';
    echo '<a class="rezo footer" href="www.instagram.com"><img class="rezo footer" src="../image/mail_r.png"></a>';
    echo '</div>';

    ?>

</footer>