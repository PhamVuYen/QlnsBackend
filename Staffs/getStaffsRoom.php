<?php
    include '../Connect.php';
    //include 'Staff.php';

    $response = array();
    
   
       if($_SERVER['REQUEST_METHOD']=='POST'){
        $MaPB = isset($_POST['MaPB']) ? $_POST['MaPB']: '';
        // $MaPB = $_POST['MaPB'];
        
        if(isset($_POST['MaPB'])){

            $query = "SELECT * FROM nhanvien WHERE MaPB = '$MaPB' ";
            $data = mysqli_query($conn, $query);
        
               while ($row = mysqli_fetch_assoc($data)){
                array_push($response, new NhanVien_PhongBan(
                    $row['MaNV'], 
                    $row['TenNV'], 
                    $row['NgaySinh'], 
                    $row['DiaChi'], 
                    $row['GioiTinh'], 
                    $row['Phone'], 
                    $row['Email'], 
                    $row['SoCMND'], 
                    $row['SoTk'], 
                    $row['MucLuong'], 
                    $row['ChucVu']
                ));
               }
        
            if($conn->query($query) == TRUE){
                 $response['message'] = "done";
            }else{
                $response['message'] = "error";
            }
        
        }else{
            $response['error'] = true;
            $response['message'] = "Required fields are missing";
        }

     }else{
        $response['error'] = true;
        $response['message'] = "Invalid Request"; 
     }
     echo json_encode($response);
     class NhanVien_PhongBan{
        public $MaNV;
        public $TenNV;
        public $NgaySinh;
        public $ChucVu;
        public $DiaChi;
        public $GioiTinh;
        public $Email;
        public $MucLuong;
        public $SoCMND;
        public $SoTk;
         function __construct($MaNV, $TenNV, $NgaySinh, $DiaChi, $GioiTinh, $Phone, $Email, $SoCMND, $SoTk, $MucLuong, $ChucVu)
        {
            $this ->MaNV = $MaNV;
            $this ->TenNV = $TenNV;
            $this ->NgaySinh = $NgaySinh;
            $this ->DiaChi = $DiaChi;
            $this ->GioiTinh = $GioiTinh;
            $this ->Phone = $Phone;
            $this ->Email = $Email;
            $this ->SoCMND = $SoCMND;
            $this ->SoTk = $SoTk;
            $this ->MucLuong = $MucLuong;
            $this ->ChucVu = $ChucVu; 
        }
        
    }


   
?>