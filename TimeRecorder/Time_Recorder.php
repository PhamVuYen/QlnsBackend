<?php
    class TimeRecorder{
        public $MaNV;
        public $NgayCong;
        public $PhutDiMuon;
        public $Thang;
        function __construct($MaNV, $NgayCong,$PhutDiMuon, $Thang)
        {
            $this->MaNV = $MaNV;
            $this->NgayCong = $NgayCong;
            $this->PhutDiMuon = $PhutDiMuon;
            $this->Thang = $Thang;
        }
    }
?>