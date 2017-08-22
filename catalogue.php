<?php
session_start();
if(!array_key_exists('login',$_SESSION)){$_SESSION['login']=false;};
$image = "http://138.68.233.236/wp-content/uploads/2015/07/amazon-2015-v2.png";


require_once 'views/page_top.php';
?>

<form method="post">
<div id="figur">
<h2>Figurines</h2>
    <div class="goodies">
        <h3>kill la kill</h3>
    <img src="image/figurine-kill-la-kill-leger.jpg" />
    <input type="number" name="KlK" />    
    </div>
    
     <div class="goodies">
         <h3>Gundam</h3>
    <img src="image/figurine-gundam-leger.jpg" />
    <input type="number" name="gundam" />    
    </div>
    
     <div class="goodies">
         <h3>Naruto</h3>
    <img src="image/figurine-naruto-leger.jpg" />
    <input type="number" name="naruto" />    
    </div>
    
</div>
    
    <div id="poster">
    <h2>Posters</h2>
        <div class="goodies">
        <h3>One Piece</h3>
    <img src="image/poster-one-piece-leger.jpg" />
    <input type="number" name="postOnepiece" />    
    </div>
    
        <div class="goodies">
        <h3>Gurren Laggan</h3>
    <img src="image/poster-gurren-laggan-leger.jpg" />
    <input type="number" name="postGurren" />    
    </div>

        
        <div class="goodies">
        <h3>reborn</h3>
    <img src="image/poster-reborn-leger.jpg" />
    <input type="number" name="postReborn" />    
    </div>

    
    </div>
    
    <input type="submit" />
</form>





<?php
require_once 'views/page_bottom.php';
echo '</body></html>';
