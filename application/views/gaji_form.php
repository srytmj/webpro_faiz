<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Transaksi Gaji</title>
    <!-- Use a different Bootstrap theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.0/cerulean/bootstrap.min.css">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
</head>

<body>
    <div class="container">
        <h2 class="mt-4">FORM GAJI</h2>
        <?php echo form_open('gaji'); ?>
        <div class="row mt-3">
            <div class="col-sm-6">
                <!-- Replace the input with a dropdown list -->
                <select name="pegawai" class="form-control">
                    <option value="Budi Santoso">Budi Santoso</option>
                    <option value="Siti Rahayu">Siti Rahayu</option>
                    <option value="Ahmad Wibowo">Ahmad Wibowo</option>
                    <option value="Rina Setiawati">Rina Setiawati</option>
                    <option value="Denny Prasetyo">Denny Prasetyo</option>
                    <option value="Anisa Putri">Anisa Putri</option>
                    <option value="Rizki Ramadhan">Rizki Ramadhan</option>
                </select>
            </div>
            <div class="col-sm-1">
                <input type="number" name="jumlah_proyek" placeholder="jml" class="form-control" required min="0">
            </div>
            <div class="col-sm-5">
                <!-- Input field for the date -->
                <input type="date" name="tanggal" class="form-control" required>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-sm-12">
                <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            </div>
            <div class="col-sm-12">
                <a href="<?= site_url('gaji/laporan'); ?>" class="button">Filter</a>
            </div>
        </div>
        <?php echo form_close(); ?>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan dan Tahun</th>
                    <th>Nama Pegawai</th>
                    <th>Status Pegawai</th>
                    <th>Gaji Pokok</th>
                    <th>Jumlah Proyek</th>
                    <th>Total Gaji</th>
                    <th>Cancel</th>
                </tr>
            </thead>
            <body>
                <?php
                $no = 1;
                $total = 0;

                foreach ($detail as $r) {
                    $gaji_total = 0;

                    if ($r->status_pegawai == 'pegawai tetap') {
                        $gaji_total = $r->jumlah_proyek * $r->gaji_pokok;
                        $gaji_pokok = $r->gaji_pokok;
                    } else {
                        $gaji_total = $r->jumlah_proyek * 4000000;
                        $gaji_pokok = 4000000;
                    }

                    echo "<tr>
                        <td>$no</td>
                        <td>" . date('F Y', strtotime($r->tanggal)) . "</td>
                        <td>" . $r->nama_pegawai . "</td>
                        <td>" . $r->status_pegawai . "</td>
                        <td>" . $gaji_pokok . "</td>
                        <td>" . $r->jumlah_proyek . "</td>
                        <td>" . $gaji_total . "</td>
                        <td>" . anchor('gaji/hapusitem/' . $r->id_gaji, '<i class="fas fa-trash-alt"></i> Hapus', array('class' => 'btn btn-danger btn-sm')) . "</td>
                    </tr>";

                    $total += $gaji_total;
                    $no++;
                }
                ?>
                <tr>
                    <td colspan="6">Total</td>
                    <td colspan=""><?php echo $total ?></td>
                    <td></td>
                </tr>
            </body>
        </table>
    </div>

    <!-- Add Bootstrap JS and Popper.js scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>