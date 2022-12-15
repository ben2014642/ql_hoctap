<?php
require_once(__DIR__.'/libs/db.php');
require_once(__DIR__.'/libs/helper.php');
$view = isset($_GET['view']) ? $_GET['view'] : 'client';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

$path = 'resources/view/'.$view.'/'.$action.'.php';
$BB = new DB();
if (file_exists($path)) {
    require_once(__DIR__.'/'.$path);
} else {
    require_once(__DIR__.'/resources/view/404.php');
}

?>