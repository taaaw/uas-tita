<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include_once '../../config/database.php';
include_once '../../models/antri.php';
$database = new Database();
$db = $database->getConnection();
$item = new antri($db);
$data = json_decode(file_get_contents("php://input"));
$item->waktu_datang = $data->waktu_datang;
$item->selisih_datang = $data->selisih_datang;
$item->awal_layanan = $data->awal_layanan;
$item->selisih_layanan = $data->selisih_layanan;
$item->waktu_selesai = $data->waktu_selesai;
$item->selisih_akhir = $data->selisih_akhir;
if($item->createData()){
    echo json_encode( 'Data created successfully.');
} else{
    echo json_encode('Data could not be created.');
}
?>