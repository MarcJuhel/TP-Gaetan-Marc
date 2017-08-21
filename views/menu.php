<?php
/**
 *
 */


echo '<nav><ul>
<li><a href="index.php">ACCEUIL</a></li>
<li><a href="catalogue.php">BOUTIQUE</a></li>
<li><a href="panier.php">PANIER</a></li>
<li>';
if($_SESSION['login'] == true){
echo '<a href="login.php">LOGOUT</a>';
}else{echo '<a href="login.php">LOGIN</a>';}
echo '</li></nav> </ul>';

