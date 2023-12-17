<?php

include '../Connect.php';

$response = array();

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $MaNV = isset($_POST['MaNV']) ? $_POST['MaNV'] : '';
        $Password = isset($_POST['Password']) ? $_POST['Password'] : '';

        $query = "SELECT * FROM nhanvien WHERE MaNV = '$MaNV' AND `Password` = '$Password'";
        $data = mysqli_query($conn, $query);

        if($data && $data-> num_rows > 0){
            if(isset($_POST['MaNV']) && isset($_POST['Password'])){
                $row = mysqli_fetch_assoc($data);
                $Token = generateTokens( $row['MaNV'], $row['ChucVu'] , $row['TenNV'], $row['MaPB'],$row['Phone'],
                $row['Email'],$row['MucLuong'], 
                $row['NgaySinh'],$row['DiaChi'], $row['SoTk'],$row['GioiTinh'], $row['SoCMND']);
                //  $response['token'] = $Token;                
                echo $Token;
            }
            // $response['success'] = true;
        }else {
            // header("HTTP/1.1 401 Unauthorized");
            // $response['success'] = false;
        }
    }else{
        // $response['error'] = true;
        // $response['message'] = "Invalid Request"; 
     }
// echo json_encode($response);

function generateTokens($MaNV, $ChucVu, $TenNV, $MaPB, $Phone,$Email,$MucLuong,
            $NgaySinh, $DiaChi,$SoTk, $GioiTinh,$SoCMND) {
    $secretKey = 'key';

    // Access Token
    $accessTokenPayload = array(
        "MaNV" => $MaNV,
        "ChucVu" => $ChucVu,
        "TenNV" => $TenNV,
        "MaPB" => $MaPB,
        "Phone" => $Phone,
        "Email" => $Email,
        "MucLuong" => $MucLuong,
        "NgaySinh" => $NgaySinh,
        "DiaChi" => $DiaChi,
        "SoTk" => $SoTk,
        "GioiTinh" => $GioiTinh,
        "SoCMND" => $SoCMND,
        "exp" => time() + (3 * 30 * 24 * 60 * 60) // 3 months validity
    );
    $accessToken = jwt_encode($accessTokenPayload, $secretKey);

    return $accessToken;
    
}

function jwt_encode($payload, $key) {
    $header = json_encode(['typ' => 'JWT', 'alg' => 'HS256']);
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
