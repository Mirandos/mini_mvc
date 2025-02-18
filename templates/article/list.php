<?php require_once _ROOTPATH_ . '/templates/header.php'; ?>

<h1>Articles</h1>
<?php foreach($articles as $article): ?>
<p> <?= $article->getTitle(); ?>
<br><p><a href="index.php?controller=article&action=show&id=<?= $article->getId();?>">Lire Plus</a></p>
<?php endforeach; ?></p>
    



<?php require_once _ROOTPATH_ . '/templates/footer.php'; ?>