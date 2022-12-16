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
        case 'addLH':
            $user_id = $_POST['user_id'];
            $tenmon = $_POST['tenmon'];
            $phonghoc = $_POST['phonghoc'];
            $tietbd = $_POST['tietbd'];
            $sotiet = $_POST['sotiet'];
            $thu = $_POST['thu'];

            $sql = "INSERT INTO lichhoc VALUES(null,$user_id,'$tenmon','$phonghoc',$tietbd,$sotiet,$thu)";
            // die($sql);
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
