<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proyek extends CI_Controller
{
  public function index()
  {
    // Fetch proyek data
    $api_url_proyek = 'https://example.com/api/proyek';
    $curl_proyek = curl_init($api_url_proyek);
    curl_setopt($curl_proyek, CURLOPT_RETURNTRANSFER, true);
    $response_proyek = curl_exec($curl_proyek);
    curl_close($curl_proyek);

    // Fetch lokasi data
    $api_url_lokasi = 'https://example.com/api/lokasi';
    $curl_lokasi = curl_init($api_url_lokasi);
    curl_setopt($curl_lokasi, CURLOPT_RETURNTRANSFER, true);
    $response_lokasi = curl_exec($curl_lokasi);
    curl_close($curl_lokasi);

    // Decode the JSON responses
    $data['proyek'] = json_decode($response_proyek, true);
    $data['lokasi'] = json_decode($response_lokasi, true);

    // Load the view with data
    $this->load->view('proyek_lokasi_list', $data);
  }

  public function create()
  {
    $this->load->view('proyek_lokasi_input');
  }

  // public function store() {
  //     // Input data proyek
  //     $nama_proyek = $this->input->post('nama_proyek');
  //     $nama_lokasi = $this->input->post('nama_lokasi');

  //     // Data proyek untuk dikirim ke API
  //     $data_proyek = array('nama_proyek' => $nama_proyek);
  //     $api_url_proyek = 'https://example.com/api/proyek';
  //     $curl_proyek = curl_init($api_url_proyek);
  //     curl_setopt($curl_proyek, CURLOPT_POST, true);
  //     curl_setopt($curl_proyek, CURLOPT_POSTFIELDS, http_build_query($data_proyek));
  //     curl_setopt($curl_proyek, CURLOPT_RETURNTRANSFER, true);
  //     $response_proyek = curl_exec($curl_proyek);
  //     curl_close($curl_proyek);

  //     // Data lokasi untuk dikirim ke API
  //     $data_lokasi = array('nama_lokasi' => $nama_lokasi);
  //     $api_url_lokasi = 'https://example.com/api/lokasi';
  //     $curl_lokasi = curl_init($api_url_lokasi);
  //     curl_setopt($curl_lokasi, CURLOPT_POST, true);
  //     curl_setopt($curl_lokasi, CURLOPT_POSTFIELDS, http_build_query($data_lokasi));
  //     curl_setopt($curl_lokasi, CURLOPT_RETURNTRANSFER, true);
  //     $response_lokasi = curl_exec($curl_lokasi);
  //     curl_close($curl_lokasi);

  //     redirect('proyek');
  // }

  public function edit($id_proyek, $id_lokasi)
  {
    // Fetch proyek data
    $api_url_proyek = 'https://example.com/api/proyek/' . $id_proyek;
    $curl_proyek = curl_init($api_url_proyek);
    curl_setopt($curl_proyek, CURLOPT_RETURNTRANSFER, true);
    $response_proyek = curl_exec($curl_proyek);
    curl_close($curl_proyek);

    // Fetch lokasi data
    $api_url_lokasi = 'https://example.com/api/lokasi/' . $id_lokasi;
    $curl_lokasi = curl_init($api_url_lokasi);
    curl_setopt($curl_lokasi, CURLOPT_RETURNTRANSFER, true);
    $response_lokasi = curl_exec($curl_lokasi);
    curl_close($curl_lokasi);

    // Decode the JSON responses
    $data['proyek'] = json_decode($response_proyek, true);
    $data['lokasi'] = json_decode($response_lokasi, true);

    $this->load->view('proyek_lokasi_edit', $data);
  }

  // public function update($id_proyek, $id_lokasi) {
  //     $nama_proyek = $this->input->post('nama_proyek');
  //     $nama_lokasi = $this->input->post('nama_lokasi');

  //     // Update proyek
  //     $data_proyek = array('nama_proyek' => $nama_proyek);
  //     $api_url_proyek = 'https://example.com/api/proyek/'.$id_proyek;
  //     $curl_proyek = curl_init($api_url_proyek);
  //     curl_setopt($curl_proyek, CURLOPT_CUSTOMREQUEST, "PUT");
  //     curl_setopt($curl_proyek, CURLOPT_POSTFIELDS, http_build_query($data_proyek));
  //     curl_setopt($curl_proyek, CURLOPT_RETURNTRANSFER, true);
  //     curl_exec($curl_proyek);
  //     curl_close($curl_proyek);

  //     // Update lokasi
  //     $data_lokasi = array('nama_lokasi' => $nama_lokasi);
  //     $api_url_lokasi = 'https://example.com/api/lokasi/'.$id_lokasi;
  //     $curl_lokasi = curl_init($api_url_lokasi);
  //     curl_setopt($curl_lokasi, CURLOPT_CUSTOMREQUEST, "PUT");
  //     curl_setopt($curl_lokasi, CURLOPT_POSTFIELDS, http_build_query($data_lokasi));
  //     curl_setopt($curl_lokasi, CURLOPT_RETURNTRANSFER, true);
  //     curl_exec($curl_lokasi);
  //     curl_close($curl_lokasi);

  //     redirect('proyek');
  // }

  public function delete($id_proyek, $id_lokasi)
  {
    // Delete proyek
    $api_url_proyek = 'https://example.com/api/proyek/' . $id_proyek;
    $curl_proyek = curl_init($api_url_proyek);
    curl_setopt($curl_proyek, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl_proyek, CURLOPT_RETURNTRANSFER, true);
    curl_exec($curl_proyek);
    curl_close($curl_proyek);

    // Delete lokasi
    $api_url_lokasi = 'https://example.com/api/lokasi/' . $id_lokasi;
    $curl_lokasi = curl_init($api_url_lokasi);
    curl_setopt($curl_lokasi, CURLOPT_CUSTOMREQUEST, "DELETE");
    curl_setopt($curl_lokasi, CURLOPT_RETURNTRANSFER, true);
    curl_exec($curl_lokasi);
    curl_close($curl_lokasi);

    // Redirect after deletion
    redirect('proyek');
  }
}
