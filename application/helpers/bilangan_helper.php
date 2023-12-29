<!-- Muhammad Faiz Arrasyid
6703220056
4601-->
<?php
function cekGanjil($bilangan) {
    if ($bilangan % 2 == 1) {
        return "Bilangan ganjil";
    } else {
        return "Bilangan genap, bukan ganjil";
    }
}
function Prima($bilangan){
    $angka = $bilangan;
    $hasil = true;
    for ($i = 2; $i < $angka; $i++) {
        if ($angka % $i == 0) {
            $hasil = false;
            break;
        }
    }
    if ($hasil) {
        return 'Prima';
    } else {
        return 'Bukan bilangan prima';
    }
}

function KelipatanDua($bilangan) {
    if ($bilangan % 2 == 0) {
        return "Kelipatan 2";
    } else {
        return "Bukan kelipatan 2";
    }
}
?>
