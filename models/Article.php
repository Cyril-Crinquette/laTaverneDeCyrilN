<?php

require_once(dirname(__FILE__) . '/../utils/tavern-connection.php');


class Article
{
    //déclaration d’attributs spécifiques à la classe 'Article' ---------------------------
    private string $_id;
    private string $_title;
    private string $_content;
    // -------------------------------------------------------------------------------------

    //MAGIC METHOD CONSTRUCT----------------------------------------------------------------

    public function __construct(string $title = '', string $content = '')
    {
        $this->setTitle($title);
        $this->setContent($content);
        $this->_pdo = Database::dbConnect();
    }
    //----------------------------------------------------------------------------------------

    // GETTER -------------------------------------------------------------------------------

    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * GETTER pour l'attribut '_title' de 'Article'
     * @return string
     */
    public function getTitle(): string
    {
        return $this->_title;
    }

    public function getContent(): string
    {
        return $this->_content;
    }
    //--------------------------------------------------------------------------------------------

    // SETTER ------------------------------------------------------------------------------------

    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    /**
     * SETTER pour l'attribut privé _title
     * @param string $title
     * @return void
     */
    public function setTitle(string $title): void
    {
        $this->_title = $title;
    }

    public function setContent(string $content): void
    {
        $this->_content = $content;
    }
    //-----------------------------------------------------------------------------------------------

}