<?php
    $root = dirname($_SERVER['PHP_SELF'] ) == DIRECTORY_SEPARATOR ? '' : dirname($_SERVER['PHP_SELF']);
    define('DOMAIN', str_replace('/controller','',$root));
?>