<?php $title = 'Admin - Accueil'; ?>

<?php ob_start(); ?>

<h1>Bienvenue dans la partie Administrateur</h1>

<div class="panel panel-danger">
  	<div class="panel-heading">
    	<h2 class="panel-title">Commentaires signalés</h2>
  	</div>
  	<div class="panel-body"><?php
		while ($report = $reporting->fetch())
		{ ?>
		    <p>
		    	<span class="red">Signalé le <?= $report['reporting_date'] ?> :</span> <?= $report['comment'] ?> 
		    	<a href="index.php?action=adminDeleteReport&amp;id=<?= $report['comment_id'] ?>" data-toggle="tooltip" title="supprimer" onclick="return(confirm('Etes-vous sûr de vouloir supprimer ce signalement ?'));">
		    		<button type="button" class="btn btn-xs btn-danger glyphicon glyphicon-remove"></button>
		    	</a> 
		    	<a href="index.php?action=adminCancelReport&amp;id=<?= $report['id'] ?>" data-toggle="tooltip" title="Autoriser" onclick="return(confirm('Etes-vous sûr de vouloir autoriser ce signalement ?'));">
		    		<button type="button" class="btn btn-xs btn-success glyphicon glyphicon-ok"></button>
		    	</a>
		    </p>

		<?php
		} ?>
	</div>
</div>

<div class="panel panel-info">
	<div class="panel-heading">
		<h2 class="panel-title">Gestion du Roman</h2>
	</div>
	<div class="panel-body">
		<a href="index.php?action=AdminNewPost"><button class="btn btn-primary">Nouveau Chapitre</button></a>
		<a href="index.php?action=AdminAllPosts"><button class="btn btn-primary">Voir tous les Chapitres</button></a>
	</div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>