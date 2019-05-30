<?php

function pesan_rahasia($input)
{
    
    $l = strlen($input);
    $m = $l;
    $pangkat = sqrt($m);

    for($m = $l; is_decimals($pangkat) == true; $m++) {
        $pangkat = sqrt($m);
    }
    
    $m = pow($pangkat,2);
    
    for($bintang = $l; $bintang < $m; $bintang++){
        $input = $input."*";
    }
        
    $data = str_split($input, $pangkat);
    $output = array(); 

    foreach ($data as $key => $value) {
        $split = str_split($value, 1);
        array_push($output, $split); 
    } 
    $output = rotate90($output);
    
    $clean = array();
    foreach($output as $val){
        $clean[] = implode("",$val);
    }
    $clean = str_replace("*", "", implode("",$clean));

    echo $clean;
    
}

function is_decimals($val)
{
    return is_numeric($val) && floor($val) != $val;
}

function rotate90($mat)
{
    $height = count($mat);
    $width = count($mat[0]);
    $mat90 = array();

    for ($i = 0; $i < $width; $i++) {
        for ($j = 0; $j < $height; $j++) {
            $mat90[$height - $i - 1][$j] = $mat[$height - $j - 1][$i];
        }
    }

    return $mat90;
}

pesan_rahasia("maafAkuenggak");
