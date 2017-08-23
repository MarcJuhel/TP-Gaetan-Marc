<?php
session_start();
require_once 'views/page_top.php';
require_once '_panier.php';


?>

<form method="post">
    <fieldset>Filtres (check to hide)</fieldset>

    <ul>
        <li><input type="checkbox" name="Figurines"><label for="Figurine">Figurines</label></li>
        <li><input type="checkbox" name="Posters"><label for="Posters">Posters</label></li>
        <li><input type="checkbox" name="Goodies"><label for="Goodies">Goodies</label></li>
    </ul>

    <input type="submit">
</form>


<form method="post">
    <fieldset>Produits</fieldset>
    <?php


    if(array_key_exists('Figurines',$_POST)){
        $_SESSION['figurine']=$_POST['Figurines'];
    }else {$_SESSION['figurine']='off';}

    if(array_key_exists('Posters',$_POST)){
        $_SESSION['poster']=$_POST['Posters'];
    }else {
        $_SESSION['poster']='off';}

    if(array_key_exists('Goodies',$_POST)){
        $_SESSION['goodies']=$_POST['Goodies'];
    }else {
        $_SESSION['goodies']='off';}


    if($_SESSION['figurine']=='off') {

        echo '<h2>Figurines</h2>';
        foreach ($_SESSION['panier'] as $prod => $details) {
            if ($details['cat'] == 'figurine') {
                echo "
        <div class='goodies'>
            <h3>{$details['name']}</h3>
            <img src='{$details['path']}' />
            <span>Consilio adventans repente adventans vestri quaeso commeatus barbaricos labores deverti consilio miretur quaeso adfatim miretur miretur vestri post si consilio</span>
            <span>Taille: {$details['taille']}</span>
            
            <span>Prix : {$details['prx']}$</span>
            <input type=\"number\" value=\"0\" name=\"{$prod}\" />    
        </div>";
            }
        };
    }


    if($_SESSION['poster']=='off') {
        echo '<h2>Poster</h2>';
        foreach ($_SESSION['panier'] as $prod => $details) {
            if ($details['cat'] == 'poster') {
                echo "
        <div class='goodies'>
            <h3>{$details['name']}</h3>
            <img src='{$details['path']}' />
            <span>Consilio adventans repente adventans vestri quaeso commeatus barbaricos labores deverti consilio miretur quaeso adfatim miretur miretur vestri post si consilio</span>
            <span>Dimentions : {$details['taille']}</span>
            
            <span>Prix : {$details['prx']}$</span>
            <input type=\"number\" value=\"0\" name=\"{$prod}\" />    
        </div>";
            }
        };
    }

    if ($_SESSION['goodies']=='off') {
        echo '<h2>Goodies</h2>';
        foreach ($_SESSION['panier'] as $prod => $details) {
            if ($details['cat'] == 'Goodies') {
                echo "
        <div class='goodies'>
            <h3>{$details['name']}</h3>
            <img src='{$details['path']}' />
            <span>Consilio adventans repente adventans vestri quaeso commeatus barbaricos labores deverti consilio miretur quaeso adfatim miretur miretur vestri post si consilio</span>
            <span>Poid : {$details['poid']}</span>
            
            <span>Prix : {$details['prx']}$</span>
            <input type=\"number\" value=\"0\" name=\"{$prod}\" />    
        </div>";
            }
        };

    }

    ?>



    <input type="submit" />
</form>





<?php
require_once 'views/page_bottom.php';
echo '</body></html>';
