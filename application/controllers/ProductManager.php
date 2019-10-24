<?php

class ProductManager extends CI_controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('product_model');
    }

    public function categories($id = null) {
        $categories = $this->product_model->getCategories();
        if ($id) {
            $category_exist = false;
            foreach ($categories as $category) {
                if ($category->id == $id) {
                    $category_exist = true;
                    break;
                }
            }

            if (!$category_exist) {
                show_404();
            }
        }
        $data['category_view'] = $this->load->view('pages/fragments/category-list', 
                ['categories' => $categories], true);
        $data['product_view'] = ($id)
                ? $this->load->view('pages/fragments/product-list', 
                        ['products' => $this->product_model->getProducts($id)], true) 
                : null;
        // $data['categories'] = ;

        // $categories = $this->product_model->get();
        /* echo("<br><br><br><br><br><br>");
        print_r($categories);
        echo("Category id is $id"); */
        // print_r($categories);
        // print_r($this->product_model->getCategories());

        $this->load->view('templates/header');
        $this->load->view('pages/product-manager', $data);
        $this->load->view('templates/footer');
    }

}