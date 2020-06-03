<?php $title = 'Billets simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<div class="jumbotron">
  	<div class="container">
        <h1>Bonjour tout le monde !</h1>
        <p>Bienvenue ! Je suis Jean Forteroche, écrivain. Vous êtes actuellement sur mon Blog où je poste au fur et à mesure un nouveau chapitre de mon dernier roman intitulé "Billet simple pour l'Alaska". N'hésitez pas à y laisser des commentaires !</p>
  	</div>
</div>

<div class="container">

	<?php
	while ($data = $posts->fetch())
	{
	?>
	    <div class="panel panel-primary">
	  		<div class="panel-heading">
	    		<h3 class="panel-title">
	    			<?= htmlspecialchars($data['title']) ?>
	            	<em>le <?= $data['creation_date_fr'] ?></em>
	        	</h3>
	  		</div>
	  		<div class="panel-body">
	  			<?= mb_substr(nl2br($data['content']), 0, 500, 'UTF-8') ?>
	  			<p>[...]</p>
	  		</div>
	  		<div class="panel-footer">
	  			<a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
					<p class="btn btn-warning btn-lg"><span class="glyphicon glyphicon-comment"></span></p>
				</a>
			</div>
		</div>

	<?php
	}
	$posts->closeCursor();
	?>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>