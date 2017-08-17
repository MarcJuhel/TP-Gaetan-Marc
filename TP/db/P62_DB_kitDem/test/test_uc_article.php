<?php
/**
 *  Script de test des opérations principales sur les articles de la base de données p62_dbkitdem
 * 	- authentification d'un utilisateur
 * 	- ajout d'un article
 * 	- parcours (listage) des catégories de articles
 * 	- parcours (listage) des articles
 */

require_once('../article.php');

/**
 * Gestion des articles
 *
 * UC1: Ajout d'un article
 * UC2: Lister tous les articles
 * UC3: Lister toutes les catégories
 * UC4: Lister les articles d'une seule catégorie
 * UC5: Lister les articles dont le nom contient la sous-chaîne 'Montréal'
 */


/**
 * UC1: Ajout d'un article (si il n'existe pas déjà)
 */
$articles_insectarium = article_list(false, 'insectarium');
//var_dump($articles_insectarium);
if (false === $articles_insectarium) {
    $article_id = article_add('Portes ouvertes insectarium de Montréal', 3, 'L\'insectarium de Montréal est heureux d\'ouvrir sa <em>fabuleuse collection</em> de papillons ...', 0.0);
    //var_dump($article_id);
};

/**
 * UC2: Lister tous les articles
 */
$articles = article_list();
//var_dump($articles);

/**
 * UC3: Lister toutes les catégories
 */
$categories = article_category_list();
var_dump($categories);

/**
 * UC4: Lister tous les articles de category_id = 1
 */
// On commence par rechercher la catégorie de la Musique (plus prudent si les id bougent)
$categorie_musique_id = array_search('Musique', $categories);
$articles_musique = article_list($categorie_musique_id);
//var_dump($articles_musique);

/**
 * UC5: Lister tous les articles dont le nom contient la sous-chaîne 'Montréal'
 */
$articles_montreal = article_list(false, 'Montréal');
var_dump($articles_montreal);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <style>
        .nom {
            font-size: larger;
            font-weight: bolder;
        }
        .categorie {
            margin-left: 1em;;
            font-style: italic;
        }
        .description{
             color: darkblue;
        }
    </style>
</head>
<body>

<h2>Tous les articles</h2>
<ul>
<?php
foreach ($articles as $article) {
    echo '<li><span class="nom">', $article['name'], '</span><span class="categorie">', $categories[$article['category_id']], '</span><p class="description">', $article['description'], '</p>', '</li>';
}
?>
</ul>
<h2>Musique</h2>
<ul>
<?php
foreach ($articles_musique as $ev) {
    echo '<li><span class="nom">', $ev['name'], '</span></li>';
}
?>
</ul>
<h2>articles à Montréal</h2>
<ul>
    <?php
    foreach ($articles_montreal as $article_mntl) {
        echo '<li><span class="nom">', $article_mntl['name'], '</span></li>';
    }
    ?>
</ul>
</body>
</html>
