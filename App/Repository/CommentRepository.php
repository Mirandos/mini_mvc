<?php 
namespace App\Repository;

use App\Entity\Comment;
use App\Db\Mysql;
use App\Tools\StringTools;

class CommentRepository extends Repository{
    public function findAll()
    {
        $query = $this->pdo->prepare("SELECT * FROM comment");
        $query->execute();
        $comments = $query->fetchAll($this->pdo::FETCH_ASSOC);
        $commentsObjects = [];
        foreach($comments as $comment) {
            $commentsObjects[] = Comment::createAndHydrate($comment);;
        }
        return $commentsObjects;
    }

    public function findByArticleId(int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM comment WHERE article_id = :id");
        $query->bindValue(":id", $id, $this->pdo::PARAM_INT);
        $query->execute();
        $comments = $query->fetchAll($this->pdo::FETCH_ASSOC);
        $commentsObjects = [];
        foreach($comments as $comment) {
            $commentsObjects[] = Comment::createAndHydrate($comment);;
        }
        return $commentsObjects;
    }

    public function addComment (Comment $comment)
    {
        $query = $this->pdo->prepare("INSERT INTO comment (comment, user_id, article_id) VALUES (:comment, :user_id, :article_id)");
        $query->bindValue(":comment", $comment->getComment(), $this->pdo::PARAM_STR);
        $query->bindValue(":user_id", $comment->getUserid(), $this->pdo::PARAM_INT);
        $query->bindValue(":article_id", $comment->getArticleid(), $this->pdo::PARAM_INT);
        $query->execute();
    }
}