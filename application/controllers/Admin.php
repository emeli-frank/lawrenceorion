<?php

class Admin extends CI_controller {
    function __construct()
    {
        parent::__construct();
        $this->load->library('Authservice');
        if ( ! $this->authservice->isLoggedIn()) {
            // Allow some methods?
            $allowed = [
                'login',
                'register',
            ];
            if ( ! in_array($this->router->fetch_method(), $allowed)) {
                redirect('/');
            }
        }
    }

    public function index() {
        $this->load->view('templates/header');
        $this->load->view('pages/admin/dashboard');
        $this->load->view('templates/footer');
    }
}