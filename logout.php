<?php

session_start();
if(!array_key_exists('login',$_SESSION)){$_SESSION['login']=false;};

echo '<html><body>';
require_once 'views/page_top.php';

require_once '_authenticate.php';

?>
<form class="logForm" method="post">

    <label for="sure" />Etes vous sure de vouloir vous deconnecter?</label>
<input type="checkbox" name="sure"/>

<input type ="submit" value ="Logout" />
</form>



<?php      
require_once 'views/page_bottom.php';
echo '</body></html>';
?>

