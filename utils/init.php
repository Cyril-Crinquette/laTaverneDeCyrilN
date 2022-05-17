<?php

// Fonction permettant d'être au fuseau horaire de Paris
date_default_timezone_set('Europe/Paris');

session_start();

require_once (dirname(__FILE__) . '/../config/constBase.php');
require_once (dirname(__FILE__) . '/../helpers/sessionFlash.php');
require_once(dirname(__FILE__) . '/../config/constForm.php');
require_once(dirname(__FILE__) . '/tavern-connection.php');
require_once(dirname(__FILE__) . '/commonVar.php');


require_once(dirname(__FILE__) . '/../models/Category.php');
$categories = Category::getAll();
