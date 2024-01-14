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
$item->generateByAVG();

if ($item->waktu_datang != null) {
    $formattedwaktu_datang = date('H:i:s', strtotime($item->waktu_datang));
    $formattedwaktu_selesai = date('H:i:s', strtotime($item->waktu_selesai));

    // Hitung total data (contoh: menggunakan metode getAll())
    $stmt = $item->getAll();
    $totalData = $stmt->rowCount();

    // Tentukan tingkat keramaian berdasarkan jumlah data
    $tingkat_keramaian = $item->determineCrowdLevel($totalData);

    $selisih_datang = round($item->selisih_datang);

    $data_arr = array(
        "waktu_datang" => "Jika awal waktu kedatangan konsumen pada: " . $formattedwaktu_datang,
        "waktu_selesai" =>  $formattedwaktu_selesai,
        "selisih_datang" => "Rata-rata selisih kedatangan konsumen  : " . $selisih_datang . " menit",
        "selisih_layanan" => "Rata-rata selisih pelayanan konsumen : " . round($item->selisih_layanan) . " menit, dan",
        "selisih_akhir" => "Rata-rata waktu konsumen selesai dilayani: " . round($item->selisih_akhir),
        "tingkat_keramaian" => "Tingkat keramaian: " . $tingkat_keramaian,
    );

    http_response_code(200);
    echo json_encode($data_arr);
} else {
    http_response_code(404);
    echo json_encode("antri not found.");
}
