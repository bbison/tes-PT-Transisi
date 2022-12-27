<?php
    $array=[
        ['f','g','h','i'],
        ['j','k','p','q'],
        ['r','s','t','u']
    ];

function cari($arry, $nilai){
    $hasil=array_search($nilai, $arry);
    if($hasil>0){
        echo 'true';
    }
    echo 'false' ;
}

cari($array,'fghi')


?>