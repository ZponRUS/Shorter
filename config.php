<?
    include "resources/rb.php";

    define('HOST', '127.0.0.1');
    define('DB_NAME', 'shorterdb');
    define('USER', 'root');
    define('PASS', '');

    R::setup( 'mysql:host='.HOST.';dbname='.DB_NAME, USER, PASS );
?>