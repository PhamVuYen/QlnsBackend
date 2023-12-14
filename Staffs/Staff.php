<?php
    class NhanVien{
        public $MaNV;
        public $TenNV;
        public $NgaySinh;
        public $ChucVu;
        public $DiaChi;
        public $GioiTinh;
        public $Email;
        public $MucLuong;
        public $SoCMND;
        public $Phone;
        public $SoTk;
        public $Password;
        public $MaPB;
 
         function __construct($MaNV, $TenNV, $NgaySinh, $DiaChi, $GioiTinh, $Phone, $Email, $SoCMND, $SoTk, $MaPB, $MucLuong, $ChucVu, $Password)
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
            $this ->MaPB = $MaPB;
            $this ->MucLuong = $MucLuong;
            $this ->ChucVu = $ChucVu; 
            $this ->Password = $Password; 
        }
        
    }
?>