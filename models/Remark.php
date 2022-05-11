<?php

require_once(dirname(__FILE__) . '/../utils/tavern-connection.php');


class Remark
{
    //déclaration d’attributs spécifiques à la classe 'Remark' ---------------------------
    private string $_id;
    private string $_content;
    // -------------------------------------------------------------------------------------

    //MAGIC METHOD CONSTRUCT----------------------------------------------------------------

    public function __construct(string $content = '')
    {
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
     * GETTER pour l'attribut '_content' de 'Article'
     * @return string
     */
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
     * SETTER pour l'attribut privé _content
     * @param string $content
     * @return void
     */
    public function setContent(string $content): void
    {
        $this->_content = $content;
    }
    //-----------------------------------------------------------------------------------------------

}