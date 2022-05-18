<?php

require_once(dirname(__FILE__) . '/../utils/tavern-connection.php');


class Article
{
    //déclaration d’attributs spécifiques à la classe 'Article' ---------------------------
    private int $_id;
    private int $_id_users;
    private int $_id_categories;
    private string $_title;
    private string $_content;
    private string $_publicated_at;
    private string $_archived_at;
    private string $_deleted_at;
    private object $_pdo;
    // -------------------------------------------------------------------------------------

    //MAGIC METHOD CONSTRUCT----------------------------------------------------------------

    public function __construct(int $id_users = 0, int $id_categories = '', string $title = '', string $content = '', string $publicated_at = '')
    {
        $this->setIdUsers($id_users);
        $this->setIdCategories($id_categories);
        $this->setTitle($title);
        $this->setContent($content);
        $this->setPublicatedAt($publicated_at);
        $this->_pdo = Database::dbConnect();
    }
    //----------------------------------------------------------------------------------------

    // GETTER -------------------------------------------------------------------------------

    public function getId(): int
    {
        return $this->_id;
    }

    public function getIdUsers(): int
    {
        return $this->_id_users;
    }

    public function getIdCategories(): int
    {
        return $this->_id_categories;
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

    public function getPublicatedAt(){
        return $this->_publicated_at;
    }

    public function getArchivedAt(){
        return $this->_archivated_at;
    }

    public function getDeletedAt(){
        return $this->_deleted_at;
    }

    //--------------------------------------------------------------------------------------------

    // SETTER ------------------------------------------------------------------------------------

    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    public function setIdUsers(int $id_users): void
    {
        $this->_id_users = $id_users;
    }

    public function setIdCategories(int $id_categories): void
    {
        $this->_id_categories = $id_categories;
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

    public function setPublicatedAt(string $publicated_at): void
    {
        $this->_publicated_at = $publicated_at;
    }

    public function setArchivedAt(string $archived_at): void
    {
        $this->_archived_at = $archived_at;
    }

    public function setDeletedAt(string $deleted_at): void
    {
        $this->_deleted_at = $deleted_at;
    }
    //-----------------------------------------------------------------------------------------------

    // Méthode isArticleExists permettant de vérifier l'existence d'un article ---------------

    public static function isArticleExists(string $title): bool
    {
        try {
            $sql = 'SELECT * FROM `articles` 
                    WHERE `title` = :title';

            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue(':title', $title, PDO::PARAM_STR);
            $sth->execute();

            return empty($sth->fetchAll()) ? false : true;

        } catch (\PDOException $e) {
            return false;
        }
    }
    //--------------------------------------------------------------------------------------------

    // Méthode save permettant d'enregistrer l'article dans la base de données ---------------

    public function save(){
        try {
            // On créé la requête avec des marqueurs nominatifs
            $sql = 'INSERT INTO `articles` (`id_users`, `id_categories`,`title`, `content`, `publicated_at`) 
                    VALUES (:id_users, :id_categories, :title, :content, :publicated_at);';

            // On prépare la requête
            $sth = Database::dbConnect()->prepare($sql);

            //Affectation des valeurs aux marqueurs nominatifs
            $sth->bindValue('id_users', $this->getIdUsers(), PDO::PARAM_INT);
            $sth->bindValue('id_categories', $this->getIdCategories(), PDO::PARAM_INT);
            $sth->bindValue(':title', $this->getTitle(), PDO::PARAM_STR);
            $sth->bindValue(':content', $this->getContent(), PDO::PARAM_STR);
            $sth->bindValue(':publicated_at', $this->getPublicatedAt(), PDO::PARAM_STR);
            // On retourne directement true si la requête s'est bien exécutée ou false dans le cas contraire
            return $sth->execute();
        } catch (PDOException $e) {
            // On retourne false si une exception est levée
            return false;
        }
    }
    //-------------------------------------------------------------------------------------------------------

    // Méthode getById permettant d'obtenir les informations d'un article à partir de son id---------------

    public static function getById(int $id): object{
        try {
            $sql = 'SELECT * FROM `articles` 
                    WHERE `id` = :id';

            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_STR);
            $result = $sth->execute();
            $article = $result->fetch();

            if(!$article){
                throw new PDOException('L\'article n\'a pas été trouvé');
            } else {
                return $article;
            }

        } catch (\PDOException $e) {
            return $e;
        }
    }
    //-----------------------------------------------------------------------------------------------------

    // Méthode update permettant de modifier un article à partir de son id--------------------------

    public function update($id): mixed
    {
        try {
            $sql = 'UPDATE `articles` 
                    SET `id_users` = :id_users, `id_categories` = :id_categories, `title` = :title, `content` = :content, `publicated_at` = :publicated_at
                    WHERE `id` = :id';

            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue('id_users', $this->getIdUsers(), PDO::PARAM_INT);
            $sth->bindValue('id_categories', $this->getIdCategories(), PDO::PARAM_INT);
            $sth->bindValue(':title', $this->getTitle(), PDO::PARAM_STR);
            $sth->bindValue(':content', $this->getContent(), PDO::PARAM_STR);
            $sth->bindValue(':publicated_at', $this->getPublicatedAt(), PDO::PARAM_STR);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $result = $sth->execute();
            return $result;

        } catch (PDOException $e) {
            return false;
        }
    }
    //-----------------------------------------------------------------------------------------------------

    // Méthode delete permettant de supprimer un article --------------------------------------------------

    public static function delete($id):bool{
        $sql = 'DELETE FROM `articles`
                WHERE `articles`.`id` = :id';
        $sth = Database::dbconnect() -> prepare($sql);
        $sth -> bindValue(':id', $id, PDO::PARAM_INT);
        $sth -> execute();
        $total = $sth -> rowCount();
        return ($total <=0) ? FALSE : TRUE;
    }
    //-----------------------------------------------------------------------------------------------------

    // Méthode getAll permettant d'obtenir les informations de tous les articles ------------------------

    public static function getAll():array{
        try {
            $sql = 'SELECT `id`, `id_users`, `id_categories`, `title`, `content`, `publicated_at` 
                    -- `content` AS `contentRemark`
                    FROM  `articles` 
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
