<?php
// 1. Define Constants
define('APPROOT', dirname(__FILE__));
define('URLROOT', 'http://localhost/ETMS_v1/Public');
define('SITENAME', 'CLIMA TRACK');

// 2. LOAD THE SESSION HELPER (This fixes the Flash error!)
require_once APPROOT . '/helpers/session_helper.php';

// 3. Load Core Libraries
require_once APPROOT . '/core/App.php';
require_once APPROOT . '/core/Controller.php';
require_once APPROOT . '/core/Database.php';

spl_autoload_register(function($className){
    if(file_exists(APPROOT . '/core/' . $className . '.php')){
        require_once APPROOT . '/core/' . $className . '.php';
    }
});