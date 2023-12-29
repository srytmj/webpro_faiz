<?php
function hitung_pajak($total_belanja){
    return $total_belanja*0.1;
}
function hitung_diskon($total_belanja,$diskon){
    return $total_belanja*($diskon/100);
}
function hitung_harga_setelah_diskon($total_belanja,$diskon){
    return $total_belanja-hitung_diskon($total_belanja,$diskon);
}
function total_harga_setelah_pajak($total_belanja,$diskon){
    return $total_belanja-hitung_diskon($total_belanja,$diskon)+hitung_pajak($total_belanja);
}
?>