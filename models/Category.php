<?php

require_once(dirname(__FILE__) . '/../utils/tavern-connection.php');


class Category{

    // Déclaration d’attributs spécifiques à la classe 'Category' ---------------------------
    private int $_id;
    private string $_name;


    // Setter
    public function getId(): int
    {
        return $this->_id;
    }

    public function getName(): string
    {
        return $this->_name;
    }


    // Getter
    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    public function setIdRoles(int $name): void
    {
        $this->_name = $name;
    }


    // Méthode getAll permettant d'obtenir les informations de toutes les catégories ------------------------

    public static function getAll():array{
        try {
            $sql = 'SELECT `id`, `name` 
                    -- `content` AS `contentRemark`
                    FROM  `categories` 
                    -- JOIN `remarks` 
                    -- ON `users`.`id` = `remarks`.`id_users`
                    ';
            $sth = Database::dbconnect() -> prepare($sql);
            $verif = $sth -> execute();
            if (!$verif) {
                throw new PDOException('La requête n\'a pas été exécutée');
            } else {
                $allCategories = $sth -> fetchAll();
            }
        } catch (PDOException $e) {
            return [];   
        }
        return $allCategories;
    }
    //-----------------------------------------------------------------------------------------------------

    // Méthode getOne permettant d'obtenir une catégorie à partir de son id ------------------------------------

    public static function getOne(int $id): object{
        try {
            $sql = 'SELECT * FROM `categories` 
                    WHERE `categories`.`id` = :id';

            $sth = Database::dbConnect()->prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_INT);
            $sth->execute();
            $category = $sth->fetch();

            if(!$category){
                throw new PDOException('La catégorie n\'existe pas');
            } else {
                return $category;
            }

        } catch (\PDOException $e) {
            return $e;
        }
    }
    //-----------------------------------------------------------------------------------------------------

}

