<?php

require_once(dirname(__FILE__) . '/../utils/tavern-connection.php');


class User
{
    //déclaration d’attributs spécifiques à la classe 'User' ------------------------------
    private int $_id;
    private int $_id_roles;
    private string $_pseudo;
    private string $_email;
    private string $_password;
    private string $_description;
    private string $_registered_at;
    private ?string $_validated_at;
    private object $_pdo;
    // -------------------------------------------------------------------------------------

    //MAGIC METHOD CONSTRUCT----------------------------------------------------------------

    public function __construct(int $id_roles = '', string $pseudo = '', string $email = '', string $password = '', string $description = '', ?string $validated_at = NULL)
    {
        $this->setIdRoles($id_roles);
        $this->setPseudo($pseudo);
        $this->setEmail($email);
        $this->setPassword($password);
        $this->setDescription($description);
        $this->setValidatedAt($validated_at);
        $this->_pdo = Database::dbConnect();
    }
    //----------------------------------------------------------------------------------------

    // GETTER -------------------------------------------------------------------------------

    public function getId(): int
    {
        return $this->_id;
    }

    public function getIdRoles(): int
    {
        return $this->_id_roles;
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

    public function getValidatedAt(){
        return $this->_validated_at;
    }
    //----------------------------------------------------------------------------------------

    // SETTER --------------------------------------------------------------------------------

    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    public function setIdRoles(int $id_roles): void
    {
        $this->_id_roles = $id_roles;
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

    public function setValidatedAt(string $validated_at): void
    {
        $this->_validated_at = $validated_at;
    }
    //----------------------------------------------------------------------------------------

    // Méthode isMailExists permettant de vérifier l'existence d'un utilisateur ---------------

    public static function isMailExists(string $email): bool
    {
        try {
            $sql = 'SELECT * FROM `users` 
                    WHERE `email` = :email';

            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
            $sth->execute();

            return empty($sth->fetchAll()) ? false : true;

        } catch (\PDOException $e) {
            return false;
        }
    }
    //--------------------------------------------------------------------------------------------
    
    // Méthode save permettant d'enregistrer l'utilisateur dans la base de données ---------------

    public function save(){
        try {
            // On créé la requête avec des marqueurs nominatifs
            $sql = 'INSERT INTO `users` (`id_roles`,`pseudo`, `email`, `password`,`description`, `validated_at`) 
                    VALUES (:id_roles, :pseudo, :email, :password, :description, :validated_at);';

            // On prépare la requête
            $sth = Database::dbConnect()->prepare($sql);

            //Affectation des valeurs aux marqueurs nominatifs
            $sth->bindValue('id_roles', $this->getIdRoles(), PDO::PARAM_INT);
            $sth->bindValue(':pseudo', $this->getPseudo(), PDO::PARAM_STR);
            $sth->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $sth->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);
            $sth->bindValue(':description', $this->getDescription(), PDO::PARAM_STR);
            $sth->bindValue(':validated_at', $this->getValidatedAt(), PDO::PARAM_STR);
            // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
            return $sth->execute();
        } catch (PDOException $e) {
            // On retourne false si une exception est levée
            return false;
        }
    }
    //-------------------------------------------------------------------------------------------------------
    
    // Méthode getByEmail permettant d'obtenir les informations d'un utilisateur à partir de son email---------------

    public static function getByEmail(string $email): object{
        try {
            $sql = 'SELECT * FROM `users` 
                    WHERE `email` = :email';

            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue(':email', $email, PDO::PARAM_STR);
            $result = $sth->execute();
            $user = $result->fetch();

            if(!$user){
                throw new PDOException('L\'utilisateur n\'a pas été trouvé');
            } else {
                return $user;
            }

        } catch (\PDOException $e) {
            return $e;
        }
    }
    //-----------------------------------------------------------------------------------------------------

    // Méthode update permettant de modifier les informations d'un utilisateur à partir de son id---------------

    public function update($id): mixed
    {
        try {
            $sql = 'UPDATE `users` 
                    SET `id_roles` = :id_roles, `pseudo` = :pseudo, `email` = :email, `password` = :password, `description` = :description, `validated_at` = :validated_at
                    WHERE `id` = :id';

            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue('id_roles', $this->getIdRoles(), PDO::PARAM_INT);
            $sth->bindValue(':pseudo', $this->getPseudo(), PDO::PARAM_STR);
            $sth->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
            $sth->bindValue(':password', $this->getPassword(), PDO::PARAM_STR);
            $sth->bindValue(':description', $this->getDescription(), PDO::PARAM_STR);
            $sth->bindValue(':validated_at', $this->getValidatedAt(), PDO::PARAM_STR);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $result = $sth->execute();
            return $result;

        } catch (PDOException $e) {
            return false;
        }
    }
    //-----------------------------------------------------------------------------------------------------
    
    // Méthode delete permettant de supprimer un utilisateur ----------------------------------------------

    public static function delete($id):bool{
        $sql = 'DELETE FROM `users`
                WHERE `users`.`id` = :id';
        $sth = Database::dbconnect() -> prepare($sql);
        $sth -> bindValue(':id', $id, PDO::PARAM_INT);
        $sth -> execute();
        $total = $sth -> rowCount();
        return ($total <=0) ? FALSE : TRUE;
    }
    //-----------------------------------------------------------------------------------------------------

    // Méthode getAll permettant d'obtenir les informations de tous les utilisateurs ------------------------

    public static function getAll():array{
        try {
            $sql = 'SELECT `id`, `pseudo`, `email`, `validated_at` 
                    -- `content` AS `contentRemark`
                    FROM  `users` 
                    -- JOIN `remarks` 
                    -- ON `users`.`id` = `remarks`.`id_users`
                    ';
            $sth = Database::dbconnect() -> prepare($sql);
            $verif = $sth -> execute();
            if (!$verif) {
                throw new PDOException('La requête n\'a pas été exécutée');
            } else {
                $all = $sth -> fetchAll();
            }
        } catch (PDOException $e) {
            return [];   
        }
        return $all;
    }
    //-----------------------------------------------------------------------------------------------------

}
