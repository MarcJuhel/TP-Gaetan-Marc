<?php
// Connection
$mysqli = new mysqli("localhost", "root", "", "test");
if ($mysqli->connect_errno) {
    echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}

// Commande MySQL (un select)
$queryString = "SELECT * FROM ma_table";
// Execution de la commande (Un select)
$res = $mysqli->query($queryString);
$valeurs = false;
// Récupération des données
$resultat = array();
if ($res && ($res->num_rows > 0)) {
    while ($valeurs = $res->fetch_assoc()) {
        $resultat[] = $valeurs;
    };
};
//var_dump($resultat);

//var_dump($valeurs);
// Ajouter un enregistrement
/*$queryString = "INSERT INTO ma_table (nom,age) VALUES ('from php', 44)";
$res = $mysqli->query($queryString);
// Est-ce que la requète a bien marché ?
$resultat_insertion = false;
if ($res) {
    $resultat_insertion = $mysqli->insert_id;
};
var_dump($resultat_insertion);*/
?>

<! DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Page privée du site</title>
</head>
<body>
<ul>
    <?php foreach ($resultat as $enregistrement) { ?>
        <li><?php echo utf8_encode($enregistrement['name']),',', $enregistrement['description']; ?></li>
    <?php } ?>
</ul>
</body>
</html>


