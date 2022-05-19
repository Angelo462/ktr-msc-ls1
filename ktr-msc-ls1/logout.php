<?php
require_once("DataLayer.class.php");
$data = new DataLayer();

require_once("watchdog.php");
unset($_SESSION["ident"]); 
;
session_destroy();
require("pageLogout.php");
?>