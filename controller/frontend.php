<?php

// Chargement des classes
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création objet
    $posts = $postManager->getPosts(); // call fonction de l'objet 

    require('view/frontend/ListPostsView.php');
}

function post($postId)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($postId);
    $comments = $commentManager->getComments($postId);
    $reporting = $commentManager->getReporting($postId);

    require('view/frontend/PostView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Pas d\'ajout du commentaire !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function report($commentId, $postId)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postReporting($commentId);

    if ($affectedLines === false) {
        throw new Exception('Pas de signalement du commentaire possible !');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function error($e)
{
    require('view/frontend/ErrorView.php');
}

function checkPost($postId)
{
    $postId = intval($postId);
    $postManager = new PostManager();
    $check = $postManager->getCheckPost($postId);

    return $check;
}

function checkComment($commentId) //verifie les commentaires
{
    $commentId = intval($commentId);
    $commentManager = new CommentManager();
    $check = $commentManager->getCheckComment($commentId);

    return $check;
}

function checkReport($reportId)// verifie les signalements
{
    $reportId = intval($reportId);
    $commentManager = new CommentManager();
    $check = $commentManager->getCheckReport($reportId);

    return $check;
}