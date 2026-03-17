<?php

// Path to the 'app' folder on your hard drive
define('APPROOT', dirname(__FILE__));

// URL Root (for your CSS/JS links)
define('URLROOT', 'http://localhost/ETMS_v1/Public');

// Site Name
define('SITENAME', 'CLIMA TRACK');

// Now load the core libraries
require_once APPROOT . '/core/App.php';
require_once APPROOT . '/core/Controller.php';
require_once APPROOT . '/core/Database.php';