<?php $title = 'Admin De Tous Les Chapitres'; ?>

<?php ob_start(); ?>

<p class="bouton_retour">
  <a href="index.php?action=admin">
    <span class="btn btn-primary">Retour à l'accueil</span>
  </a>
</p>

<h1>Tous les Chapitres</h1>

<div class="alert alert-info">
	<p>Choisissez le chapitre pour le modifier ou le supprimer</p>
</div>

<?php
while ($data = $posts->fetch())
{
?>
  <div class="panel panel-primary">
		<div class="panel-heading">
  		<h2 class="panel-title">
       		<?= htmlspecialchars($data['title']) ?>
       		<em>le <?= $data['creation_date_fr'] ?></em>
      	</h2>
      </div>
      <div class="panel-body">
      	<?= mb_substr(nl2br($data['content']), 0, 500, 'UTF-8') ?> 
  		<p>[...]</p>
		</div>
		<div class="panel-footer">
			<a href="index.php?action=AdminChangePosts&amp;id=<?= $data['id'] ?>" data-toggle="tooltip" title="Modifier">
				<span class="btn btn-warning btn-lg">
          <span class="glyphicon glyphicon-pencil"></span>
        </span>
			</a> 
			<a href="index.php?action=adminDeletePost&amp;id=<?= $data['id'] ?>" data-toggle="tooltip" title="Supprimer" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce chapitre ?'));">
        <span class="btn btn-danger btn-lg">
          <span class="glyphicon glyphicon-remove"></span>
        </span>
      </a>
		</div>
  </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>