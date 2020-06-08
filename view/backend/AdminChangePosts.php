<?php $title = htmlspecialchars("Admin - Modification : " . $post['title']); ?>

<?php ob_start(); ?>

<p class="bouton_retour">
    <a href="index.php?action=AdminAllPosts"">
        <button class="btn btn-default">Retour à tous les chapitres</button>
    </a>
</p>

<h1>Modifications du chapitre
    <a href="index.php?action=adminDeletePost&amp;id=<?= $post['id'] ?>" data-toggle="tooltip" title="Supprimer" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce chapitre ?'));">
        <button class="btn btn-danger btn-xs">
            <span class="glyphicon glyphicon-remove"></span>
        </button>
    </a>
</h1>


<form action="index.php?action=adminChangingPost&amp;id=<?= $post['id'] ?>" method="post">
    <legend>Le Chapitre</legend>
    <div class="form-group">
        <label for="title">Titre du chapitre</label><br />
        <input type="text" id="title" name="title" value="<?= htmlspecialchars($post['title']) ?>" class="form-control"/>
    </div>
    <div class="form-group">
        <label for="chapterContent">Contenu du chapitre</label><br />
        <textarea id="chapterContent" name="chapterContent" class="form-control"><?= nl2br($post['content']) ?></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-success" value="Enregistrer" />
    </div>
</form>


<legend>Les Commentaires</legend>

<?php $i=0;
while ($report = $reporting->fetch())
{
    $comments_report[$i] = $report['comment_id'];
    $i++;
}
while ($comment = $comments->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p>
        <?= nl2br(htmlspecialchars($comment['comment'])) ?>
        <a href="index.php?action=adminDeleteReport&amp;id=<?= $comment['id'] ?>" data-toggle="tooltip" title="Supprimer" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce commentaire ?'));">
            <button class="btn btn-danger btn-xs">
                <span class="glyphicon glyphicon-remove"></span>
            </button>
        </a>
    </p>
    
     <?php 
    $message_report=false;

    if (isset($comments_report)) {
        for ($i=0 ; $i<count($comments_report) ; $i++){
            if ($comments_report[$i] == $comment['id']) {
                $message_report=true;
            }
        }
    }

    if (isset($message_report) && $message_report == true) { 
    ?>    
        <p class="alert alert-danger"><strong>Ce commentaire a été signalé par un lecteur !</strong></p>
    <?php
    }
}
?>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>