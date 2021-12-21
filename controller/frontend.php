<?php

// Chargement des classes
use Funax\blogMVC\Model\CommentManager;
use Funax\blogMVC\Model\PostManager;

require_once('model/PostManager.php');
require_once('model/CommentManager.php');

function listPosts()
{
    $postManager = new PostManager(); // Création d'un objet
    $posts = $postManager->getPosts(); // Appel d'une fonction de cet objet

    require('view/frontend/listPostsView.php');
}

function post()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);

    require('view/frontend/postView.php');
}

function addComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();

    $affectedLines = $commentManager->postComment($postId, $author, $comment);

    if ($affectedLines === false) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function comment($id)
{
    $commentManager = new CommentManager();
    $comment = $commentManager->getComment($id);

    require('view/frontend/modifPostView.php');
}

function modifComment($id)
{
    $commentManager = new CommentManager();

    $commentContent = $_POST['comment'];
    $postId = $commentManager->getComment($id)['post_id'];

    $commentManager->setComment($id, $commentContent);


    if ($affectedLines === false) {
        throw new Exception('Impossible de modifier le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $postId);
    }


}