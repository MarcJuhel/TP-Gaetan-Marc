<?php


?>




<?php if (  user_is_logged()): ?>
    return true;
    <input type ="submit"  value ="Logout" />

<?php else: ?>


    <input type ="username" /><br>
    <br>
    <input type ="password" /><br>
    <br>
    <input type ="submit" value ="Login" /><br>

<?php endif ?>
