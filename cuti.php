<?php

class Cuti{
    public function hitungCuti($cuti_bersama, $join_date, $cuti_plan, $durasi){
        $const_limit = 180; // mininal 180hr setelah join
        $limit = date('d-m-Y', strtotime($join_date. ' + '.$const_limit.' days'));
        $data = true;

        if(strtotime($cuti_plan) < strtotime($limit)){
            $data = array(
                'result' => false,
                'message' => 'kurang dari 180 hari setelah join'
            );
            
        }

        $year_join = date('Y', strtotime($join_date));
        $year_join = '31-12-'.$year_join;

        $datediff = strtotime($limit) - strtotime($year_join);
        $datediff = abs(round($datediff / (60 * 60 * 24)));

        $allowed_cuti = floor(($datediff/365)*7);

        if($durasi > $allowed_cuti){
            $data = array(
                'result' => false,
                'message' => 'max cuti '.$allowed_cuti.' hari'
            );
        }

        return $data;
    }

}

        $cuti_bersama = 7;
        $join_date = '05-01-2021';
        $cuti_plan = '05-12-2023';
        $durasi = 3;
        $cuti = new Cuti;
        echo json_encode($cuti::hitungCuti($cuti_bersama, $join_date, $cuti_plan, $durasi));
?>