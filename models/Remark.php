<?php

require_once(dirname(__FILE__) . '/../utils/tavern-connection.php');


class Remark
{
    //déclaration d’attributs spécifiques à la classe 'Remark' ---------------------------
    private string $_id;
    private int $_id_articles;
    private int $_id_users;
    private string $_content;
    private string $_actived;
    private string $_publicated_at;
    private string $_archivated_at;
    private object $_pdo;
    // -------------------------------------------------------------------------------------

    //MAGIC METHOD CONSTRUCT----------------------------------------------------------------

    public function __construct(int $id_articles = '', int $id_users = '', string $content = '', string $publicated_at = '')
    {
        $this->setIdArticles($id_articles);
        $this->setIdUsers($id_users);
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

    public function getIdArticles(): int
    {
        return $this->_id_articles;
    }

    public function getIdUsers(): int
    {
        return $this->_id_users;
    }
    /**
     * GETTER pour l'attribut '_content' de 'Article'
     * @return string
     */
    public function getContent(): string
    {
        return $this->_content;
    }

    public function getPublicatedAt(){
        return $this->_publicated_at;
    }

    public function getActived(){
        return $this->_actived;
    }

    public function getArchivedAt(){
        return $this->_archivated_at;
    }
    //--------------------------------------------------------------------------------------------

    // SETTER ------------------------------------------------------------------------------------

    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    public function setIdArticles(int $id_articles): void
    {
        $this->_id_articles = $id_articles;
    }

    public function setIdUsers(int $id_users): void
    {
        $this->_id_users = $id_users;
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

    public function setPublicatedAt(string $publicated_at): void
    {
        $this->_publicated_at = $publicated_at;
    }

    public function setActived(string $actived): void
    {
        $this->_actived = $actived;
    }

    public function setArchivedAt(string $archived_at): void
    {
        $this->_archived_at = $archived_at;
    }
    //-----------------------------------------------------------------------------------------------

    // Méthode isRemarkExists permettant de vérifier l'existence d'un commentaire ---------------

    public static function isRemarkExists(int $id): bool
    {
        try {
            $sql = 'SELECT * FROM `remarks` 
                    WHERE `id` = :id';

            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_STR);
            $sth->execute();

            return empty($sth->fetchAll()) ? false : true;

        } catch (\PDOException $e) {
            return false;
        }
    }
    //--------------------------------------------------------------------------------------------

    // Méthode save permettant d'enregistrer le commentaire dans la base de données ---------------

    public function save(){
        try {
            // On créé la requête avec des marqueurs nominatifs
            $sql = 'INSERT INTO `remarks` (`id_articles`, `id_users`, `content`, `publicated_at`) 
                    VALUES (:id_articles, :id_users, :content, :publicated_at);';

            // On prépare la requête
            $sth = Database::dbConnect()->prepare($sql);

            //Affectation des valeurs aux marqueurs nominatifs
            $sth->bindValue(':title', $this->getIdArticles(), PDO::PARAM_INT);
            $sth->bindValue('id_users', $this->getIdUsers(), PDO::PARAM_INT);
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

    // Méthode getById permettant d'obtenir les informations d'un commentaire à partir de son id---------------

    public static function getById(int $id): object{
        try {
            $sql = 'SELECT * FROM `remarks` 
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

    // Méthode update permettant de modifier un commentaire à partir de son id--------------------------

    public function update($id): mixed
    {
        try {
            $sql = 'UPDATE `remarks` 
                    SET `id_articles` = :id_articles, `id_users` = :id_users, `content` = :content, `publicated_at` = :publicated_at
                    WHERE `id` = :id';

            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue(':id_articles', $this->getIdArticles(), PDO::PARAM_STR);
            $sth->bindValue('id_users', $this->getIdUsers(), PDO::PARAM_INT);
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

    // Méthode delete permettant de supprimer un commentaire --------------------------------------------------

    public static function delete($id):bool{
        $sql = 'DELETE FROM `remarks`
                WHERE `remarks`.`id` = :id';
        $sth = Database::dbconnect() -> prepare($sql);
        $sth -> bindValue(':id', $id, PDO::PARAM_INT);
        $sth -> execute();
        $total = $sth -> rowCount();
        return ($total <=0) ? FALSE : TRUE;
    }
    //-----------------------------------------------------------------------------------------------------

    // Méthode getAll permettant d'obtenir les informations de tous les commentaires ------------------------

    public static function getAll():array{
        try {
            $sql = 'SELECT `id`, `id_articles`, `id_users`, `content`, `publicated_at` 
                    FROM  `remarks` 
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