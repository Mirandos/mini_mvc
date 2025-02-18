<?php 
namespace App\Entity;

class Article extends Entity{
    protected ?int $id = null;
    protected ?string $title = '';
    protected ?string $description = '';


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
     * Get the value of title
     *
     * @return  null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set the value of nom
     *
     * @param  null|string  $title
     *
     * @return  self
     */
    public function setTitle( $title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get the value of description
     *
     * @return  null|string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @param  null|string  $description
     *
     * @return  self
     */
    public function setDescription( $description)
    {
        $this->description = $description;

        return $this;
    }

 

    public function validate(): array
    {
        $errors = [];
        if (empty($this->getTitle())) {
            $errors['nom'] = 'Le champ nom ne doit pas être vide';
        }
        if (empty($this->getDescription())) {
            $errors['description'] = 'Le champ description ne doit pas être vide';
        }     
        return $errors;
    }

    
}