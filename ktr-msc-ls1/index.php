<?php
spl_autoload_register(function ($className) {
     include ("{$className}.class.php");
 });
require('db_params.php');
$data = new DataLayer();

require_once('watchdog.php');
require('pageAccueil.php');

?>