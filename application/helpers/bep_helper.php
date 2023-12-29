<?php

function hitungbepunit($tfc, $p, $v) {
    return $tfc / ($p - $v);
}

function hitungbepwaktu($tfc, $p, $v, $x) {
    return hitungbepunit($tfc, $p, $v) / $x;
}

function hitungbepnilai($tfc, $p, $v) {
    return $tfc / (1 - ($v/$p));
}
