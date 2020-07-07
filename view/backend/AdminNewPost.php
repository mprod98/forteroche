<?php $title = 'Admin - Nouveau Chapitre'; ?>

<?php ob_start(); ?>

<p class="bouton_retour">
    <a href="index.php?action=admin">
        <span class="btn btn-default">Retour à l'accueil</span>
    </a>
</p>

<h1>Edition d'un nouveau Chapitre</h1>

<form action="index.php?action=adminAddPost" method="post">
    <div class="form-group">
        <label for="title">Titre du chapitre :</label>
        <input type="text" id="title" name="title"  class="form-control input-sm"/>
    </div>
    <div class="form-group">
        <label for="chapterContent">Contenu du chapitre :</label>
        <textarea  id="chapterContent" name="chapterContent" class="form-control"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Enregistrer" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>