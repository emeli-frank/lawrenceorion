<?php

class Category extends CI_controller {
    static public $no_of_products_to_load = 20;

    public function __construct() {
        parent::__construct();
        $this->load->library('Authservice');
        $this->load->model('category_model');
        $this->load->model('product_model');
        if ( ! $this->authservice->isLoggedIn()) {
            // Allow some methods?
            $allowed = [
                
            ];
            if ( ! in_array($this->router->fetch_method(), $allowed)) {
                redirect('/');
            }
        }

    }

    public function showCategories() {
        $categories = $this->product_model->getCategories();
        $data = [
            'categories' => $categories,
        ];

        $this->load->view('templates/header');
        $this->load->view('pages/fragments/category-list-admin', $data);
        $this->load->view('templates/footer');
    }

    public function bar($category_id) {
        $data  = [
            // 'action' => ($category_id) ? 'edit' : 'add',
            'category_id' => $category_id,
            'category_name' => 'category_name',
        ];

        if (
            $this->input->post('category-name')
            && $this->input->post('category-id')
        ) {
            $category_name = $this->input->post('category-name');
            $category_id = $this->input->post('category-id');
            
            $this->category_model->update($category_id, $category_name);
            $this->session->set_flashdata('success', 'Changes have been saved'); 
            redirect("/categories"); //TODO:: se if you can call back refere url 
        }
        else if ($this->input->post('category-name')) {
            $category_name = $this->input->post('category-name');
            $category_id = $this->input->post('category-id');
            
            $this->category_model->create($category_name);
            $this->session->set_flashdata('success', 'Category created'); 
            redirect("/categories"); //TODO:: se if you can call back refere url 
        }
        else {
            $this->load->view('templates/header');
            $this->load->view('pages/category/category-create', $data);
            $this->load->view('templates/footer');
        }
    }

    private function loadForm($category_id) {
        $data = ['category_id' => $category_id];

        $this->load->view('templates/header');
        $this->load->view('pages/category/category-create', $data);
        $this->load->view('templates/footer');
    }

    public function addCategory() {
        if ($this->input->post('category-name')) {
            $this->bar(null);
        }
        else {
            $this->loadForm(null);
        }
    }

    public function editCategory($category_id) {
        if ($this->input->post('category-name') && $this->input->post('category-id')) {
            $this->bar($category_id);
        }
        else {
            $this->loadForm($category_id);
        }
    }

    public function deleteCategory($category_id) {
        $this->category_model->delete($category_id);
        $this->session->set_flashdata('success', 'Product was sccessfully deleted'); 
        redirect("/categories"); //TODO:: se if you can call back refere url 
    }

}