<?php
class Search{

    public function stringList($s){
        $data = explode("\n", $s);
        $key = "";
        $result = array();
        
        for($i = 1; $i <= $data[0]; $i++){
            
            for($x = 1; $x < $data[0]; $x++){
                
                if($x != $i){
                    
                    if($data[$i] == $data[$x]){

                        if($key == ""){
                            $key = $data[$i];
                        }


                        if($data[$i] == $key){
                            if(empty($result)){
                                array_push($result, $i);
                                array_push($result, $x);
                            }else{
                                if(!in_array($i, $result)){
                                    array_push($result, $i);
                                }
                            }
                        }

                    }
                }

            }
        }

        if(empty($result)){
            return false;
        }
        return $result;
    }
}
$data = 
        "11
        Satu
        Satey
        Tujuh
        Tusuk
        Tujuh
        Sate
        Bonus
        Tiga
        Puluh
        Tujuh
        Tusuk";
$search = new Search;
echo json_encode($search::stringList($data));
?>