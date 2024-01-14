<?php
class antri
{
    // Connection
    private $conn;
    // Table
    private $db_table = "antri_mcd";
    // Columns
    public $id;
    public $waktu_datang;
    public $selisih_datang;
    public $awal_layanan;
    public $selisih_layanan;
    public $waktu_selesai;
    public $selisih_akhir;
    public $tingkat_keramaian;
    // Db connection
    public function __construct($db)
    {
        $this->conn = $db;
    }
    // GET ALL
    public function getAll()
    {
        $sqlQuery = "SELECT id, waktu_datang, selisih_datang, awal_layanan, selisih_layanan, waktu_selesai, selisih_akhir FROM " . $this->db_table . "";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        return $stmt;
    }
    // CREATE
    public function createData()
    {
        $sqlQuery = "INSERT INTO " . $this->db_table . "
        SET
        waktu_datang = :waktu_datang,
        selisih_datang = :selisih_datang,
        awal_layanan = :awal_layanan,
        selisih_layanan = :selisih_layanan,
        waktu_selesai = :waktu_selesai,
        selisih_akhir = :selisih_akhir";
        $stmt = $this->conn->prepare($sqlQuery);
        // sanitize
        $this->waktu_datang = htmlspecialchars(strip_tags($this->waktu_datang));
        $this->selisih_datang = htmlspecialchars(strip_tags($this->selisih_datang));
        $this->awal_layanan = htmlspecialchars(strip_tags($this->awal_layanan));
        $this->selisih_layanan = htmlspecialchars(strip_tags($this->selisih_layanan));
        $this->waktu_selesai = htmlspecialchars(strip_tags($this->waktu_selesai));
        $this->selisih_akhir = htmlspecialchars(strip_tags($this->selisih_akhir));
        // bind data
        $stmt->bindParam(":waktu_datang", $this->waktu_datang);
        $stmt->bindParam(":selisih_datang", $this->selisih_datang);
        $stmt->bindParam(":awal_layanan", $this->awal_layanan);
        $stmt->bindParam(":selisih_layanan", $this->selisih_layanan);
        $stmt->bindParam(":waktu_selesai", $this->waktu_selesai);
        $stmt->bindParam(":selisih_akhir", $this->selisih_akhir);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
    // READ single
    public function getSingleData()
    {
        $sqlQuery = "SELECT
        id,
        waktu_datang,
        selisih_datang,
        awal_layanan,
        selisih_layanan,
        waktu_selesai,
        selisih_akhir      
        FROM
        " . $this->db_table . "
        WHERE
        id = ?
        LIMIT 0,1";
        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->bindParam(1, $this->id);
        $stmt->execute();
        $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->waktu_datang = $dataRow['waktu_datang'];
        $this->selisih_datang = $dataRow['selisih_datang'];
        $this->awal_layanan = $dataRow['awal_layanan'];
        $this->selisih_layanan = $dataRow['selisih_layanan'];
        $this->waktu_selesai = $dataRow['waktu_selesai'];
        $this->selisih_akhir = $dataRow['selisih_akhir'];
    }
    // UPDATE
    public function updateData()
    {
        $sqlQuery = "UPDATE
        " . $this->db_table . "
        SET
        waktu_datang = :waktu_datang,
        selisih_datang = :selisih_datang,
        awal_layanan = :awal_layanan,
        selisih_layanan = :selisih_layanan,
        waktu_selesai = :waktu_selesai,
        selisih_akhir = :selisih_akhir 
        WHERE
        id = :id";
        $stmt = $this->conn->prepare($sqlQuery);

        $this->waktu_datang = htmlspecialchars(strip_tags($this->waktu_datang));
        $this->selisih_datang = htmlspecialchars(strip_tags($this->selisih_datang));
        $this->awal_layanan = htmlspecialchars(strip_tags($this->awal_layanan));
        $this->selisih_layanan = htmlspecialchars(strip_tags($this->selisih_layanan));
        $this->waktu_selesai = htmlspecialchars(strip_tags($this->waktu_selesai));
        $this->selisih_akhir = htmlspecialchars(strip_tags($this->selisih_akhir));
        $this->id = htmlspecialchars(strip_tags($this->id));
        // bind data
        $stmt->bindParam(":waktu_datang", $this->waktu_datang);
        $stmt->bindParam(":selisih_datang", $this->selisih_datang);
        $stmt->bindParam(":awal_layanan", $this->awal_layanan);
        $stmt->bindParam(":selisih_layanan", $this->selisih_layanan);
        $stmt->bindParam(":waktu_selesai", $this->waktu_selesai);
        $stmt->bindParam(":selisih_akhir", $this->selisih_akhir);
        $stmt->bindParam(":id", $this->id);
        $stmt->fetchAll();

        try {
            $stmt->execute();
        } catch (PDOException $exception) {
            die($exception->getMessage());
        }

        if (count($stmt->fetchAll()) == 0) {
            return true;
        }
    }
    // DELETE
    function deleteData()
    {
        $sqlQuery = "DELETE FROM " . $this->db_table . " WHERE id = ?";
        $stmt = $this->conn->prepare($sqlQuery);
        $this->id = htmlspecialchars(strip_tags($this->id));
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function generateByAVG()
    {
        $sqlQuery = "SELECT
        AVG(waktu_datang) AS r_waktu_datang,
        AVG(selisih_datang) AS r_selisih_datang,
        AVG(waktu_selesai) AS r_waktu_selesai,
        AVG(selisih_layanan) AS r_selisih_layanan, 
        AVG(selisih_akhir) AS r_selisih_akhir 
        FROM   " . $this->db_table;

        $stmt = $this->conn->prepare($sqlQuery);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $dataRow = $stmt->fetch();

        $this->waktu_datang = $dataRow['r_waktu_datang'];
        $this->selisih_datang = $dataRow['r_selisih_datang'];
        $this->waktu_selesai = $dataRow['r_waktu_selesai'];
        $this->selisih_layanan = $dataRow['r_selisih_layanan'];
        $this->selisih_akhir = $dataRow['r_selisih_akhir'];
    }

    public function determineCrowdLevel($totalData)
    {
        // Logika fuzzy sederhana berdasarkan jumlah data
        if ($totalData <= 5) {
            $tingkat_keramaian = "Rendah";
        } elseif ($totalData <= 10) {
            $tingkat_keramaian = "Sedang";
        } else {
            $tingkat_keramaian = "Tinggi";
        }

        return $tingkat_keramaian;
    }
}
