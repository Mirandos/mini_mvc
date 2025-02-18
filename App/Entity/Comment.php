<?php 
namespace App\Entity;

class Comment extends Entity{
    protected ?int $id = null;
    protected ?string $comment = '';
    protected ?int $user_id = null;
    protected ?int $article_id = null;

    /**
     * Get the value of id
     *
     * @return  null|int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @param  null|int  $id
     *
     * @return  self
     */
    public function setId( $id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of comment
     *
     * @return  null|string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @param  null|string  $comment
     *
     * @return  self
     */
    public function setComment( $comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get the value of user_id
     *
     * @return  null|int
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of user_id
     *
     * @param  null|int  $user_id
     *
     * @return  self
     */
    public function setUserId( $user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of article_id
     *
     * @return  null|int
     */
    public function getArticleId()
    {
        return $this->article_id;
    }

    /**
     * Set the value of article_id
     *
     * @param  null|int  $article_id
     *
     * @return  self
     */
    public function setArticleId( $article_id)
    {
        $this->article_id = $article_id;

        return $this;
    }

    public function validate(): array
    {
        $errors = [];
        if (empty($this->getComment())) {
            $errors['comment'] = 'Le champ comment ne doit pas être vide';
        }
        if (empty($this->getUserId())) {
            $errors['user_id'] = 'Le champ user_id ne doit pas être vide';
        } 
        if (empty($this->getArticleId())) {
            $errors['article_id'] = 'Le champ article_id ne doit pas être vide';
        }     
        return $errors;
    }
}