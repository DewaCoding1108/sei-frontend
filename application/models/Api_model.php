<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api_model extends CI_Model {

    private $api_url = 'http://localhost:8080/';

    public function __construct() {
        parent::__construct();
    }

    private function fetch_data($endpoint) {
        $url = $this->api_url . $endpoint;
        $response = file_get_contents($url);
        return json_decode($response, true);
    }

    public function get_proyek() {
        return $this->fetch_data('proyek'); // API endpoint for projects
    }

    public function get_lokasi() {
        return $this->fetch_data('lokasi'); // API endpoint for locations
    }
}
?>