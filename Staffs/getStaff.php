<?php
    include '../Connect.php';
    include 'Staff.php';

    $response = array();
    $query = "SELECT * FROM nhanvien";
    $data = mysqli_query($conn, $query);

       while ($row = mysqli_fetch_assoc($data)){
        array_push($response, new NhanVien(
            $row['MaNV'], 
            $row['TenNV'], 
            $row['NgaySinh'], 
            $row['DiaChi'], 
            $row['GioiTinh'], 
            $row['Phone'], 
            $row['Email'], 
            $row['SoCMND'], 
            $row['SoTk'], 
            $row['MaPB'], 
            $row['MucLuong'], 
            $row['ChucVu'],
            $row['Password'], 
        ));
       }

    echo json_encode($response);

    function generateTokens($MaNV, $Password) {
        $secretKey = 'key';
    
        // Access Token
        $accessTokenPayload = array(
            "MaNV" => $MaNV,
            "Password" => $Password
        );
        $accessToken = jwt_encode($accessTokenPayload, $secretKey);
    
        return $accessToken;
        
    }

    function jwt_encode($payload, $key) {
        $header = json_encode(['typ' => 'JWT', 'alg' => 'SHA256']);
        $header = base64UrlEncode($header);
        $payload = base64UrlEncode(json_encode($payload));
        $signature = hash_hmac('SHA256', "$header.$payload", $key, true);
        $signature = base64UrlEncode($signature);
    
        return "$header.$payload.$signature";
    }

    function base64UrlEncode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }
?>