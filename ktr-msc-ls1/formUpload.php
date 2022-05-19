<?php
spl_autoload_register(function ($className) {
     include ("{$className}.class.php");
 });
require_once('watchdog.php');
require('pageFormUpload.php');
?>