<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>
<h1>Détails de l'article</h1>
<h2><?= $article->getTitle(); ?></h2>

<p><?= $article->getDescription(); ?></p>

<br>
<br>

<h2>Commentaires</h2>
<?php foreach($comments as $comment): ?>
<p><?= $comment->getComment(); ?></p>
<?php endforeach; ?>


<form action="" method="post">
    <label for="comment">Ajouter un commentaire</label>
    <textarea name="comment" id="comment" ></textarea>
    <button type="submit" >Ajouter</button>
</form>
<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>