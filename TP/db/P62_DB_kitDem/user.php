<?php
/**
 *  Opérations sur les utilisateurs
 * 	- authentification
 * 	- ajout d'utilisateur
 * 	- maj date dernière connexion
 * Le mot de passe encrypté devrait être d'une taille minimale de 60 caractères, idéalement de 255 caractères
 * pour supporter des encryptages complexes modernes
 */

require_once('conn.php');
require_once('common.php');

/**
 * Indique l'état connecté dans les appels de fonction
 */
define('CNX_STATE_LOGIN', 'CNX_STATE_LOGIN');
/**
 * Indique l'état deconnecté dans les appels de fonction
 */
define('CNX_STATE_LOGOUT', 'CNX_STATE_LOGOUT');


/**
 * Supprimer utilisateur
 * ATTENTION, pas d'avertissement ici !!!!
 * @param $username : Username
 * @return bool
 */
function user_delete($username) {
    global $pdo;
    $resultat = false; // Mode défensif
    $queryStr = 'DELETE FROM user WHERE `username` = :username';
    try {
        $sth = $pdo->prepare($queryStr);
        $params = array(
            ':username' => $username,
        );
        $res = $sth->execute($params);
        //$sth->debugDumpParams();
        //$sth->errorInfo();
        //var_dump($res);
    } catch (PDOException $e) {
        echo "Echec tentative suppression de l'utilisateur $username : (" . $e->getMessage() . ')<br/>';
        exit();
    }
    $resultat = $res;
    return $resultat;
}

/**
 * Authentifier un utilisateur
 * On commence par rechercher l'utilisateur par son username
 * puis, s'il existe, on effectue le test d'authentification proprement dit
 * NB : Avec cette appproche, il faut lire le hash enregistré avant de faire la comparaison
 * @param $username
 * @param $password
 * @return array|bool
 */
function user_authenticate($username, $password) {
	global $pdo;
	$resultat = false; // Mode défensif
    $queryStr = 'SELECT * FROM user WHERE `username` = :username';
    try {
        $sth = $pdo->prepare($queryStr);
        $params = array(
            ':username' => $username,
        );
        $res = $sth->execute($params);
        //$sth->debugDumpParams();
        //$sth->errorInfo();
        //var_dump($res);
    } catch (PDOException $e) {
        echo "Echec tentative d'authentification de l'utilisateur $username : (" . $e->getMessage() . ')<br/>';
        exit();
    }
	if ($res) {
		$user_data = $sth->fetch(PDO::FETCH_ASSOC);
        // Test de validité du mot de passe
        if (passwd_check($password, $user_data['password_hash'])) {
            var_dump($user_data);
            // Retirer le hash des valeurs retournées
            unset($user_data['password_hash']);
            $resultat = $user_data;
        }
    };
	return $resultat;
}

/**
 *  Indiquer qu'un username est déjà pris
 * @param $username
 * @return array|bool
 */
function username_exists($username) {
    global $pdo;
    $resultat = false; // Par défaut n'existe pas
    $queryStr = 'SELECT * FROM user WHERE `username` = :username';
    try {
        $sth = $pdo->prepare($queryStr);
        $params = array(
            ':username' => $username,
        );
        $res = $sth->execute($params);
        //$sth->debugDumpParams();
        //$sth->errorInfo();
        //var_dump($res);
        //var_dump($sth->rowCount());
    } catch (PDOException $e) {
        echo "Echec tentative d'authentification de l'utilisateur $username : (" . $e->getMessage() . ')<br/>';
        exit();
    }
    if ($res && ($sth->rowCount() > 0)) {
        $resultat = $sth->fetch(PDO::FETCH_ASSOC);
        // Retirer le hash des valeurs retournées
        unset($resultat['password_hash']);
    }
    return $resultat;
}

/**
 * Insertion (ajout) d'un nouvel utilisateur
 * NB: Provoque aussi l'ajout d'en enregistrement dans la table usercnx;
 * @param $username : username utilisateur
 * @param $password : password utilisateur
 * @param $firstname : firstname utilisateur
 * @param $lastname : lastname utilisateur
 * @param $email : email utilisateur
 * @return array|bool : Un array contgenant les deux id d'insertion (user et usercnx) en cas de succès, false en cas d'échec
 */
function user_add($username, $password, $firstname, $lastname, $email) {
    global $pdo, $user_tb_cols;
    $resultat = false;
    $queryStr = 'INSERT INTO user (username,password_hash,firstname,lastname,email) VALUES (:username,:password_hash,:firstname,:lastname,:email)';
    $sth = $pdo->prepare($queryStr);
    $password_hash = passwd_encrypt($password);
    $params = array(
        ':username' => $username,
        ':password_hash' => $password_hash,
        ':firstname' => $firstname,
        ':lastname' => $lastname,
        ':email' => $email,
    );
    $res = $sth->execute($params);
    //$sth->debugDumpParams();
    //$sth->errorInfo();
    //var_dump($params);
    //var_dump($res);
    if ( ! $res || ($sth->rowCount()  == 0)) {
        throw new Exception("Echec lors de la tentative d'ajout de l'utilisateur $username : (" . $sth->errorInfo()[0] . ")<br/>");
    }
    $inserted_user_id = $pdo->lastInsertId();
    if ($res) {
        $resultat = $inserted_user_id;
    };
    return $resultat;
}

