<?php
class GajiLaporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('gaji_model');
    }


}
