<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>

<div class="container" id="page_chapitre">

    <p class="bouton_retour">
        <a href="index.php">
            <span class="btn btn-default">Chapitre: Retour à la liste </span>
        </a>
    </p>
    
    <div class="panel panel-info">
        <div class="panel-heading">
            <h1 class="panel-title">
                <?= htmlspecialchars($post['title']) ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h1>
        </div>

        <div class="panel-body">
            <?= nl2br($post['content']) ?> 
        </div>

        <div class="panel-footer">
            <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                <h2>Commentaires</h2>
                <div class="form-group">
                    <label for="author">Nom :</label>
                    <input type="text" id="author" name="author" class="form-control input-sm"/>
                </div>
                <div class="form-group">
                    <label for="comment">Commentaire :</label>
                    <textarea id="comment" name="comment" class="form-control input-sm"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" />
                </div>
            </form>

            <?php 
            $i=0;

            while ($report = $reporting->fetch()) {
                $comments_report[$i] = $report['comment_id'];
                $i++;
            }

            while ($comment = $comments->fetch()) {
            ?>
                <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
                <p><?= nl2br(htmlspecialchars($comment['comment'])) ?>
                
                <?php 
                $message_report=false;

                if (isset($comments_report)) {

                    for ($i=0 ; $i<count($comments_report) ; $i++){

                        if ($comments_report[$i] == $comment['id']){
                            $message_report=true;
                        }
                    }
                }
                
                if (isset($message_report) && $message_report == true) { 
                ?>
                    </p>
                    <p class="alert alert-danger"><strong>Ce commentaire a déjà été signalé !</strong> l'administrateur s'en occupe au plus vite.</p>
                <?php
                }
                else { 
                ?>

                    <br/>
                    <a href="index.php?action=report&amp;comment_id=<?= $comment['id'] ?>&amp;post_id=<?= $comment['post_id'] ?>" onclick="return(confirm('Etes-vous sûr de vouloir signaler ce commentaire ?'));">
                        <span class="reporting btn-xs btn-danger" >Signaler</span>
                    </a>
                    </p>
                 
                <?php 
                }
            }
            ?>

        </div>

    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>