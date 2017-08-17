<?php

require_once('_authenticate.php');
?>

<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>Accueil</title>
</head>
<body>
<h1>Vous êtes sur la page d'accueil</h1>

<?php function user_is_logged_in(){
    return array_key_exists('username',$_SESSION)
        &&empty($_SESSION['username']);
}
?>

<?php if (isset($_SESSION['connecte']) && $_SESSION['connecte']==1): ?>

    <input type ="submit"  value ="Logout" />

<?php else: ?>


        <input type ="username" /><br>
        <br>
        <input type ="password" /><br>
        <br>
        <input type ="submit" value ="Login" /><br>

<?php endif ?>


</body>
</html>