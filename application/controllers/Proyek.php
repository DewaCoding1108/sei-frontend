<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyek extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper(array('form'));  // Load the form helper
    $this->load->library('form_validation');  // Load the form validation library
    // Load any necessary models or libraries here
  }

  public function add()
  {
    $restURLLokasi = "http://localhost:8080/lokasi";
    $lokasi = file_get_contents($restURLLokasi);
    $lokasi = json_decode($lokasi, true);
    $data = array(
      'lokasi' => $lokasi
    );


    $this->load->view('add_proyek', $data); // Load the view for the "Add Proyek" page
  }

  public function save()
  {

    $namaProyek = isset($_POST['namaProyek']) ? $_POST['namaProyek'] : '';
    $client = isset($_POST['client']) ? $_POST['client'] : '';
    $tglMulai = isset($_POST['tglMulai']) ? ($_POST['tglMulai'] . 'T00:00:00') : '';
    $tglSelesai = isset($_POST['tglSelesai']) ? ($_POST['tglSelesai'] . 'T00:00:00') : '';
    $pimpinanProyek = isset($_POST['pimpinanProyek']) ? $_POST['pimpinanProyek'] : '';
    $keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : '';
    $lokasi_id = isset($_POST['lokasi_id']) ? $_POST['lokasi_id'] : '';

    $restURLLokasi = "http://localhost:8080/lokasi/";
    $lokasiUrl = $restURLLokasi . $lokasi_id;
    $lokasi = file_get_contents($lokasiUrl);

    if ($lokasi === FALSE) {
      // Handle error: location not found or request failed
      redirect('proyek/add?status=tidakadalokasi');
      return;
    }
    $lokasi_data = json_decode($lokasi);
    // Prepare data for API
    $data = array(
      'namaProyek' => $namaProyek,
      'client' => $client,
      'tglMulai' => $tglMulai,
      'tglSelesai' => $tglSelesai,
      'pimpinanProyek' => $pimpinanProyek,
      'keterangan' => $keterangan,
      'lokasi' => $lokasi_data
    );

    $restURLProyek = "http://localhost:8080/proyek";


    $json_data = json_encode($data);

    // Set up POST context
    $context = stream_context_create(array(
      'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json_data
      )
    ));
    // Send data to the API using file_get_contents
    $response = file_get_contents($restURLProyek, false, $context);

    // Decode response
    $status_code = $http_response_header[0];

    // Handle response
    if (strpos($status_code, '201') !== false) {
      // Redirect with success message
      redirect('proyek/add?status=success');
    } else {
      // Redirect with error message
      redirect('proyek/add?status=error');
    }
  }

  public function edit($id)
  {
    $restURLProyek = "http://localhost:8080/proyek/" . $id;
    $proyek = file_get_contents($restURLProyek);
    $proyek = json_decode($proyek, true);
    $data = array(
      'proyek' => $proyek
    );

    $this->load->view('update_proyek', $data); // Load the view for the "Add Proyek" page
  }

  public function update($id)
  {
    $restURLProyek = "http://localhost:8080/proyek/" . $id;

    $namaProyek = isset($_POST['namaProyek']) ? $_POST['namaProyek'] : '';
    $client = isset($_POST['client']) ? $_POST['client'] : '';
    $tglMulai = isset($_POST['tglMulai']) ? ($_POST['tglMulai'] . 'T00:00:00') : '';
    $tglSelesai = isset($_POST['tglSelesai']) ? ($_POST['tglSelesai'] . 'T00:00:00') : '';
    $pimpinanProyek = isset($_POST['pimpinanProyek']) ? $_POST['pimpinanProyek'] : '';
    $keterangan = isset($_POST['keterangan']) ? $_POST['keterangan'] : '';
    $lokasi_id = isset($_POST['lokasi_id']) ? $_POST['lokasi_id'] : '';

    $restURLLokasi = "http://localhost:8080/lokasi/";
    $lokasiUrl = $restURLLokasi . $lokasi_id;
    $lokasi = file_get_contents($lokasiUrl);

    if ($lokasi === FALSE) {
      // Handle error: location not found or request failed
      redirect('proyek/add?status=tidakadalokasi');
      return;
    }
    $lokasi_data = json_decode($lokasi);

    $data = array(
      'namaProyek' => $namaProyek,
      'client' => $client,
      'tglMulai' => $tglMulai,
      'tglSelesai' => $tglSelesai,
      'pimpinanProyek' => $pimpinanProyek,
      'keterangan' => $keterangan,
      'lokasi' => $lokasi_data
    );

    $json_data = json_encode($data);

    // Set up POST context
    $context = stream_context_create(array(
      'http' => array(
        'method'  => 'PUT',
        'header'  => 'Content-type: application/json',
        'content' => $json_data
      )
    ));
    // Send data to the API using file_get_contents
    $response = file_get_contents($restURLProyek, false, $context);

    // Decode response
    $status_code = $http_response_header[0];

    // Handle response
    if (strpos($status_code, '200') !== false) {
      // Redirect with success message
      redirect('proyek/edit/' . $id . '?status=success');
    } else {
      // Redirect with error message
      redirect('proyek/edit/' . $id . '?status=error');
    }
    // $this->load->view('update_proyek', $data); // Load the view for the "Add Proyek" page
  }
}
