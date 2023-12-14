<?php
    include '../Connect.php';

    // include 'getChamCong.php';
    $response = array();
    if($_SERVER['REQUEST_METHOD']=='POST'){

        $MaNV = isset($_POST['MaNV']) ? $_POST['MaNV']: '';
        // $Thang = isset($_POST['Thang']) ? $_POST['Thang']: '';
        if(isset($_POST['MaNV']) && isset($_POST['MaNV'])){

            $query = "SELECT * FROM bangchamcongngay WHERE MaNV = '$MaNV'";
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
            if($conn->query($query) == TRUE){
                 // $response['message'] = "done";
            }else{
                // $response['message'] = "error";
            }
        
        }else{
            $response['error'] = true;
            $response['message'] = "Required fields are missing";
        }

     }else{
        $response['error'] = true;
        $response['message'] = "Invalid Request"; 
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