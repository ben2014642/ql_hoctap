<?php
session_start();
require_once("../libs/helper.php");
require_once("../libs/db.php");
$db = new DB();
if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
    switch ($_POST['action']) {
        case 'searchNote':
            $keyword = $_POST['keyword'];
            $idmon = $_POST['idmon'];
            $sql = "SELECT gc.*,ac.username 
                    FROM ghichu gc JOIN account ac ON gc.userId = ac.id
                    WHERE gc.noidung LIKE '%$keyword%' AND mon_id = $idmon
                    ";
            $data = $db->getList($sql);
            
            // $cv = [];
            for ($i=0; $i < count($data); $i++) { 
                $ghichu_id = $data[$i]['id'];
                $sql = "SELECT tenanh
                    FROM gallery
                    WHERE ghichu_id = $ghichu_id
                    ";
                $arrImg = $db->getList($sql);
                $data[$i]['img'] = $arrImg;
            }
            die(json_encode($data));
            break;
        case 'addAlert':
            
            break;
        default:
            # code...
            break;
    }
}
