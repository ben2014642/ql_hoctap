<?php
session_start();
require_once("../libs/helper.php");
require_once("../libs/db.php");
// $BB = new DB();
if (isset($_SERVER['REQUEST_METHOD']) == 'POST') {
    // print_r($_FILES['files']);
    // die();
    $files = $_FILES['files'];
    $fileArr = [];
    $target_dir = "../public/upload/img/";
    insertNote();
    $ghichu_id = getLatestNote();
    for ($i = 0; $i < count($files['name']); $i++) {
        $fileArr[] = [
            'name' => randomName($files['name'][$i]),
            'tmp_name' => $files['tmp_name'][$i],

        ];

        $target_file = $target_dir . $fileArr[$i]['name'];
        $check = handleUploadFile($fileArr[$i], $target_file,$ghichu_id);
        if (!$check) {
            die(json_encode([
                'status' => 'error'
            ]));
        }
    }
    die(json_encode([
        'status' => 'success'
    ]));

    // $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');

    // if (!in_array($imageFileType, $allowtypes)) {
    //     $allowUpload = false;
    //     die('Chỉ được upload các định dạng JPG, PNG, JPEG, GIF');
    // }

    // if ($allowUpload) {
    //     // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
    //     if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
    //         $user_id = $_SESSION['account']['id'];
    //         $tenanh = $nameImage;
    //         $idmon = $_POST['idmon'];
    //         $ghichu = $_POST['ghichu'];
    //         $created_at = $updated_at = date('Y-m-d H:i:s');
    //         $sql = "INSERT INTO gallery VALUES(null,$user_id,$idmon,'$tenanh','$ghichu','$created_at','$updated_at')";
    //         // $BB->handleSQL($sql);
    //         die(json_encode([
    //             'status' => 'success',
    //             'sql' => $sql
    //         ]));
    //     } else {
    //         die(json_encode([
    //             'status' => 'error'
    //         ]));
    //     }
    // }
}


function randomName($name)
{
    $randomChar = '0123456789abcdefghijklmnopqrstuvwxyz';
    // $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $imageFileType = pathinfo($name, PATHINFO_EXTENSION);
    $nameImage = 'ht' . substr(str_shuffle($randomChar), 0, 6) . '.' . $imageFileType;
    // $target_file = $target_dir.$nameImage;

    return $nameImage;
}

function handleUploadFile($file, $target_file,$ghichu_id)
{
    $BB = new DB();
    $check = false;
    if (move_uploaded_file($file["tmp_name"], $target_file)) {
        $user_id = $_SESSION['account']['id'];
        $tenanh = $file['name'];
        $idmon = $_POST['idmon'];
        $ghichu = $_POST['ghichu'];
        $created_at = $updated_at = date('Y-m-d H:i:s');
        $sql = "INSERT INTO gallery VALUES(null,$user_id,$idmon,'$tenanh','$ghichu',$ghichu_id,'$created_at','$updated_at')";
        $BB->handleSQL($sql);
        $check = true;
    }

    return $check;
}

function insertNote()
{
    $BB = new DB();
    $user_id = $_SESSION['account']['id'];
    $idmon = $_POST['idmon'];
    $ghichu = $_POST['ghichu'];
    $created_at = $updated_at = date('Y-m-d H:i:s');
    $sql = "INSERT INTO ghichu VALUES(null,$user_id,'$ghichu','$idmon','$created_at','$updated_at')";
    $BB->handleSQL($sql);

}

function getLatestNote()
{
    $BB = new DB();
    $sql = "SELECT * FROM ghichu ORDER BY id DESC LIMIT 1";
    $data = $BB->getOneRowWithSQL($sql);

    return $data['id'];
}