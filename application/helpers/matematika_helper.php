<!-- Muhammad Faiz Arrasyid
6703220056
4601 -->
<?php
// fungsi untuk menghitung penjumlahan bilangan
function tambah($a, $b)
{
    if (!is_numeric($a) or !is_numeric($b))
        return NULL;
    return $a + $b;
}
// fungsi untuk menghitung perkalian bilangan
function kali($a, $b)
{
    if (!is_numeric($a) or !is_numeric($b))
        return NULL;
    return $a * $b;
}
// fungsi untuk menghitung pembagian bilangan
function bagi($a, $b)
{
    if (!is_numeric($a) or !is_numeric($b))
        return NULL;
    return $a / $b;
}
// fungsi untuk menghitung perpangkatan bilangan
function pangkat($a, $b)
{
    if (!is_numeric($a) or !is_numeric($b))
        return NULL;
    return pow($a, $b);
}
// fungsi untuk menghitung akar kuadrat dari suatu bilangan
function akar($a)
{
    if (!is_numeric($a))
        return NULL;
    return sqrt($a);
}
