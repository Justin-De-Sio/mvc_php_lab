<?php

namespace Funax\BlogMVC\Model;
require_once 'model/Manager.php';

class CommentManager extends Manager
{
    public function getComments($postId)
    {
        $db
            = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }


    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    public function setComment($id)
    {
        $db = $this->dbConnect();
        $comment = $db->prepare('UPDATE comments SET comment = :comment where id = :id');
        $affectedLines = $comment->execute(['id' => $id]);
        return $affectedLines;
    }
    public function getComment($id){
        $db = $this->dbConnect();
        $comment = $db->prepare('SELECT * FROM comments where  id =:id');
        $comment = $comment->execute(['id'=>$id]);
        return $comment;
    }

    public function rmComment($postId, $author, $comment)
    {
        // TODO supprimé un commentaire
    }
}