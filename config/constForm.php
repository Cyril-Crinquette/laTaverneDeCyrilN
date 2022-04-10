<!---------------------------------------------- Définition de constantes qui sont des REGEX --------------------------------------------->

<?php

define('REG_EXP_PASSWORD','^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$');
define('REG_EXP_LOGIN', '^[a-zA-ZÀ-ÿ0-9. -\']*$' );