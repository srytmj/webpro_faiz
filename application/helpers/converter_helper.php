<?php
function formatTime($waktu, $unit)
{
    if ($unit == 'jam') {
        return $waktu . ' Jam';
    } elseif ($unit == 'menit') {
        return $waktu . ' Menit';
    } elseif ($unit == 'detik') {
        return $waktu . ' Detik';
    } elseif ($unit == 'all') {
        return $waktu['jam'] . ' Jam, ' . $waktu['menit'] . ' Menit, ' . $waktu['detik'] . ' Detik';
    } else {
        return 'Unit tidak valid';
    }
}
