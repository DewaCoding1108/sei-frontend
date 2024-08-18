<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Lokasi extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // Load any necessary models or libraries here
    $this->load->helper(array('form'));  // Load the form helper
    $this->load->library('form_validation');  // Load the form validation library
  }

  public function add()
  {
    $this->load->view('add_lokasi'); // Load the view for the "Add Proyek" page
  }

  public function save()
  {
    $namaLokasi = isset($_POST['namaLokasi']) ? $_POST['namaLokasi'] : '';
    $kota = isset($_POST['kota']) ? $_POST['kota'] : '';
    $provinsi = isset($_POST['provinsi']) ? $_POST['provinsi'] : '';
    $negara = isset($_POST['negara']) ? $_POST['negara'] : '';

    // Prepare data for API
    $data = array(
      'namaLokasi' => $namaLokasi,
      'kota' => $kota,
      'provinsi' => $provinsi,
      'negara' => $negara
    );

    // Convert data to JSON
    $json_data = json_encode($data);

    $restURLLokasi = "http://localhost:8080/lokasi";

    // Set up POST context
    $context = stream_context_create(array(
      'http' => array(
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json_data
      )
    ));
    // Send data to the API using file_get_contents
    $response = file_get_contents($restURLLokasi, false, $context);

    // Decode response
    $response_data = json_decode($response, true);

    $status_code = $http_response_header[0];

    // Handle response
    if (strpos($status_code, '200') !== false) {
      // Redirect with success message
      redirect('lokasi/add?status=success');
    } else {
      // Redirect with error message
      redirect('lokasi/add?status=error');
    }
  }

  public function edit($id)
  {
    $restURLLokasi = "http://localhost:8080/lokasi/" . $id;
    $lokasi = file_get_contents($restURLLokasi);
    $lokasi = json_decode($lokasi, true);
    $data = array(
      'lokasi' => $lokasi
    );

    $this->load->view('update_lokasi', $data); // Load the view for the "Add Proyek" page
  }

  public function update($id)
  {
    $namaLokasi = isset($_POST['namaLokasi']) ? $_POST['namaLokasi'] : '';
    $kota = isset($_POST['kota']) ? $_POST['kota'] : '';
    $provinsi = isset($_POST['provinsi']) ? $_POST['provinsi'] : '';
    $negara = isset($_POST['negara']) ? $_POST['negara'] : '';

    // Prepare data for API
    $data = array(
      'namaLokasi' => $namaLokasi,
      'kota' => $kota,
      'provinsi' => $provinsi,
      'negara' => $negara
    );

    // Convert data to JSON
    $json_data = json_encode($data);

    $restURLLokasi = "http://localhost:8080/lokasi/". $id;

    // Set up POST context
    $context = stream_context_create(array(
      'http' => array(
        'method'  => 'PUT',
        'header'  => 'Content-type: application/json',
        'content' => $json_data
      )
    ));
    // Send data to the API using file_get_contents
    $response = file_get_contents($restURLLokasi, false, $context);

    // Decode response
    $response_data = json_decode($response, true);

    $status_code = $http_response_header[0];

    // Handle response
    if (strpos($status_code, '200') !== false) {
      // Redirect with success message
      redirect('lokasi/edit/'.$id.'?status=success');
    } else {
      // Redirect with error message
      redirect('lokasi/edit/'.$id.'?status=error');
    }
  }
}
