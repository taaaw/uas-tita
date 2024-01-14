<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-AllowHeaders, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../models/antri.php';

$database = new Database();
$db = $database->getConnection();
if(isset($_GET['id'])){
    $item = new antri($db);
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
    $item->getSingleData();
    if($item->waktu_datang != null){
        // create array
        $data_arr = array(
        "id" => $item->id,
        "waktu_datang" => $item->waktu_datang,
        "selisih_datang" => $item->selisih_datang,
        "awal_layanan" => $item->awal_layanan,
        "selisih_layanan" => $item->selisih_layanan,
        "waktu_selesai" => $item->waktu_selesai,
        "selisih_akhir" => $item->selisih_akhir
        );
        http_response_code(200);
        echo json_encode($data_arr);
    }
    else{
        http_response_code(404);
        echo json_encode("antrian not found.");
    }
}
else {
    $items = new antri($db);
    $stmt = $items->getAll();
    $itemCount = $stmt->rowCount();
    if($itemCount > 0){
        $DataArr = array();
        $DataArr["body"] = array();
        $DataArr["total"] = $itemCount;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $e = array(
                "id" => $id,
                "waktu_datang" => $waktu_datang,
                "selisih_datang" => $selisih_datang,
                "awal_layanan" => $awal_layanan,
                "selisih_layanan" => $selisih_layanan,
                "waktu_selesai" => $waktu_selesai,
                "selisih_akhir" => $selisih_akhir
            );
            array_push($DataArr["body"], $e);
        }
        echo json_encode($DataArr);
    }
    else{
        http_response_code(404);
        echo json_encode(array("message" => "No record found."));
    }
}
?>
