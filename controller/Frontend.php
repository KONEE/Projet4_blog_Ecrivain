<?php
namespace controller;

use model\PostManager;
use model\BddManager;
use PDO;


class Frontend {

            function listPosts()
            {
               // var_dump(new PostManager());
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
                }
                else {
                    header('Location: index.php?action=post&id=' . $postId);
                }
            }

            function showAbout(){ }
            function showContact(){}

}