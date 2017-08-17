<?php
/**
 *  Quelques fonctions utiles et génériques pour les scripts exploitant la base de données p62_dbkitdem
 * 	- passwd_encrypt()
 *  - passwd_check()
 */


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
