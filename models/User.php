<?php

require_once(dirname(__FILE__) . '/../utils/tavern-connection.php');


class User
{
    //déclaration d’attributs spécifiques à la classe 'User' ------------------------------
    private int $_id;
    private string $_pseudo;
    private string $_email;
    private string $_password;
    private string $_description;
    private object $_pdo;
    // -------------------------------------------------------------------------------------

    //MAGIC METHOD CONSTRUCT----------------------------------------------------------------

    public function __construct(string $pseudo = '', string $email = '', string $password = '', string $description = '')
    {
        $this->setPseudo($pseudo);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setDescription($description);
        $this->_pdo = Database::dbConnect();
    }
    //----------------------------------------------------------------------------------------

    // GETTER -------------------------------------------------------------------------------

    public function getId(): int
    {
        return $this->_id;
    }

    /**
     * GETTER pour l'attribut '_pseudo' de 'User'
     * @return string
     */
    public function getPseudo(): string
    {
        return $this->_pseudo;
    }

    public function getEmail(): string
    {
        return $this->_email;
    }

    public function getPassword(): string
    {
        return $this->_password;
    }

    public function getDescription(): string
    {
        return $this->_description;
    }
    //----------------------------------------------------------------------------------------

    // SETTER --------------------------------------------------------------------------------

    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    /**
     * SETTER pour l'attribut privé _pseudo
     * @param string $pseudo
     * @return void
     */
    public function setPseudo(string $pseudo): void
    {
        $this->_pseudo = $pseudo;
    }

    public function setEmail(string $email): void
    {
        $this->_email = $email;
    }

    public function setPassword(string $password): void
    {
        $this->_password = $password;
    }

    public function setDescription(string $description): void
    {
        $this->_description = $description;
    }
    //----------------------------------------------------------------------------------------



    
}