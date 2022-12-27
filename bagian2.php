<?php 

function table(){
$x='Membuat Table Dengan Fungsi';
    echo '<h1>'.$x.'</h1>';
echo '<table>';
    echo '<tr>';

    for($y=1;$y<=8;$y++){
        echo '<td>'.$y.'</td>';
    }
    echo '<tr>';
    echo '<tr>';

    for($y=9;$y<=16;$y++){
        echo '<td>'.$y.'</td>';
    }
    echo '<tr>';
    echo '<tr>';

    for($y=17;$y<=24;$y++){
        echo '<td>'.$y.'</td>';
    }
    echo '<tr>';
    echo '<tr>';

    for($y=25;$y<=32;$y++){
        echo '<td>'.$y.'</td>';
    }
    echo '<tr>';
    echo '<tr>';

    for($y=33;$y<=40;$y++){
        echo '<td>'.$y.'</td>';
    }
    echo '<tr>';
    echo '<tr>';

    for($y=41;$y<=48;$y++){
        echo '<td>'.$y.'</td>';
    }
    echo '<tr>';
    echo '<tr>';

    for($y=49;$y<=56;$y++){
        echo '<td>'.$y.'</td>';
    }
    echo '<tr>';
    echo '<tr>';

    for($y=57;$y<=64;$y++){
        echo '<td>'.$y.'</td>';
    }
    echo '<tr>';
echo '</table>';

 
}

function encrypt($sandi){

    echo 'Input Anda '.$sandi.'<br>';
$pecahsandi=str_split($sandi);
echo 'Hasil Enkripsi Anda ';
for($x=0; $x<=count($pecahsandi)-1 ;$x++){
    $asci=ord($pecahsandi[$x]);
    if($x==0){
        $rumus = $asci + $x +1;
        echo chr($rumus);
        
    }
    elseif($x % 2 ==1){
        $rumus = $asci - $x -1;
        echo chr($rumus);
    }
    elseif($x % 2 ==1){
        $rumus = $asci - $x +1;
        echo chr($rumus);
    }

    elseif($x % 2 == 0){
        $rumus = $asci + $x +1;
        echo chr($rumus);
    }

}
}



 table();

 echo '<br>';



 echo '<h1> Fungsi Enkripsi PHP </h1>';

encrypt('DFHKNQ')
?>