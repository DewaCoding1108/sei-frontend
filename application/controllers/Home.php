<?php

class Home extends CI_Controller
{


  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $restURLProyek = "http://localhost:8080/proyek";
    $restURLLokasi = "http://localhost:8080/lokasi";
    $proyek = file_get_contents($restURLProyek);
    $lokasi = file_get_contents($restURLLokasi);
    $proyek = json_decode($proyek, true);
    $lokasi = json_decode($lokasi, true);
    $data = array(
      'proyek' => $proyek,
      'lokasi' => $lokasi
  );
    $this->load->view('home', $data);
  }
}
