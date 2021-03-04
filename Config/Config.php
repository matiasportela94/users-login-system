<?php namespace Config;

define("ROOT", dirname(__DIR__) . "/");
//Path to your project's root folder
define("FRONT_ROOT","/PROJECTS/log-in" . "/");
define("VIEWS_PATH", "Views/");
define("DATA_PATH", "Data/");
define("CSS_PATH", FRONT_ROOT.VIEWS_PATH . "css/");
define("IMG_PATH", FRONT_ROOT.VIEWS_PATH . "img/");
define("JS_PATH", FRONT_ROOT.VIEWS_PATH . "js/");
define("FONTAWESOME_PATH", FRONT_ROOT.VIEWS_PATH . "fontawesome/css/all.css");
define("MDB_PATH", FRONT_ROOT.VIEWS_PATH . "MDB/css/mdb.min.css");
define("LITY_PATH", FRONT_ROOT.VIEWS_PATH . "lity/");
define("PHPMAILER_PATH", FRONT_ROOT. "vendor/");

//MAILBOXLAYER EMAIL VERIFICATION API KEY
define("EMAIL_VERIFICATION_APIKEY", 'YOUR_API_KEY');
define("USER_EMAIL", 'your@mail.com');
define("USER_PW", 'secret');

define("DB_HOST", "localhost");
define("DB_NAME", "log_in_system");
define("DB_USER", "root");
define("DB_PASS", "");
?>




