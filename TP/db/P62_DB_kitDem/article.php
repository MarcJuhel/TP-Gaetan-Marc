<?php
/**
 *  Opérations sur les articles
 * 	- ajout de article
 * 	- lister les catégories de articles
 * 	- lister les articles, tous ou par catégorie
 */

require_once('conn.php');
require_once('common.php');

/**
 *  Insertion (ajout) d'un nouveau article
 */
function article_add($name, $category_id, $description, $price) {
    global $pdo;
    $resultat = false; // Mode défensif
    $queryStr = 'INSERT INTO article (name,category_id,description,price,is_online) VALUES (:name,:category_id,:description,:price,:is_online)';
    $sth = $pdo->prepare($queryStr);
    $params = array(
        ':name' => $name,
        ':category_id' => $category_id,
        ':description' => $description,
        ':price' => $price,
        ':is_online' => true,
    );
    $res = $sth->execute($params);
    //$sth->debugDumpParams();
    //var_dump($params);
    //var_dump($res);
    if ( ! $res || ($sth->rowCount()  == 0)) {
        throw new Exception("Echec lors de la tentative d'ajout de l''article $name : (" . $sth->errorInfo()[0] . ")<br/>");
    }
    $inserted_user_id = $pdo->lastInsertId();
    if ($res) {
        $resultat = $inserted_user_id;
    };
    return $resultat;
}


/**
 * Lister (parcourir) les catégories de articles
 * @return array
 */
function article_category_list() {
    global $pdo;
    $resultat = false; // Par défaut n'existe pas
    $queryStr = 'SELECT * FROM article_category';
    try {
        $sth = $pdo->prepare($queryStr);
        $params = array();
        $res = $sth->execute($params);
//        $sth->debugDumpParams();
//        var_dump($res);
//        var_dump($sth->rowCount());
    } catch (PDOException $e) {
        echo "Echec tentative lister les catégories de articles : (" . $e->getMessage() . ')<br/>';
        exit();
    }
    if ($res) {
        $resultat = $sth->fetchALL(PDO::FETCH_KEY_PAIR); // Permet d'avoir la colonne 0 (id) en clef, la colonne 1 (name) en valeur
    }
    return $resultat;
}


/**
 * Lister (parcourir) ou rechercher les articles
 * NB : Pas de limite mise en place ici (à améliorer si le nb de articles devient important
 * @param bool|int $category_id: Catégorie de l''article, false pour toutes les catégories
 * @param bool|string $name: Nom de l'article ou partie de ce nom (operateur %like%)
 * @return bool|mixed
 */
function article_list($category_id = false, $name = false) {
    global $pdo;
    $resultat = false;
    $queryStr = 'SELECT * FROM article';
    if (false !== $category_id) {
        $queryStr .= ' WHERE `category_id`=:category_id';
    }
    if (false !== $name) {
        $queryStr .= (strpos($queryStr, 'WHERE') > 0) ? ' AND ' : ' WHERE '; // Suivant qu'une clause WHERE est déjà présente
        $queryStr .= '`name` LIKE :name';
    }
    try {
        $sth = $pdo->prepare($queryStr);
        $params = array();
        if (false !== $category_id) {
            $params[':category_id'] = $category_id;
        }
        if (false !== $name) {
            $params[':name'] = '%' . $name . '%';
        }
        $res = $sth->execute($params);
//        $sth->debugDumpParams();
//        var_dump($res);
//        var_dump($sth->rowCount());
    } catch (PDOException $e) {
        echo "Echec tentative lister articles pour catégorie $category_id : (" . $e->getMessage() . ')<br/>';
        exit();
    }
    if ($res && ($sth->rowCount() > 0)) {
        $resultat = $sth->fetchAll(PDO::FETCH_ASSOC);
    }
    return $resultat;
}
