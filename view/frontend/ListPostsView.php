<?php $title = 'Billets simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<div class="jumbotron jumbotron-fluid">
  	<div class="container-fluid">
        <h1 class="display-4">Bonjour !</h1>
        <p class="lead">Bienvenue sur le blog de Jean Forteroche !  Ecrivain et Romancier, je poste au fur et à mesure un nouveau chapitre de mon dernier roman intitulé "Billet simple pour l'Alaska". Laissez moi des commentaires pour faire évoluer l'histoire !</p>
  	</div>
</div>

<div class="container-fluid">

	<?php
	while ($data = $posts->fetch())
	{
	?>
	    <div class="panel panel-info">
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
					<p class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-comment"></span></p>
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