<?php

session_start();
if(!array_key_exists('login',$_SESSION)){$_SESSION['login']=false;};
$image = "http://138.68.233.236/wp-content/uploads/2015/07/amazon-2015-v2.png";

echo '<html><body>';
require_once 'views/page_top.php';

require_once '_authenticate.php';

?>
    <form method="post">
    
        <label for="sure" />Etes vous sure de vouloir vous deconnecter?</label>
    <input type="checkbox" name="sure"/>
    
    <input type ="submit" value ="Logout" />
    </form>
        
    
        
<?php      
require_once 'views/page_bottom.php';
echo '</body></html>';
?>

