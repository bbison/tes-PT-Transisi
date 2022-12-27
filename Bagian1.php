<?php
//Bagian 1 
function nilai(){
    //data soal
    $nilai = "72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86";
    //ubah data ke array
    $angka=explode(' ',$nilai);
    // menghitung banyaknya data
    $pembagi = count($angka);
    //menjumlahkan semua angka
    $jumlahSemuaAngka = array_sum($angka);

    // nilai rata rata = jumlah semua nilai dibagi banyak data
    $ratarata= $jumlahSemuaAngka/$pembagi;
    
    echo 'Soal: Rata Rata dari nilai 72 65 73 78 75 74 90 81 87 65 55 69 72 78 79 91 100 40 67 77 86'.'<br>'; 
    echo "Nilai Rata-Rata Adalah ".round($ratarata,2).'<br>';

    echo "Nilai tertinggi Adalah ".max($angka).'<br>';
    echo "Nilai terendahnya Adalah ".min($angka);
}

function jumlahHurufKecil($huruf){
    //menagkap data kalimat
    $kalimat=$huruf;

    //jumlah karakter
    $jk=strlen($huruf);

     //pecah huruf
     $huruf = str_split($huruf);

     //menyimpah karaakter lowwer case
     $low=0;
        for($x=0;$x<$jk;$x++){
            if(ctype_lower($huruf[$x])){
                $low+=1;
            ;
            }
        }

    echo $kalimat." mengandung ".$low." buah huruf kecil";

}


function ubt($input){
    // tangkap data kalimat
    $kalimat=$input;

    $pecahkata=explode(' ', $input);

    //unigram
    for($x=0;$x<count($pecahkata);$x++){
        //get data terakhir
        $terakhir=end($pecahkata);
        if($terakhir!=$pecahkata[$x]){
            echo $pecahkata[$x].', ';
        }
        else{
            echo $pecahkata[$x];
        }
     
    }
    echo '<br>';
    //Bigram
    for($x=0;$x<count($pecahkata);$x++){
        //get data terakhir untuk menghilangkan tanda koma di akhir
        $terakhir=end($pecahkata);
        if($terakhir!=$pecahkata[$x]){
            if($x>=1 && $x %2 ==1){
            echo $pecahkata[$x].', ';
            }
            else{
                echo $pecahkata[$x].' ';
            }
        }
        
        else{
            echo $pecahkata[$x];
        }
     
    }
    echo '<br>';
    //TriGram
    for($x=0;$x<count($pecahkata);$x++){
        //get data terakhir untuk menghilangkan tanda koma di akhir
        $terakhir=end($pecahkata);
        if($terakhir!=$pecahkata[$x]){
            if($x>=1 && $x %3 ==2){
            echo $pecahkata[$x].', ';
            }
            else{
                echo $pecahkata[$x].' ';
            }
        }
        
        else{
            echo $pecahkata[$x];
        }
     
    }



}


nilai();
echo "<br>";
echo "<br>";
jumlahHurufKecil(' bAgaS');
echo "<br>";
echo "<br>";
ubt('jakarta adalah ibu kota negara indonesia');

?>

