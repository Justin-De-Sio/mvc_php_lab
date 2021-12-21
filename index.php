<?php
require('controller/frontend.php');

try { // On essaie de faire des choses
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                // Erreur ! On arrête tout, on envoie une exception, donc au saute directement au catch
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    // Autre exception
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                // Autre exception
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        } elseif ($_GET['action'] == 'comment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                comment($_GET['id']);
            } else {
                throw new Exception('Impossible de modifier');
            }
        } elseif ($_GET['action'] == 'modifComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                modifComment($_GET['id']);
            } else {
                throw new Exception('Impossible de modifier');
            }

        }

    } else {
        listPosts();
    }
} catch (Exception $e) { // S'il y a eu une erreur, alors...
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}
