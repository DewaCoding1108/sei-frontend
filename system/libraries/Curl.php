<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Curl {

    private $ch;

    public function __construct() {
        $this->ch = curl_init();
    }

    public function __destruct() {
        curl_close($this->ch);
    }

    public function simple_get($url) {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($this->ch);
        if (curl_errno($this->ch)) {
            throw new Exception(curl_error($this->ch));
        }
        return $response;
    }

    public function simple_post($url, $data) {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_POST, true);
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($this->ch);
        if (curl_errno($this->ch)) {
            throw new Exception(curl_error($this->ch));
        }
        return $response;
    }

    public function simple_put($url, $data) {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($this->ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($this->ch);
        if (curl_errno($this->ch)) {
            throw new Exception(curl_error($this->ch));
        }
        return $response;
    }

    public function simple_delete($url) {
        curl_setopt($this->ch, CURLOPT_URL, $url);
        curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($this->ch);
        if (curl_errno($this->ch)) {
            throw new Exception(curl_error($this->ch));
        }
        return $response;
    }
}