<?php

require_once(dirname(__FILE__) . '/../utils/tavern-connection.php');


class Category{

    // Déclaration d’attributs spécifiques à la classe 'Category' ---------------------------
    private int $_id;
    private string $_name;
    private string $_content;



    // Setter
    public function getId(): int
    {
        return $this->_id;
    }

    public function getName(): string
    {
        return $this->_name;
    }

    public function getContent(): string
    {
        return $this->_content;
    }


    // Getter
    public function setId(int $id): void
    {
        $this->_id = $id;
    }

    public function setName(string $name): void
    {
        $this->_name = $name;
    }

    public function setContent(string $content): void
    {
        $this->_content = $content;
    }


    // Méthode getAll permettant d'obtenir les informations de toutes les catégories ------------------------

    public static function getAll():array{
        try {
            $sql = 'SELECT `id`, `name`, `content` 
                    FROM  `categories` 
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

    // Méthode getArticlesById permettant d'obtenir les articles d'une catégorie ------------------------

    public static function getArticlesById(int $id):array{
        try {
            $sql = 'SELECT    
                    `articles`.`id`, 
                    `articles`.`title`, 
                    `articles`.`content`, 
                    `articles`.`publicated_at`,
                    `users`.`pseudo` AS `author` 
                    FROM `articles` 
                    JOIN `categories` 
                    ON `articles`.`id_categories` = `categories`.`id` 
                    JOIN `users` 
                    ON `articles`.`id_users` = `users`.`id`
                    WHERE `categories`.`id` = :id';
            $sth = Database::dbconnect() -> prepare($sql);
            $sth->bindValue(':id', $id, PDO::PARAM_STR);
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

