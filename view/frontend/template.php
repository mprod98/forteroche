<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    	<meta name="viewport" content="width=device-width, initial-scale=1" />
    	<meta name="description" content="Jean Forteroche, acteur et écrivain. Il travaille actuellement sur son prochain roman, 'Billet simple pour l'Alaska'. Il souhaite innover et le publier par épisode en ligne sur son propre site.">
    	<meta name="author" content="Site web fait en PHP et MySQL par Michel Merra. Avec une architecture MVC et POO. Projet 4 : 'Créez le blog d'un écrivain', formation Openclassrooms 'Développeur Web Junior'">
    	

        <title><?= $title ?></title>

        <link href="vendor/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
        <link href="vendor/bootstrap/assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet" />
        <link href="vendor/bootstrap/docs/examples/starter-template/starter-template.css" rel="stylesheet" />
        <link href="public/css/style.css" rel="stylesheet" /> 

	

    </head>
        
    <body>
    	<nav class="navbar navbar-inverse navbar-fixed-top">
      		<div class="container">
        		<div class="navbar-header">
          			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
			            <span class="sr-only">Toggle navigation</span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			            <span class="icon-bar"></span>
			         </button>
          			<a class="navbar-brand" href="index.php">Billet simple pour l'Alaska</a>
        		</div>

		        <div id="navbar" class="navbar-collapse collapse">

		        	<?php if (!isset($_SESSION['login'])) { ?>

			          	<form class="navbar-form navbar-right" method="POST" >
			          		<?php if (isset($_SESSION['message'])) { ?>
			            		<div class="form-group"><p class="red"><?= $_SESSION['message'] ?></p></div>
			            	<?php } ?>
			            	<div class="form-group">
			             	 	<input name="login" type="text" id="login" placeholder="Identifiant" class="form-control">
			            	</div>
			            	<div class="form-group">
			              		<input type="password" name="pass" id="pass" placeholder="Mot de passe" class="form-control">
			            	</div>
			            	<button type="submit" class="btn btn-success">Connexion</button>
			          	</form>

			        <?php
					}
					else {
					?>
						
						<ul class="nav navbar-right navbar-nav">
							<li><a href="index.php?action=admin"><button class="btn btn-xs btn-primary">Section Administration</button></a></li>
							<li><a href="index.php?admin=logout"><button class="btn btn-xs btn-danger">Déconnexion</button></a></li>
     					</ul>

     				<?php
					}
					?>
		        </div>
      		</div>
   		</nav>

        <?= $content ?>

		<footer class="container">
        	<p>Tous droits réservés © Michel Merra <?php echo date("Y"); ?> - Formation Openclassrooms - Développeur Web Junior - Projet n°4 : Créez un blog pour un écrivain</p>
        </footer>

	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	    <script>window.jQuery || document.write('<script src="vendor/bootstrap/docs/assets/js/vendor/jquery.min.js"><\/script>')</script>
	    <script src="vendor/bootstrap/docs/dist/js/bootstrap.min.js"></script>
	    <script src="vendor/bootstrap/docs/assets/js/ie10-viewport-bug-workaround.js"></script>

    </body>
</html>