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
        $this->load->model('product_model');
        $this->load->model('category_model');
        
        $product_count = $this->product_model->getTotalNumberOfProduct();
        $category_count = $this->category_model->getCategoryCount();

        $data = [
            'product_count' => $product_count,
            'category_count' => $category_count,
        ];

        $this->load->view('templates/header');
        $this->load->view('pages/admin/dashboard', $data);
        $this->load->view('templates/footer');
    }
}