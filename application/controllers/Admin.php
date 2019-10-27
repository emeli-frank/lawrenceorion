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

            echo "<br><br><br><br><br>not authenticated";

        }
    }

    /* public function __construct() {
        parent::__construct();
        $this->load->library('Authservice');
        if (!$this->authservice->isLoggedIn()) {
            redirect('/');;
        }
    } */

    public function index() {
        $this->load->view('templates/header');
        $this->load->view('pages/admin/dashboard');
        $this->load->view('templates/footer');
    }

    public function login() {
        if ($this->input->post('email') && $this->input->post('password')) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->library('Authservice');
            $this->authservice->validateLoginCredentials($email, $password);
        }
        else {
            $this->load->view('templates/header');
            $this->load->view('pages/admin/login');
            $this->load->view('templates/footer');
        }
    }

    public function logout() {
        $this->load->library('Authservice');
        $this->authservice->logout();
    }

    public function register() {
        if ($this->input->post('email') && $this->input->post('password')) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->library('Authservice');
            $this->authservice->createUser($email, $password);
        }
        else {
            $this->load->view('templates/header');
            $this->load->view('pages/admin/register');
            $this->load->view('templates/footer');
        }
    }
}