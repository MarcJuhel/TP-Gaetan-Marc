
<?php
/**
 *  Quelques fonctions utiles et génériques pour les scripts exploitant la base de données p62_dbkitdem
 * 	- passwd_encrypt()
 *  - passwd_check()
 */


function creatHeader($titre, $description, $cssPath, $jsPath){
echo '<!DOCTYPE html><html lang="fr"><head><meta charset="utf-8">
    	<title>'.$titre.'</title><meta name="author" content="Marc Camil Gaetan" >
        <meta name="description" content="'.$description.'
        " ><link rel="stylesheet" href="'.$cssPath.'"> 
    	<script src="'.$jsPath.'"></script>
		
		<!--[if lt IE 9]>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
		<![endif]-->
	</head>';

};


/**
 * Encrypter un mot de passe
 * @param $password : Le mot de passe à encrypter
 * @return string : La chaîne représentant le mot de passe encrypté
 * http://www.yiiframework.com/wiki/425/use-crypt-for-password-storage/
 */
function passwd_encrypt($password) {
    if (version_compare(PHP_VERSION, '5.5.0') >= 0) {
        // La version est supérieure ou égale à 5.5 : On peut utiliser password_hash() et password_verify()
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
    } else {
        $salt = '$2y$07$' . strtr(base64_encode(mcrypt_create_iv(16, MCRYPT_DEV_URANDOM)), '+', '.');
        $password_hash = crypt($password, $salt);
    }
    return $password_hash;
}

/**
 * Comparer un mot de passe avec un hash préalablement enregistré
 * NB : Le hash enregistré est nécéssaire pour calculer le hash du password fourni
 * @param $password : Le mot de passe à vérifier
 * @param $password_hash : Le hash du mot de passe à vérifier
 * @return boolean : True si valide, false sinon
 */
function passwd_check($password, $password_hash) {
    if (version_compare(PHP_VERSION, '5.5.0') >= 0) {
        // La version est supérieure ou égale à 5.5 : On peut utiliser password_hash() et password_verify()
        $result = password_verify($password, $password_hash);
    } else {
        $result = ( $password_hash === crypt($password, $password_hash) );
    }
    return $result;
}


/**
 * Vider une table
 * ATTENTION, pas d'avertissement ici !!!!
 * @param $tablename : nom de table
 * @return bool
 */
function table_truncate($tablename) {
    global $pdo;
    $resultat = true;
    $queryStr = 'TRUNCATE TABLE '. $tablename;
    try {
        $pdo->query($queryStr);
    } catch (PDOException $e) {
        echo "Echec tentative vidage de la table $tablename: (" . $e->getMessage() . ')<br/>';
    }
    return $resultat;
}

// Constantes rassemblant les infos de connexion et de schéma de la DB
define('P62_DBKITDEM_CONN_HOST', '127.0.0.1');
define('P62_DBKITDEM_CONN_USER', 'root');
define('P62_DBKITDEM_CONN_PWD', '');
define('P62_DBKITDEM_DBNAME', 'P62_DBkitDem');
define('P62_DBKITDEM_TB_USER', 'user');
define('P62_DBKITDEM_TB_USERCNX', 'user_cnx');
define('P62_DBKITDEM_TB_PRODUCT', 'product');
define('P62_DBKITDEM_TB_PRODUCT_CATEGORY', 'product_category');
define('COLON_CAR', ':');
define('ACCENT_GRAVE_CAR', '`');

// Creation de l'objet PDO pour la connexion
// Il va nous servir tout au long du code pour l'utilisation de la DB
try {
    $pdo = new PDO(
        'mysql:host=' . P62_DBKITDEM_CONN_HOST . ';dbname=' . P62_DBKITDEM_DBNAME,
        P62_DBKITDEM_CONN_USER,
        P62_DBKITDEM_CONN_PWD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\'')
    );
} catch (PDOException $e) {
    echo 'Echec lors de la connexion à MySQL : (' . $e->getMessage() . ')<br/>';
    die();
}

/*if (!$mysqli->set_charset("utf8")) {
    printf("Erreur lors du chargement du jeu de caractères utf8 : %s\n", $mysqli->error);
}*/