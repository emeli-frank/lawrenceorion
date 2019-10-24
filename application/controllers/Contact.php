<?php

class Contact extends CI_controller {
    public function index($page = 'home') {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();
        }

        
        if ($this->input->post('input-names') 
            && $this->input->post('input-email') 
            && $this->input->post('input-message')) {

            $names = $this->input->post('input-names');
            $email = $this->input->post('input-email');
            $message = $this->input->post('input-message');

            // print_r($names .' '.$email.' '.$message);

            $this->load->library('email');

            $this->email->from('frank@gmail.com', 'Jon Doe');
            $this->email->to('p.carlfrank@gmail.com');

            $this->email->subject('Email Test');
            $this->email->message('Testing the email class.');

            $this->email->send();
        }
        else {
            $this->load->view('templates/header');
            $this->load->view('pages/contact-us');
            $this->load->view('templates/footer');
        }
    }
}