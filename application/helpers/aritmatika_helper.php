<?php
// Fungsi untuk menghitung penjumlahan bilangan
function tambah($a,$b){
    if(!is_numeric($a) or !is_numeric($b)) return null;
    return $a + $b;
}
// Operasi pengurangan
function kurang($a,$b){
    if(!is_numeric($a) or !is_numeric($b)) return null;
    return $a - $b;
}
// Operasi Perkalian
function kali($a,$b){
    if(!is_numeric($a) or !is_numeric($b)) return null;
    return $a * $b;
}
// Operasi pembagian
function bagi($a,$b){
    if(!is_numeric($a) or !is_numeric($b)) return null;
    return $a / $b;
}
?>