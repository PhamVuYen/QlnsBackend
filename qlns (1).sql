-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 10:41 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qlns`
--

-- --------------------------------------------------------

--
-- Table structure for table `bangchamcong`
--

CREATE TABLE `bangchamcong` (
  `MaNV` varchar(10) NOT NULL,
  `NgayCong` int(11) NOT NULL,
  `PhutDiMuon` int(11) NOT NULL,
  `Thang` int(11) NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bangchamcong`
--

INSERT INTO `bangchamcong` (`MaNV`, `NgayCong`, `PhutDiMuon`, `Thang`, `ID`) VALUES
('CT02', 2, 947, 12, 1),
('CT03', 1, 797, 12, 2),
('CT04', 1, 537, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bangchamcongngay`
--

CREATE TABLE `bangchamcongngay` (
  `ID` int(11) NOT NULL,
  `MaNV` varchar(10) NOT NULL,
  `GioDen` varchar(30) NOT NULL,
  `GioVe` varchar(30) NOT NULL,
  `Ngay` varchar(30) NOT NULL,
  `Thang` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bangchamcongngay`
--

INSERT INTO `bangchamcongngay` (`ID`, `MaNV`, `GioDen`, `GioVe`, `Ngay`, `Thang`) VALUES
(1, 'CT02', '09:32:18', '18:32:18', '04-12-2023', '12'),
(2, 'CT02', '09:19:23', '18:19:04', '02-12-2023', '12'),
(3, 'CT01', '08:19:04', '17:19:04', '02-12-2023', '12'),
(4, 'CT03', '08:19:04', '18:19:04', '03-11-2023', '11'),
(5, 'CT04', '07:19:04', '17:19:04', '23-11-2023', '11'),
(6, 'CT02', '05:46:46', '05:48:56', '10-12-2023', '12'),
(7, 'CT03', '05:50:19', '05:53:32', '10-12-2023', '12'),
(8, 'CT04', '08:34:29', '08:37:08', '12-12-2023', '12'),
(9, 'CT02', '10:21:26', '', '12-12-2023', '12');

-- --------------------------------------------------------

--
-- Table structure for table `congviec`
--

CREATE TABLE `congviec` (
  `MaNV` varchar(10) NOT NULL,
  `MaCViec` varchar(50) NOT NULL,
  `TenCViec` varchar(50) NOT NULL,
  `DealineCV` varchar(50) NOT NULL,
  `CreateBy` varchar(50) NOT NULL,
  `CreateDate` varchar(50) NOT NULL,
  `AsignedTo` varchar(30) NOT NULL,
  `NameImage` varchar(100) NOT NULL,
  `B64Image` longblob NOT NULL,
  `Note` text NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `congviec`
--

INSERT INTO `congviec` (`MaNV`, `MaCViec`, `TenCViec`, `DealineCV`, `CreateBy`, `CreateDate`, `AsignedTo`, `NameImage`, `B64Image`, `Note`, `Status`) VALUES
('CT08', '27381bcd-4db9-4913-a4e5-c10c82368631', 'run', '10-12-2023 08:35', 'CT06', '10-12-2023', '', '', '', '', 'Quá hạn'),
('CT03', '364e5e03-ad46-46a6-9b00-8462fdf5af99', 'Đi chơi', '11-12-2023 08:34', 'CT01', '09-12-2023', '', '', '', '', 'Quá hạn'),
('CT02', '791d206c-273e-4b2b-b6c9-e36bb5d4839c', 'walk', '11-12-2023 01:04', 'CT06', '10-12-2023', '', '', '', '', 'Đang làm'),
('CT03', 'a8bd927c-b540-4c80-a303-d8ffcb43f061', 'Ngủ', '21-12-2023 12:55', 'CT01', '09-12-2023', '', '', '', '', 'Đã hoàn thành'),
('CT08', 'e18cd0fa-9291-4751-aa69-6e1d359fed2f', 'Quản lý hang', '12-12-2023 02:49', 'CT06', '09-12-2023', '', '', '', '', 'Đang làm'),
('CT03', 'f1ceef02-bee7-4945-876c-f1436f6bae06', 'dd', '13-12-2023 05:20', 'CT01', '12-12-2023', '', '', '', '', 'Đang làm'),
('CT07', 'f222d135-eec8-42cf-8ef7-a9880d1cb35c', 'Ăn cơm', '20-12-2023 08:47', 'CT01', '09-12-2023', '', '', '', '', 'Đang làm'),
('CT07', 'fb5a1b82-28e8-4a6b-b23e-d2407f42089d', 'Chơi Game', '22-12-2023 02:43', 'CT01', '04-12-2023', '', '', '', '', 'Đang làm'),
('CT01', 'MB001', 'An com', '2022-12-15 02:18:05', 'CT01', '2022-12-03 20:18:04', 'pham vuen ', '', '', '', 'Quá hạn');

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `MaNV` varchar(10) NOT NULL,
  `TenNV` varchar(50) NOT NULL,
  `NgaySinh` varchar(50) NOT NULL,
  `DiaChi` varchar(100) NOT NULL,
  `GioiTinh` varchar(50) NOT NULL,
  `Phone` text DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `SoCMND` varchar(50) NOT NULL,
  `NgayCap` varchar(50) NOT NULL,
  `NoiCap` varchar(100) NOT NULL,
  `NganHang` varchar(50) NOT NULL,
  `SoTk` varchar(50) NOT NULL,
  `ChucVu` varchar(50) NOT NULL DEFAULT 'Nhân viên',
  `BangCap` varchar(50) NOT NULL,
  `MucLuong` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL DEFAULT '12345',
  `MaPB` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`MaNV`, `TenNV`, `NgaySinh`, `DiaChi`, `GioiTinh`, `Phone`, `Email`, `SoCMND`, `NgayCap`, `NoiCap`, `NganHang`, `SoTk`, `ChucVu`, `BangCap`, `MucLuong`, `Password`, `MaPB`) VALUES
('CT01', 'Trần Bảo Trọng', '1993-04-15', 'Hà Giang', 'Nam', '967046022', 'Tranbaotrong@gamil.com', '209387425', '11-03-2013', 'Hà Giang', 'Vietcombank', '3192345123', 'Trưởng phòng', 'Tốt nghiệp Đại Học', '0', '12345', 'PBKD03'),
('CT02', 'Lê Thùy Dương', '1991-04-12', 'Hà Nội', 'Nữ', '968032183', 'Lethuyduongg@gamil.com', '1191823412', '11-03-2013', 'Hà Nội', 'Vietcombank', '713216424', 'Trưởng phòng', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKT04'),
('CT03', 'Lê Trung Tính', '1996-03-30', 'Quảng Ninh', 'Nam', '346762183', 'Letrungtinh@gamil.com', '22096741258', '11-03-2013', 'Quảng Ninh', 'Vietcombank', '321238888', 'Nhân viên', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKD03'),
('CT04', 'Lê Trường An', '1995-11-20', 'Ninh Bình', 'Nam', '868123734', 'Letruongan@gamil.com', '37095325896', '11-03-2013', 'Hà Giang', 'Vietcombank', '711299999', 'Nhân viên', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKT04'),
('CT05', 'Phạm Thị Hương Giang', '09-12-2023', 'Hòa Bình', 'Nữ', '357123926', 'Phamhuonggian@gamil.com', '17197523896', '11-03-2013', 'Ninh Bình', 'Vietcombank', '4031234567', 'ADMIN', 'Tốt nghiệp Đại Học', '1000000', '54321', NULL),
('CT06', 'Tần Anh Bảo', '1999-02-21', 'Hà Nội', 'Nam', '838412894', 'Trananhbao@gamil.com', '1099856324', '11-03-2013', 'Hà Nội', 'Vietcombank', '327512953', 'Nhân viên', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKT04'),
('CT07', 'Lê Thùy Dung', '1999-12-27', 'Nam Định', 'Nữ', '342138941', 'lethuydung@gamil.com', '36199002357', '11-03-2013', 'Nam Định', 'Vietcombank', '83021325321', 'Nhân viên', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKD03'),
('CT08', 'Phạm Trung Tính', '1996-03-30', 'Phú Thọ', 'Nam', '885612456', 'Phamtrungtinh@gamil.com', '25096442358', '11-03-2013', 'Phú Thọ', 'Vietcombank', '432915431', 'Nhân viên', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKT04'),
('CT10', 'Nguyễn Hằng Nga', '1997-04-12', 'Hà Nội', 'Nữ', '356147137', 'nguyenhangnga@gamil.com', '1197111257', '11-03-2013', 'Hà Nội', 'Vietcombank', '213593121', 'Nhân viên', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKT04'),
('CT11', 'Nguyên Giáo Thứ', '1906-03-30', 'Hà Nam', 'Nam', '885612456', 'nguyengiaothu@gamil.com', '250962132338', '11-03-2013', 'Hà Nội', 'MB Bank', '0987612321', 'Trưởng phòng', 'Tốt nghiệp Đại Học', '0', '12345', NULL),
('CT12', 'Nguyên Chí Phèo', '1912-09-12', 'Hà Nam', 'Nam', '0359302456', 'chipheo@gamil.com', '03686442875', '11-03-2013', 'Hà Nam', 'Vietcombank', '432222222', 'Nhân viên', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKT05'),
('CT13', 'Nguyên Thị Nở', '1911-01-12', 'Hà Nam', 'Nữ', '0981922786', 'Thino@gamil.com', '03596442876', '11-03-2013', 'Hà Nam', 'TPbank', '432132131', 'Nhân viên', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKT05'),
('CT14', 'Vợ Giáo Thứ', '1909-04-30', 'Hà Nam', 'Nữ', '075612333', 'vogiaothu@gamil.com', '03596442132', '11-03-2013', 'Hà Nam', 'TPbank', '432321431', 'Trưởng phòng', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKT05'),
('CT15', 'Nguyên Bá Kiến', '1886-12-31', 'Hà Nam', 'Nam', '082915413', 'bakien@gamil.com', '03596442332s', '11-03-2013', 'Hà Nam', 'TPbank', '8856111111', 'Trưởng phòng', 'Tốt nghiệp Cao Đẳng', '0', '12345', 'PBKT06'),
('CT16', 'Vợ Bá Kiến', '1890-10-10', 'Hà Nam', 'Nữ', '0929234431', 'vobakien@gamil.com', '03596442452', '11-03-2013', 'Hà Nam', 'TPbank', '885612222', 'Nhân viên', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKT06'),
('CT17', 'Vợ Cả Bá Kiến', '1888-04-10', 'Hà Nam', 'Nữ', '032915452', 'vobakien2@gamil.com', '035964423231', '11-03-2013', 'Hà Nam', 'TPbank', '885123213', 'Nhân viên', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKT06'),
('CT18', 'Cô Thị Nở', '1886-10-20', 'Hà Nam', 'Nữ', '082915474', 'cothino@gamil.com', '035964423213', '11-03-2013', 'Hà Nam', 'TPbank', '885612456', 'Nhân viên', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKT06'),
('CT19', 'Nguyên Lão Hạc', '1880-04-12', 'Hà Nam', 'Nam', '0956213212', 'laohac@gamil.com', '035964213123', '11-03-2013', 'Hà Nam', 'TPbank', '032315431', 'Nhân viên', 'Tốt nghiệp Cao Đẳng', '0', '12345', 'PBKT05'),
('CT20', 'Nguyên Tự Lãng', '1889-03-14', 'Hà Nam', 'Nam', '0856121232', 'tulang@gamil.com', '035964423231', '11-03-2013', 'Hà Nam', 'Vietcombank', '042915641', 'Nhân viên', 'Tốt nghiệp Phổ Thông', '0', '12345', 'PBKT06'),
('Ct21', 'qưeqwewqe', '09-12-2023', 'qeqweq', 'Nữ', '12312312321312', '12321312d12d', '123131231', '', '', '', '12321321321', 'Nhân viên', '', '1231231231', '12345', 'PBKT05'),
('CT22', 'nhi', '09-12-2023', 'Ha Noi', 'Nam', '4343244', 'adfdsfdsfds', '12423123213', '', '', '', '123213132', 'Trưởng phòng', '', '21321', '12345', 'PBKT07');

-- --------------------------------------------------------

--
-- Table structure for table `phongban`
--

CREATE TABLE `phongban` (
  `MaPB` varchar(10) NOT NULL,
  `TenPB` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phongban`
--

INSERT INTO `phongban` (`MaPB`, `TenPB`) VALUES
('PBKD03', 'Phòng kinh doanh'),
('PBKT04', 'Phòng kỹ thuật'),
('PBKT05', 'Phòng tài vụ'),
('PBKT06', 'Phòng sale'),
('PBKT07', 'Thử việc');

-- --------------------------------------------------------

--
-- Table structure for table `tokens`
--

CREATE TABLE `tokens` (
  `Id` int(10) NOT NULL,
  `Token` varchar(255) NOT NULL,
  `Token_type` varchar(50) NOT NULL,
  `User_id` varchar(10) NOT NULL,
  `Expiration_date` varchar(100) NOT NULL,
  `Revoked` tinyint(4) NOT NULL,
  `Expired` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tokens`
--

INSERT INTO `tokens` (`Id`, `Token`, `Token_type`, `User_id`, `Expiration_date`, `Revoked`, `Expired`) VALUES
(1, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJTSEEyNTYifQ.eyJNYU5WIjoiTWFOViIsIlBhc3N3b3JkIjoiUGFzc3dvcmQifQ.QHHKFI2G2v8cfaiAnZsRWylTcjghDtkQLB1gXFe--8M', '', 'CT05', '0000-00-00 00:00:00', 0, 0),
(2, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJTSEEyNTYifQ.eyJNYU5WIjoiTWFOViIsIlBhc3N3b3JkIjoiUGFzc3dvcmQifQ.QHHKFI2G2v8cfaiAnZsRWylTcjghDtkQLB1gXFe--8M', '', 'CT05', '0000-00-00 00:00:00', 0, 0),
(3, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJTSEEyNTYifQ.eyJNYU5WIjoiTWFOViIsIlBhc3N3b3JkIjoiUGFzc3dvcmQifQ.QHHKFI2G2v8cfaiAnZsRWylTcjghDtkQLB1gXFe--8M', '', 'CT01', '0000-00-00 00:00:00', 0, 0),
(4, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJTSEEyNTYifQ.eyJNYU5WIjoiTWFOViIsIlBhc3N3b3JkIjoiUGFzc3dvcmQiLCJleHAiOjE3MDk0OTcyMzJ9.ruYcXWYhRZztbUqBGnlqqXpcYYvOIPUOEOQ_CSl_Uno', '', 'CT01', '0000-00-00 00:00:00', 0, 0),
(5, 'eyJ0eXAiOiJKV1QiLCJhbGciOiJTSEEyNTYifQ.eyJNYU5WIjoiTWFOViIsIlBhc3N3b3JkIjoiUGFzc3dvcmQiLCJleHAiOjE3MDk0OTcyMzd9.MXCxlK52xIGviCLz7xTAg7QXutiQe3znhNW5bu0Fq8I', '', 'CT01', '0000-00-00 00:00:00', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bangchamcong`
--
ALTER TABLE `bangchamcong`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Indexes for table `bangchamcongngay`
--
ALTER TABLE `bangchamcongngay`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Indexes for table `congviec`
--
ALTER TABLE `congviec`
  ADD PRIMARY KEY (`MaCViec`),
  ADD KEY `MaNV` (`MaNV`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`MaNV`),
  ADD KEY `MaPB` (`MaPB`);

--
-- Indexes for table `phongban`
--
ALTER TABLE `phongban`
  ADD PRIMARY KEY (`MaPB`);

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`Id`) USING BTREE,
  ADD KEY `id_tokenss` (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bangchamcong`
--
ALTER TABLE `bangchamcong`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bangchamcongngay`
--
ALTER TABLE `bangchamcongngay`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bangchamcong`
--
ALTER TABLE `bangchamcong`
  ADD CONSTRAINT `bangchamcong_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `bangchamcongngay`
--
ALTER TABLE `bangchamcongngay`
  ADD CONSTRAINT `bangchamcongngay_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `congviec`
--
ALTER TABLE `congviec`
  ADD CONSTRAINT `congviec_ibfk_1` FOREIGN KEY (`MaNV`) REFERENCES `nhanvien` (`MaNV`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`MaPB`) REFERENCES `phongban` (`MaPB`);

--
-- Constraints for table `tokens`
--
ALTER TABLE `tokens`
  ADD CONSTRAINT `id_tokenss` FOREIGN KEY (`User_id`) REFERENCES `nhanvien` (`MaNV`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
