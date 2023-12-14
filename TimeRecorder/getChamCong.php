<?php
    include '../Connect.php';

    $response = array();
    $query = "SELECT * FROM bangchamcongngay";
    $data = mysqli_query($conn, $query);

       while ($row = mysqli_fetch_assoc($data)){
        array_push($response, new TimeRecorder(
            $row['MaNV'], 
            $row['GioDen'], 
            $row['GioVe'],
            $row['Ngay'], 
            $row['Thang']
        ));
       }

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
    echo json_encode($response);
?>