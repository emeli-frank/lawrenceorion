<?php

class Product extends CI_controller {
    public function index() {
        $this->load->view('templates/header');
        $this->load->view('pages/fragments/product-list');
        $this->load->view('templates/footer');
    }

}