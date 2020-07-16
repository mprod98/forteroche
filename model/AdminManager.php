<?php 
class AdminManager extends Manager
{

    public function getLogin($login)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM users WHERE login = :login');
        $req->execute(array(
           'login' => $login));
        $loginAdmin = $req->fetch();

        return $loginAdmin;
    }

    public function getReportingAdmin()
    {
        $db = $this->dbConnect();
        $reporting = $db->prepare('SELECT * FROM posts AS p INNER JOIN comments AS c ON c.post_id = p.id INNER JOIN reporting AS r ON c.id = r.comment_id');
        $reporting->execute();

        return $reporting;
    }

    public function setDeleteReport($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id = ?');
        $deleteComment = $req->execute(array($commentId));

        if ($deleteComment === false) {
            throw new Exception('Impossible de supprimer le commentaire !');
        }
        else {
            $req = $db->prepare('DELETE FROM reporting WHERE comment_id = ?');
            $deleteReporting = $req->execute(array($commentId));

            return $deleteReporting;
        }
    }

    public function setCancelReport($reportId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM reporting WHERE id = ?');
        $deleteReporting = $req->execute(array($reportId));

        return $deleteReporting;
    }

    public function setNewPost()
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, content, creation_date) VALUES (?, ?, ADDTIME(NOW(), "2:00"))');
        $affectedLines = $req->execute(array($_POST['title'], $_POST['chapterContent']));

        return $affectedLines;
    }

    public function setChangePost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title = ?, content=?, creation_date=ADDTIME(NOW(), "2:00")  WHERE `posts`.`id` = ?');
        $affectedLines = $req->execute(array($_POST['title'], $_POST['chapterContent'], $postId));

        return $affectedLines;
    }

    public function setDeletePost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $affectedLines = $req->execute(array($postId));

        if ($affectedLines === false) {
            throw new Exception('Impossible de supprimer le chapitre !');
        }
        else {
            $comments = $db->prepare('SELECT * FROM comments WHERE post_id = ?');
            $comments->execute(array($postId));
        }
    }
}