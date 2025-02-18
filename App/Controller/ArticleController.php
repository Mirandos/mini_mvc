<?php

namespace App\Controller;

use App\Repository\ArticleRepository;
use App\Repository\CommentRepository;
use App\Entity\Article;
use App\Entity\Comment;
use Exception;

class ArticleController extends Controller{
    public function route(): void
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'list':
                        $this->list();
                        break;
                    case 'show':
                        $this->show();
                        break;
                    default:
                        throw new Exception("Cette action n'existe pas : " . $_GET['action']);
                        break;
                }
            } else {
                throw new Exception("Aucune action détectée");
            }
        } catch (Exception $e) {
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);
        }
    }

    protected function list(){
        try{
            $articles = [];
            $articleRepo = new ArticleRepository();

            $articles = $articleRepo->findAll();
            $this->render('article/list', [
                'articles' => $articles
            ]);

            }
            catch(Exception $e){
                $this->render('errors/default', [
                    'error' => $e->getMessage()
                ]);

            }


        }

    protected function show(){
        try{
            $article = null;
            $comments = [];
            $articleRepo = new ArticleRepository();
            $commentRepo = new CommentRepository();
            if (isset($_GET["id"])) {
                $id = (int)$_GET["id"];
                $article = $articleRepo->findOneById($id);
            }
            if (isset($_GET["id"])) {
                $id = (int)$_GET["id"];
                $comments = $commentRepo->findByArticleId($id);
            }
            if (isset($_SESSION["user_id"])) {
                if (isset($_POST["comment"])) {
                    $comment = new Comment();
                    $comment->setComment($_POST["comment"]);
                    $comment->setUserId($_SESSION["user_id"]);
                    $comment->setArticleId($id);
                    $commentRepo->addComment($comment);
                }
            }
            $this->render('article/list_details', [
                'article' => $article,
                'comments' => $comments
            ]);
        }
        catch(Exception $e){
            $this->render('errors/default', [
                'error' => $e->getMessage()
            ]);

        }
    }
}