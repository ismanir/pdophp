<?php

class About extends Controller {

  public function index($nama = 'params nama',$pekerjaan = 'params pekerjaan') { //params / parameter dari url
    //passing data to view
    $data['nama'] = $nama;
    $data['pekerjaan'] = $pekerjaan;
    $data['judulHalaman'] = 'About';

    $this->view('templates/header',$data);
    $this->view('about/index', $data);
    $this->view('templates/footer');
  }

  public function page () {

    $data['judulHalaman'] = 'Pages';
    $this->view('templates/header',$data);
    $this->view('about/page');
    $this->view('templates/footer');
  }

}