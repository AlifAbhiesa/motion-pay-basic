<?php

class Change{

    public function changes($total, $bayar){

        $money = floor(($bayar - $total) / 100) * 100;
        if($bayar < $total){
            $data = array(
                'status' => false,
                'message' => 'kurang bayar'
            );
            return $data;
        }

        $dataa = $money % 100000;
        $a = ($money - $dataa) / 100000;

        $datab = $dataa % 50000;
        $b = ($dataa - $datab) / 50000;

        $datac = $datab % 20000;
        $c = ($datab - $datac) / 20000;

        $datad = $datac % 10000;
        $d = ($datac - $datad) / 10000;

        $datae = $datad % 5000;
        $e = ($datad- $datae) / 5000;

        $dataf = $datae % 2000;
        $f = ($datae - $dataf) / 2000;

        $datag = $dataf % 1000;
        $g = ($dataf - $datag) / 1000;

        $datah = $datag % 500;
        $h = ($datag - $datah) / 500;

        $datai = $datah % 200;
        $i = ($datah - $datai) / 200;

        $dataj = $datai % 100;
        $j = ($datai - $dataj) / 100;



        $data = array(
            '100.000' => $a,
            '50.000' => $b,
            '20.000' => $c,
            '10.000' => $d,
            '5.000' => $e,
            '2.000' => $f,
            '1.000' => $g,
            '500' => $h,
            '200' => $i,
            '100' => $j,

        );
        return $data;
    }
}

$total = 575650;
$bayar = 580000;
$change = new Change;
echo json_encode($change::changes($total, $bayar));
?>