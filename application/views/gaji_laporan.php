<!DOCTYPE html>
<html lang="en">

<head>
    <title>Laporan Gaji</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body class="container mt-4">
    <!-- Formulir Filter -->
    <form action="<?= site_url('GajiLaporan'); ?>" method="get" class="mb-4">
    <div class="form-row align-items-end">
        <div class="form-group col-md-3">
            <label for="filter_status">Filter Status:</label>
            <select name="filter_status" class="form-control">
                <option value="" <?= ($filter_status == '') ? 'selected' : ''; ?>>Semua</option>
                <option value="pegawai tetap" <?= ($filter_status == 'pegawai tetap') ? 'selected' : ''; ?>>Pegawai Tetap</option>
                <option value="Tidak tetap" <?= ($filter_status == 'Tidak tetap') ? 'selected' : ''; ?>>Tidak Tetap</option>
            </select>
        </div>
        <div class="form-group col-md-3">
            <label for="filter_tanggal">Filter Tanggal:</label>
            <input type="month" name="filter_tanggal" value="<?= $filter_tanggal; ?>" class="form-control">
        </div>
        <div class="form-group col-md-2">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </div>
</form>


    <table class="table table-bordered">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Bulan dan Tahun</th>
                <th scope="col">Nama Pegawai</th>
                <th scope="col">Status Pegawai</th>
                <th scope="col">Total Gaji</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $total = 0;

            foreach ($detail as $r) {
                $gaji_total = ($r->status_pegawai == 'pegawai tetap') ? ($r->jumlah_proyek * $r->gaji_pokok) : ($r->jumlah_proyek * 4000000);
                $gaji_pokok = ($r->status_pegawai == 'pegawai tetap') ? $r->gaji_pokok : 4000000;

                echo "<tr>
                    <td>$no</td>
                    <td>" . date('F Y', strtotime($r->tanggal)) . "</td>
                    <td>" . $r->nama_pegawai . "</td>
                    <td>" . $r->status_pegawai . "</td>
                    <td>" . format_rp($gaji_total) . "</td>
                </tr>";

                $total += $gaji_total;
                $no++;
            }
            ?>
            <tr>
                <td colspan="4">Total</td>
                <td colspan=""><?= format_rp($total) ?></td>
            </tr>
        </tbody>
    </table>

    <!-- Include Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
