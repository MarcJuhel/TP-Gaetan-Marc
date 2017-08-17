<?php

require_once('_authenticate.php');
const P_SESS_USERNAME = 'P_SESS_USERNAME';
session_start();


function user_is_logged(){
    return (array_key_exists(P_SESS_USERNAME, $_SESSION)
        && ! empty($_SESSION[P_SESS_USERNAME]));
}

authenticate('','')

?>

<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Accueil</title>
</head>
<body>
<header>
<h1>Vous êtes sur la page d'accueil</h1>
    <?php require_once '_authenticate.php'?>
</header>

<?php if (user_is_logged()): ?>
    return true;
    <input type ="submit"  value ="Logout" />

<?php else: ?>


    <input type ="username" />

    <input type ="password" />
    <br>
    </br>
    <input type ="submit" value ="Login" /><br>

<?php endif ?>


</body>
</html>