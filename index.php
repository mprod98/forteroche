<?php
session_start();

require_once('controller/frontend.php');
require_once('controller/backend.php');
$frontend= new Frontend();
$backend= new Backend();
try {
    if (isset($_POST['login'])) {
        $backend->login();
    }
    elseif (isset($_GET['admin']) && $_GET['admin'] == 'logout') {
        $backend->logout();
    }

    if (isset($_GET['action'])) {

        if ($_GET['action'] == 'listPosts') {
            $frontend->listPosts();
        }
        elseif ($_GET['action'] == 'post') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $exist = $frontend->checkPost($_GET['id']);

                if($exist['post_exist']){
                    $frontend->post($_GET['id']);
                }
                else {
                    throw new Exception(' Sorry Le chapitre que vous cherchez n\'existe pas !');
                }
            }
            else {
                throw new Exception('Pas d\'identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {

                if (!empty($_POST['author']) && !empty($_POST['comment']) && trim($_POST['author']) != '' && trim($_POST['comment']) != '') {
                    $exist =  $frontend->checkPost($_GET['id']);

                    if ($exist['post_exist']) {
                        $frontend->addComment($_GET['id'], htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
                    }
                    else {
                        throw new Exception('Oups ! Le chapitre que vous cherchez n\'existe pas (ou plus). Impossible d\'ajouter votre commentaire !');
                    }
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        }
        elseif ($_GET['action'] == 'report') {

            if ((isset($_GET['post_id']) && $_GET['post_id'] > 0) && (isset($_GET['comment_id']) && $_GET['comment_id'] > 0)) {
                $postExist = $frontend->checkPost($_GET['post_id']);

                if ($postExist['post_exist']) {
                    $commentExist = $frontend->checkComment($_GET['comment_id']);

                    if ($commentExist['comment_exist']) {
                        $frontend->report($_GET['comment_id'], $_GET['post_id']);
                    }
                    else{
                        throw new Exception('Sorry! Le commentaire que vous souhaitez signaler n\'existe pas . Impossible de signaler le commentaire');
                    }

                }
                else{
                    throw new Exception('Sorry! Le chapitre que vous cherchez n\'existe pas. Impossible de signaler le commentaire !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de chapitre et/ou de commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'admin') {
            $backend->adminIndex();
        }
        elseif ($_GET['action'] == 'adminDeleteReport') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $commentExist = $frontend->checkComment($_GET['id']);

                if ($commentExist['comment_exist']) {
                    $backend->adminDeleteReport($_GET['id']);
                }
                else{
                    throw new Exception('Sorry! Le commentaire que vous souhaitez supprimer n\'existe pas (ou plus). Impossible de le supprimer !');
                }
                
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        elseif ($_GET['action'] == 'adminCancelReport') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $exist = $frontend->checkReport($_GET['id']);

                if ($exist['report_exist']) {
                    $backend->adminCancelReport($_GET['id']);
                }
                else{
                    throw new Exception('Sorry! Le signalement que vous souhaitez annuler est inexistant.');
                }
            }
            else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        }
        elseif ($_GET['action'] == 'AdminNewPost') {
            $backend->adminNewPost();
        }
        elseif ($_GET['action'] == 'adminAddPost') {
            $backend->adminAddPost();
        }
        elseif ($_GET['action'] == 'AdminAllPosts') {
            $backend->adminAllPosts();
        }
        elseif ($_GET['action'] == 'AdminChangePosts') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $exist = $frontend->checkPost($_GET['id']);

                if ($exist['post_exist']) {
                    $backend->adminChangePost($_GET['id']);
                }
                else{
                    throw new Exception('Sorry! Le chapitre que vous cherchez n\'existe pas .');
                }

            }
            else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        }
        elseif ($_GET['action'] == 'adminChangingPost') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $exist = $frontend->checkPost($_GET['id']);

                if ($exist['post_exist']) {
                    $backend->adminChangingPost($_GET['id']);
                }
                else{
                    throw new Exception('Sorry ! Impossible de mettre à jour le chapitre car il n\'existe pas (ou plus).');
                }

            }
            else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        }
        elseif ($_GET['action'] == 'adminDeletePost') {

            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $exist = $frontend->checkPost($_GET['id']);

                if ($exist['post_exist']) {
                    $backend->adminDeletePost($_GET['id']);
                }
                else{
                    throw new Exception('Sorry! Le chapitre que vous cherchez n\'existe pas. Impossible de le supprimer !');
                }

            }
            else {
                throw new Exception('Aucun identifiant de chapitre envoyé');
            }
        }else {
            throw new Exception('Sorry! La page que vous cherchez n\'existe pas.');
        }  
 
    }
    else {
        
        $frontend->listPosts();
    }
}
catch(Exception $e) {
    error($e);
}