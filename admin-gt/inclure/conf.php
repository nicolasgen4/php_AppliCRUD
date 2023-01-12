<?php

//Gestion des BDD
define('DEV', true);

if (DEV) {
    define('DBHOST', 'localhost');
    define('DBNAME', '');
    define('DBUSER', 'root');
    define('DBPASSWORD', '');
} else {
    define('DBHOST', '');
    define('DBNAME', '');
    define('DBUSER', '');
    define('DBPASSWORD', '');
}
