<?php

// Chargement des classes
require_once('model/AdminManager.php');
require_once('model/CommentManager.php');
require_once('model/PostManager.php');


function login()
{
    if(isset($_POST['login']) && isset($_POST['pass']) && $_POST['login'] != '' && $_POST['pass'] != '') {
        $login = htmlspecialchars($_POST['login']);
        $pass = htmlspecialchars($_POST['pass']);

        $loginManager = new AdminManager();
        $loginAdmin = $loginManager->getLogin($login);
        $isPasswordCorrect = password_verify($pass, $loginAdmin['pass']);

        if ($loginAdmin === false){
            $_SESSION = array();
            session_destroy();

            $_SESSION['message'] = 'Mot de passe ou identifiant erroné ! Contactez un admin ou Retapez votre MDP';

        }
        else {
            
            if ($isPasswordCorrect) {                     
                $_SESSION['id'] = $loginAdmin['id'];
                $_SESSION['login'] = $loginAdmin;
                header('Location: index.php?action=admin');
            }
            else {
                $_SESSION = array();
                session_destroy();
                $_SESSION['message'] = 'Mot de passe ou identifiant erroné ! Contactez un admin ou Retapez votre MDP';
            }
        }
    }
    else {
        $_SESSION['message'] = 'Remplisez tous les champs obligatoirement';
    }
}

function logout()
{
    $_SESSION = array();
    session_destroy();
}

function adminIndex()
{
    if (!isset($_SESSION['login'])){
        $message="veuillez vous connecter 07";
        require('view/backend/ErrorView.php');
    return;
    
}
    $adminManager = new AdminManager();
    $reporting = $adminManager->getReportingAdmin();

    require('view/backend/AdminIndex.php');
}

function adminDeleteReport($commentId)
{
    if (!isset($_SESSION['login'])){
        $message="veuillez vous connecter";
        require('view/backend/ErrorView.php');
    return;
    
}
    $adminManager = new AdminManager();
    $affectedLines = $adminManager->setDeleteReport($commentId);

    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer le commentaire !');
    }
    else {
        header('Location: index.php?action=admin');
    }
}

function adminCancelReport($reportId)
{
    if (!isset($_SESSION['login'])){
        $message="veuillez vous connecter";
        require('view/backend/ErrorView.php');
    return;
    
}
    $adminManager = new AdminManager();
    $affectedLines = $adminManager->setCancelReport($reportId);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'annuler le signalement !');
    }
    else {
        header('Location: index.php?action=admin');
    }
}

function adminNewPost() 
{
    require('view/backend/AdminNewPost.php');
}

function adminAddPost() 
{
    if (!isset($_SESSION['login'])){
        $message="veuillez vous connecter";
        require('view/backend/ErrorView.php');
    return;
    
}
    $adminManager = new AdminManager();
    $affectedLines = $adminManager->setNewPost();

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le nouveau chapitre !');
    }
    else {
        //echo "ajout ok";
        header('Location: index.php?action=admin');
    }
}

function adminAllPosts() 
{
    if (!isset($_SESSION['login'])){
        $message="veuillez vous connecter";
        require('view/backend/ErrorView.php');
    return;
    
}
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/backend/AdminAllPosts.php');
}

function adminChangePost($postId) 
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($postId);
    $comments = $commentManager->getComments($postId);
    $reporting = $commentManager->getReporting($postId);

    require('view/backend/AdminChangePosts.php');
}

function adminChangingPost($postId) 
{
    if (!isset($_SESSION['login'])){
        $message="veuillez vous connecter";
        require('view/backend/ErrorView.php');
    return;
    
}
    $adminManager = new AdminManager();
    $affectedLines = $adminManager->setChangePost($postId);

    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier ce chapitre !');
    }
    else {
       header('Location: index.php?action=AdminAllPosts');
    }    
}

function adminDeletePost($postId)
{
    if (!isset($_SESSION['login'])){
        $message="veuillez vous connecter";
        require('view/backend/ErrorView.php');
    return;
    
}
    $adminManager = new AdminManager();
    $affectedLines = $adminManager->setDeletePost($postId);

    if ($affectedLines === false) {
        throw new Exception('Impossible de supprimer ce chapitre !');
    }
    else {
       header('Location: index.php?action=AdminAllPosts');
    }    
}