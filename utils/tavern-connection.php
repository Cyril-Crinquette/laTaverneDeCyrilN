<?php

require_once(dirname(__FILE__).'/../config/constBase.php');

$error = null;

class Database 
    {
        private static $pdo; // on met static car la méthode est en statique sinon message d'erreur ; 

        public static function dbConnect():object 
        {
            try {
                if (is_null(self::$pdo)) {
                    self::$pdo= new PDO(DSN, USER, PASSWORD,[ 
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
                        ]
                        );
                }
            }
            catch (PDOException $e) { 
                header('location: /erreur?error=1'); 
                exit ;
            }
            return self::$pdo;
        }
    }