/**
 * Etablit la connexion d'un utilisateur (login)
 * Stratégie :
 *  Une entrée est ajoutée dans la table USERCNX
 * @param $user_id : id du user
 * @session_id : L'i    d de session de l'utilisateur
 * @return bool|mixed
 * @throws Exception
 */
function user_log_in($user_id, $session_id) {
    global $pdo;
    $resultat = false;
    $queryStr = 'INSERT INTO user_cnx (user_id,session_id,date_in,date_last_access,date_out) VALUES (:user_id,:session_id,:date_in,:date_last_access,:date_out)';
    $sth = $pdo->prepare($queryStr);
    $params = array(
        ':user_id' => $user_id,
        ':session_id' => $session_id,
        ':date_in' => date("Y-m-d H:i:s"),
        ':date_last_access' => date("Y-m-d H:i:s"),
        ':date_out' => null,
    );
    $res = $sth->execute($params);
//    $sth->debugDumpParams();
//    $sth->errorInfo();
//    var_dump($res);
//    var_dump($params);
    if ( ! $res || ($sth->rowCount()  == 0)) {
        throw new Exception("Echec lors de la tentative d'ajout d'une connexion pour l'utilisateur $user_id : (" . $sth->errorInfo()[0] . ")<br/>");
    }
    $inserted_usercnx_id = $pdo->lastInsertId();
    if ($res) {
        $resultat = $inserted_usercnx_id;
    };
    return $resultat;
}

/**
 * Termine la connexion d'un utilisateur (logout)
 * Stratégie :
 *  - Une entrée est recherchée dans la table USERCNX puis mise à jour
 * @param $user_id : id du user
 * @session_id : L'id de session de l'utilisateur
 * @return bool|mixed
 * @throws Exception
 */
function user_log_out($user_id, $session_id) {
    global $pdo;
    $resultat = false;
    $queryStr = 'UPDATE user_cnx SET `date_out` = :date_out WHERE `session_id` = :session_id AND `user_id` = :user_id';
    var_dump($queryStr);
    $sth = $pdo->prepare($queryStr);
    $params = array(
        ':user_id' => $user_id,
        ':session_id' => $session_id,
        ':date_out' => date("Y-m-d H:i:s"),
    );
    $res = $sth->execute($params);
//    $sth->debugDumpParams();
//    $sth->errorInfo();
//    var_dump($params);
//    var_dump($res);
    if ( ! $res || ($sth->rowCount()  == 0)) {
        throw new Exception("Echec lors de la tentative de déconnexion pour l'utilisateur $user_id : (" . $sth->errorInfo()[0] . ")<br/>");
    }
    if ($res) {
        $resultat = true;
    };
    return $resultat;
}

/**
 * Etablir la connexion (login) ou la déconnexion (logout) d'un utilisateur
 * @param $user_id : id du user
 * @param $user_id : id du user
 * @param $cnx_state: état de connection CNX_STATE_LOGIN ou CNX_STATE_LOGOUT
 * @return bool|mixed
 * @throws Exception
 */
function user_cnx_in_out($user_id, $session_id, $cnx_state) {
    $resultat = false;
    switch ($cnx_state) {
        case CNX_STATE_LOGIN:
            $resultat = user_log_in($user_id, $session_id);
            break;
        case CNX_STATE_LOGOUT:
            $resultat = user_log_out($user_id, $session_id);
            break;
        default :
            throw new Exception("Error cnx_state parameter value is invalid ($cnx_state).");
    }
    return $resultat;
}


/**
 * Lister des utilisateurs connectés
 * NB : Pas de limite mise en place ici (à améliorer si le nb d'utilisateurs devient important
 * @param bool $cnx_state: (PAS GÉRÉ ENCORE) état de connection CNX_STATE_LOGIN ou CNX_STATE_LOGOUT
 * @return bool|mixed
 */
function user_list($cnx_state = false) {
    global $pdo;
    $resultat = false; // Par défaut n'existe pas
    $queryStr = 'SELECT u.username FROM user AS u JOIN user_cnx AS uc ON (u.id = uc.user_id) WHERE uc.date_out IS NULL';
    try {
        $sth = $pdo->prepare($queryStr);
        $params = array(
//            COLON_CAR . USERCNX_TB_COL_DATEOUT => 'NULL',
        );
        $res = $sth->execute($params);
//        $sth->debugDumpParams();
//        $sth->errorInfo();
//        var_dump($res);
//        var_dump($sth->rowCount());
    } catch (PDOException $e) {
        echo "Echec tentative lister utilisateurs : (" . $e->getMessage() . ')<br/>';
        exit();
    }
    if ($res) {
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    return $resultat;
}
