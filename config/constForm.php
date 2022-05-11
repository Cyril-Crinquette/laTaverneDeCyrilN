<!---------------------------------------------- Définition de constantes qui sont des REGEX --------------------------------------------->

<?php

define('REG_EXP_PASSWORD','^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$');
define('REG_EXP_LOGIN', '^[a-zA-ZÀ-ÿ0-9. -\']*$' );
define('REG_EXP_NO_NUMBER',"^[a-zA-ZàâæçéèêëîïôœùûüÿÀÂÆÇÉÈÊËÎÏÔŒÙÛÜŸ '-]*$");
define('REG_EXP_TEXTAREA','^[a-zA-Z\n\r]*$');
define('REG_EXP_PHONE','^[0-9]{10}$');
define('REG_EXP_LINKEDIN','^(https:\/\/)?((www\.|fr\.)?([a-zA-Z0-9\.\/=\?\-]*))$');
define('REG_EXP_DATE','^([0-9]{4})[\/\-]?([0-9]{2})[\/\-]?([0-9]{2})$');
define('REG_EXP_TIME', "^[0-9]{2}:[0-9]{2}$");
define('REG_EXP_SEARCH', '[0-9a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð@. -]{0,100}');


//-------------------------------------------- Autres constantes --------------------------------------------->

define('AUTHORIZED_IMAGE_FORMAT', ['image/jpeg', 'image/png']);
