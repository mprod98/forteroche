<?php
require_once("model/Manager.php");

class CommentManager extends Manager //extension de mon manager
{
    public function getComments($postId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
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

    public function getReporting($postId)
    {
        $db = $this->dbConnect();
        $reporting = $db->prepare('SELECT * FROM posts AS p INNER JOIN comments AS c ON c.post_id = p.id INNER JOIN reporting AS r ON c.id = r.comment_id WHERE p.id = ?');
        $reporting->execute(array($postId));

        return $reporting;
    }

    public function postReporting($commentId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO reporting(comment_id, reporting_date) VALUES(?, NOW())');
        $affectedLines = $comments->execute(array($commentId));

        return $affectedLines;
    }

    public function getCheckComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT exists (SELECT * FROM comments WHERE id = ?) AS comment_exist');
        $req->execute(array($commentId));
        $check = $req->fetch();

        return $check;
    }

    public function getCheckReport($reportId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT exists (SELECT * FROM reporting WHERE id = ?) AS report_exist');
        $req->execute(array($reportId));
        $check = $req->fetch();

        return $check;
    }
}