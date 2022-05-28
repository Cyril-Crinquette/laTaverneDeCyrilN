<?php

require_once(dirname(__FILE__).'/../config/constBase.php');

$error = null;


class Database 
    {

        private static $pdo; // on mets static car la méthode est en static car sinon message d'erreur ; 

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
                header('location: /controllers/error-controller.php'); /// remplacer cette url !!!!!!!!!!!!!!!!!!!!!!!
                exit ;
            }
            return self::$pdo;
        }
    }
// class Database
// {
//     private static $pdo = ;
//     public static function dbConnect(): object
//     { 
//         try {
//             if (is_null(self::$pdo)) {
//                 self::$pdo= new PDO(DSN, USER, PASSWORD,[ 
//                     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//                     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
//                     ]
//                     );
//             }
//             $pdo = new PDO(DSN, USER, PASSWORD, [
//                 PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//                 PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
//             ]);
//         } catch (PDOException $exception) {
//             header('location: /erreur?error=1');
//             exit;
//         }
//         return $pdo;
//     }
// }
