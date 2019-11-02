<?php

class Account extends CI_controller {

    /* public function index() {
        $this->load->view('templates/header');
        $this->load->view('pages/admin/dashboard');
        $this->load->view('templates/footer');
    } */

    public function login() {
        if ($this->input->post('email') && $this->input->post('password')) {
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            $this->load->library('Authservice');
            if ($this->authservice->validateLoginCredentials($email, $password)) {
                redirect('/admin');
            }
            else {
                redirect('/login');
            }
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
        redirect('/login');

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