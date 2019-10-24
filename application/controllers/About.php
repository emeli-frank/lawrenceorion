<?php

class About extends CI_controller {
    public function index($page = 'home') {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();
        }

        $this->load->view('templates/header');
        $this->load->view('pages/about-us');
        $this->load->view('templates/footer');
    }
}