<?php
class Gaji extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model(array('gaji_model', 'transgaji_model'));
        $this->load->helper('formatrp');
    }

    function index() {
        if (isset($_POST['submit'])) {
            $this->transgaji_model->simpan_gaji();
            redirect('gaji');
        } else {
            $data['tanggal'] = date('Y-m-d');
            // $data['pegawai'] = $this->gaji_model->tampil_data();
            $data['detail'] = $this->transgaji_model->tampil_detail_gaji();
            $this->load->view('gaji_form', $data);
        }
    }
    function hapusitem() {
        $id = $this->uri->segment(3);
        $this->transgaji_model->hapusitem($id);
        redirect('gaji');
    }

    public function laporan()
    {
        $data['filter_status'] = $this->input->get('filter_status') ?? '';
        $data['filter_tanggal'] = $this->input->get('filter_tanggal') ?? '';
        
        $data['detail'] = $this->transgaji_model->tampil_detail_gaji_formatted($data['filter_status'], $data['filter_tanggal']);
        $this->load->view('gaji_laporan', $data);
    }
    
}