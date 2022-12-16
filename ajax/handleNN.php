<?php
session_start();
require_once("../libs/helper.php");
require_once("../libs/db.php");
$db = new DB();
if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
    switch ($_POST['action']) {
        case 'delete':
            $id = $_POST['id'];
            $sql = "DELETE FROM nhacnho WHERE id_nn = $id";
            $db->handleSQL($sql);

            die(json_encode([
                'status' => 'success'
            ]));
            break;
        default:
            # code...
            break;
    }
}
