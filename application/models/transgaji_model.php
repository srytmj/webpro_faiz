<?php
class transgaji_model extends CI_Model {
    function simpan_gaji() {
        $tanggal = $this->input->post('tanggal');
        $nama_pegawai = $this->input->post('pegawai');
        $jumlah_proyek = $this->input->post('jumlah_proyek');

        $pegawai_data = $this->db->get_where('pegawai', array('nama_pegawai' => $nama_pegawai))->row_array();

        if ($pegawai_data['status_pegawai'] == 'pegawai tetap') {
            $gaji_pokok = 9000000;
        } else {
            $gaji_pokok = 4000000;
        }

        // Calculate total gaji
        $total_gaji = $jumlah_proyek * $gaji_pokok;

        $data_gaji = array(
            'id_pegawai'        => $pegawai_data['id_pegawai'],
            'tanggal'           => $tanggal,
            'gaji_pokok'        => $gaji_pokok,
            'jumlah_proyek'     => $jumlah_proyek,
            'status'            => $pegawai_data['status_pegawai'],
            'total_gaji'        => $total_gaji,
        );

        // Insert data into gaji table
        $this->db->insert('gaji', $data_gaji);
    }
    public function tampil_detail_gaji() {
        $this->db->select('gd.id_gaji, p.nama_pegawai, gd.gaji_pokok, gd.jumlah_proyek, p.status_pegawai, gd.tanggal');
        $this->db->from('gaji as gd');
        $this->db->join('pegawai as p', 'gd.id_pegawai = p.id_pegawai', 'left');
        $query = $this->db->get();

        // Make sure the result is an array of objects
        return $query->result();
    }
    function tampil_detail_gaji_formatted($filter_status, $filter_tanggal) {
        $this->db->select('gd.id_gaji, p.nama_pegawai, gd.gaji_pokok, gd.jumlah_proyek, p.status_pegawai, gd.tanggal');
        $this->db->from('gaji as gd');
        $this->db->join('pegawai as p', 'gd.id_pegawai = p.id_pegawai', 'left');
    
        if ($filter_status !== '') {
            $this->db->where('p.status_pegawai', $filter_status);
        }
    
        if (!empty($filter_tanggal)) {
            // Ubah format tanggal sesuai dengan format tanggal di database
            $formatted_date = date('Y-m-d', strtotime($filter_tanggal."-31"));
            $this->db->where('gd.tanggal <=', $formatted_date);
        }
    
        $query = $this->db->get();
    
        if ($query->num_rows() > 0) {
            return $query->result(); // Make sure the result is an array of objects
        } else {
            return array(); // or handle empty result as needed
        }
    }  

    function hapusitem($id) {
        $this->db->where('id_gaji', $id);
        $this->db->delete('gaji');
    }

    function selesai_gaji($data) {
        $this->db->insert('transaksi', $data);
        $last_id = $this->db->query("SELECT id_transaksi FROM transaksi ORDER BY id_transaksi DESC LIMIT 1")->row_array();
        $this->db->query("UPDATE gaji SET id_transaksi = '" . $last_id['id_transaksi'] . "' WHERE status = '0'");
        $this->db->query("UPDATE gaji SET status = '1' WHERE status = '0'");
    }
    // function filter_gaji_bydate($date) {
    //     // Get orders based on the specified status and date
    //     $this->db->where('tanggal ', $date);
    //     $query = $this->db->get('gaji');
    //     return $query->result_array();
    // }
}
?>
