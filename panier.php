<?php

session_start();
require_once 'views/page_top.php';
require_once '_panier.php';

if($_SESSION['login']==false){
    
    header('Location:login.php');
}



?>

<h2>VOTRE COMMANDE : </h2>
<table>
<tr>
<td>quantité</td>    
<td>prix</td>
<td>objet</td>
</tr>


<?php
$total = 0;

if(array_key_exists('KlK', $_SESSION['panier'])){
    
    foreach($_SESSION['panier'] as $produit => $datas){
        

    echo "<tr>";    
        
        foreach($datas as $key => $value){
            echo "<th>$value</th>";
            
        }
        
        $total += ($datas['prx']*$datas['qty']);
        
        echo "</tr>";
    }
    
    
}
  
echo "</table>
<span>Votre commande couterait : {$total}\$</span>
";
    
require_once 'views/page_bottom.php';

