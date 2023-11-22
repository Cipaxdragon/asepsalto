<?php 
$matkul = array(
    array(
        'matkul' => 'Prak Mobile ',
        'jam' => '08.00 - 11.20',
        'hari' => 1,
    ),
    array(
        'matkul' => 'Kakas',
        'jam' => '11.20 - 13.00',
        'hari' => 1,
    ),
    array(
        'matkul' => 'Pemro. Web',
        'jam' => '13.30 - 15.10',
        'hari' => 1,
    ),
    array(
        'matkul' => 'Metopel',
        'jam' => '15.20 - 17.00',
        'hari' => 1,
    ),
    array(
        'matkul' => 'Prak. Web',
        'jam' => '08.00 - 11.20',
        'hari' => 2,
    ),
    array(
        'matkul' => 'Man. Pengetahuan',
        'jam' => '11.30 - 13.00',
        'hari' => 2,
    ),
    array(
        'matkul' => 'Mobile',
        'jam' => '15.20 - 17.00',
        'hari' => 2,
    ),
    array(
        'matkul' => 'Prak. Kakas',
        'jam' => '08.00 - 9.40',
        'hari' => 3,
    ),
    array(
        'matkul' => 'Man. Rantai',
        'jam' => '11.20 - 13.00',
        'hari' => 4,
    ),
    array(
        'matkul' => 'DPPL',
        'jam' => '13.30 - 16.50',
        'hari' => 4,
    ),
);
    function hari($i){
        if($i == 1){
            return "senin";
        }else if($i == 2){
            return "selasa";
        }else if($i == 3){
            return "rabu";
        }else if($i == 4){
            return "kamis";
        }else if($i == 5){
            return "jumat";
        }else if($i == 6){
            return "sabtu";
        }else if($i == 7){
            return "minggu";
        }


    }
    
?>