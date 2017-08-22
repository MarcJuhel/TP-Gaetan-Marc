<?php
session_start();
require_once 'views/page_top.php';
require_once '_panier.php';

?>

<form method="post">
    <div id="figur">
        <h2>Figurines</h2>
        <div class="goodies">
            <h3>kill la kill</h3>
            <img src="image/figurine-kill-la-kill-leger.jpg" />
            <span>Consilio adventans repente adventans vestri quaeso commeatus barbaricos labores deverti consilio miretur quaeso adfatim miretur miretur vestri post si consilio</span>
            <span>Taille: 6 pouces</span>
            
            <span>Prix : 15$</span>
            <input type="number" value="0" name="KlK" />    
        </div>

        <div class="goodies">
            <h3>Gundam</h3>
            <img src="image/figurine-gundam-leger.jpg" />
            <span>Consilio adventans repente adventans vestri quaeso commeatus barbaricos labores deverti consilio miretur quaeso adfatim miretur miretur vestri post si consilio</span>
            <span>Taille: 9 pouces</span>
            <span>Prix : 20$</span>
            <input type="number" value="0" name="gundam" />    
        </div>

        <div class="goodies">
            <h3>Naruto</h3>
            <img src="image/figurine-naruto-leger.jpg" />
            <span>Consilio adventans repente adventans vestri quaeso commeatus barbaricos labores deverti consilio miretur quaeso adfatim miretur miretur vestri post si consilio</span>
            <span>Taille: 2 pouces</span>
            <span>Prix : 2$</span>
            <input type="number" value="0"name="naruto" />    
        </div>

    </div>

    <div id="poster">
        <h2>Posters</h2>
        <div class="goodies">
            <h3>One Piece</h3>
            <img src="image/poster-one-piece-leger.jpg" />
            <span>Consilio adventans repente adventans vestri quaeso commeatus barbaricos labores deverti consilio miretur quaeso adfatim miretur miretur vestri post si consilio</span>
            <span>Dimensions: 30x90cm</span>
            <span>Prix : 20$</span>
            <input type="number" value="0" name="postOnepiece" />    
        </div>

        <div class="goodies">
            <h3>Gurren Laggan</h3>
            <img src="image/poster-gurren-laggan-leger.jpg" />
            <span>Consilio adventans repente adventans vestri quaeso commeatus barbaricos labores deverti consilio miretur quaeso adfatim miretur miretur vestri post si consilio</span>
            <span>Dimensions: 50x90cm</span>
            <span>Prix : 25$</span>
            <input type="number" value="0" name="postGurren" />    
        </div>


        <div class="goodies">
            <h3>reborn</h3>
            <img src="image/poster-reborn-leger.jpg" />
            <span>Consilio adventans repente adventans vestri quaeso commeatus barbaricos labores deverti consilio miretur quaeso adfatim miretur miretur vestri post si consilio</span>
            <span>Dimensions: 130x90cm</span>
            <span>Prix : 19$</span>
            <input type="number" value="0" name="postReborn" />    
        </div>


    </div>

    <input type="submit" />
</form>





<?php
require_once 'views/page_bottom.php';
echo '</body></html>';
