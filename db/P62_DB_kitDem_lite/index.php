<?php
require_once('conn.php');

// Sélectionner toutes les catégories d'articles
$categories = get_categories();
//var_dump($categories);

$articles = get_article_list();

// Réception des données
$insert_form_message = ''; // Message de retour formulaire d'insertion
$delete_form_message = ''; // Message de retour formualire de suppression
if ('POST' == $_SERVER['REQUEST_METHOD']) {
    var_dump($_POST);
    if (array_key_exists('article_name', $_POST) && array_key_exists('article_desc', $_POST) && array_key_exists('article_cat', $_POST)) {
        // Réception des données d'insertion d'article
        $article_name = filter_input(INPUT_POST, 'article_name', FILTER_SANITIZE_STRING);
        $name_valide = (false !== $article_name) && (strlen($article_name) > 2);
        if (!$name_valide) {
            $insert_form_message .= '<p>Le nom est invalide (2 caractères minimum, pas de caractères spéciaux).</p>';
        }
        $article_desc = filter_input(INPUT_POST, 'article_desc', FILTER_SANITIZE_STRING);
        $desc_valide = (false !== $article_desc) && (strlen($article_desc) > 2);
        if (!$desc_valide) {
            $insert_form_message .= '<p>La description est invalide (2 caractères minimum, pas de caractères spéciaux).</p>';
        }
        $article_cat = filter_input(INPUT_POST, 'article_cat', FILTER_SANITIZE_STRING);
        $cat_valide = array_key_exists($article_cat, $categories);
        /*    var_dump(array_keys($categories));
            var_dump($cat_valide);*/
        if (!$cat_valide) {
            $insert_form_message .= '<p>La catégorie est invalide (L\'avez vous choisie ?).</p>';
        }
        if ($name_valide && $desc_valide && $cat_valide) {
            $queryStr = "INSERT INTO article (`id`, `name`, `description`, `category_id`) VALUES (NULL, '$article_name', '$article_desc', '$article_cat')";
            $res = $mysqli->query($queryStr);
            var_dump($queryStr);
            if ($res) {
                $insert_form_message .= sprintf('<p>Nouvel article ajouté (nom=%s, description=%s, catégorie=%s, id=%d).</p>',
                    $article_name, $article_desc, $categories[$article_cat]['name'], $mysqli->insert_id);
            } else {
                $insert_form_message .= sprintf('<p>L\'article n\'a pas pu être ajouté (erreur=%s).</p>', $mysqli->error);
            }
        }
    }
    if (array_key_exists('delete_article', $_POST)) {
        $article_id = array_keys($_POST['delete_article'])[0]; // Première clef du tableau $_POST['delete_article']
        // Vérification que l'il d'article est valide
        // Sélectionner tous les articles toutes catégories confondues (ATTENTION VOLUME)
        if (array_key_exists($article_id, $articles)) {
            $queryStr = "DELETE FROM `article` WHERE `article`.`id` = $article_id";
            $res = $mysqli->query($queryStr);
            var_dump($queryStr);
            if ($res) {
                $delete_form_message .= sprintf('<p>L\'article (nom=%s, id=%d) a été supprimé.</p>', $articles[$article_id]['name'], $article_id);
                // Suppression de l'article dans le tableau des articles chargés
                unset($articles[$article_id]);
            } else {
                $delete_form_message .= sprintf('<p>L\'article (nom=%s, id=%d) n\'a pas pu être supprimé (erreur=%s).</p>', $articles[$article_id]['name'], $article_id, $mysqli->error);
            }
        } else {
            $delete_form_message .= sprintf('<p>L\'id d\'article (id=%d) est invalide.</p>', $article_id);
        }


    }
}

$articles = get_article_list();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title>Page de présentation DB_kitDem_lite</title>
    <style>
        .feedback_msg {
            border-radius: 5px;
            background-color: lightpink;
            border-color: deeppink;
        }

    </style>
</head>
<body>
<p><a href="<?= basename(__FILE__)?>">Afficher page</a></p>
<h2>Tous les articles</h2>
<form method="post" id="delete_article">
    <div class="feedback_msg"><?= $delete_form_message ?></div>
    <ul>
        <?php
        foreach ($articles as $id => $article) { ?>
            <li><?= utf8_encode($article['name']), ',', utf8_encode($article['description']) ?>
                <input type="submit" name="delete_article[<?= $id ?>]" value="X" /></li>
        <?php } ?>
    </ul>
</form>


<h2>Toutes les catégories d'articles</h2>
<ul>
    <?php foreach ($categories as $categorie) { ?>
        <li><?= utf8_encode($categorie['name']) ?></li>
    <?php } ?>
</ul>

<!--Petit formulaire pour ajouter un article depuis votre site -->
<h2>Inserer un article</h2>
<form method="post">
    <div class="feedback_msg"><?= $insert_form_message ?></div>
    <label>Nom:</label>
    <input type="text" id="article_name" name="article_name"
           value="<?= array_key_exists('article_name', $_POST) ? $_POST['article_name'] : '' ?>"/>
    <label>Description:</label>
    <input type="text" id="article_desc" name="article_desc"
           value="<?= array_key_exists('article_desc', $_POST) ? $_POST['article_desc'] : '' ?>"/>
    <label>Category:</label>
    <select id="article_cat" name="article_cat">
        <option value="-1">Choisir...</option>
        <?php foreach ($categories as $id => $category) { ?>
            <option
                value="<?= $id ?>"
                <?= array_key_exists('article_cat', $_POST) && ($id == $_POST['article_cat']) ? ' selected="selected"' : '' ?>
            ><?= utf8_encode($category['name']) ?></option>
        <?php } ?>
    </select>
    <input type="submit" value="Ajouter Article"/>
</form>
<script
    src="https://code.jquery.com/jquery-3.1.1.slim.min.js"
    integrity="sha256-/SIrNqv8h6QGKDuNoLGA4iret+kyesCkHGzVUUV0shc="
    crossorigin="anonymous"></script>
</body>
</html>


