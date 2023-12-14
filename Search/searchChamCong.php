<?php
include '../Connect.php';

$response = array();

class TimeRecorder{
    public $MaNV;
    public $GioDen;
    public $GioVe;
    public $Ngay;
    public $Thang;
    function __construct($MaNV, $GioDen, $GioVe, $Ngay, $Thang)
    {
        $this->MaNV = $MaNV;
        $this->GioDen = $GioDen;
        $this->GioVe = $GioVe;
        $this->Ngay = $Ngay;
        $this->Thang = $Thang;

    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $Search = isset($_POST['Search']) ? $_POST['Search'] : '';

    if (isset($_POST['Search'])) {

        $search = "SELECT * FROM bangchamcongngay WHERE Thang = '$Search' ";
        $data = mysqli_query($conn, $search);

        while ($row = mysqli_fetch_assoc($data)){
            array_push($response, new TimeRecorder(
                $row['MaNV'], 
                $row['GioDen'], 
                $row['GioVe'],
                $row['Ngay'], 
                $row['Thang']
            ));
           }
    }
}
echo json_encode($response);

?>
