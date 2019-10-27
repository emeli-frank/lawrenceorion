<?php

class Product extends CI_controller {
    static public $no_of_products_to_load = 20;

    public function __construct() {
        parent::__construct();
        $this->load->model('category_model');
        $this->load->model('product_model');
    }

    public function index() {
        $start_index = $this->input->get('per_page', true);
        $data = [
            'products' => $this->product_model->getProducts(27, $start_index, Product::$no_of_products_to_load)
        ];
        $this->load->library('pagination');

        $config['base_url'] = '/products';
        $config['total_rows'] = $this->product_model->getTotalNumberOfProduct();
        $config['per_page'] = Product::$no_of_products_to_load;
        $config['num_links'] = 3;
        $config['page_query_string'] = true;
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        $config['cur_tag_open'] = '<li class="page-item active" aria-current="page"> <span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';
        
        $this->pagination->initialize($config);

        $data['pagination_view'] = $this->load->view('pages/fragments/pagination', ['pagination_view' => $this->pagination->create_links()], true);

        $this->load->view('templates/header');
        $this->load->view('pages/fragments/product-list', $data);
        $this->load->view('templates/footer');
    }

    public function showAllProducts() {
        $this->foo(null, true);
    }

    public function showCategoriesAndProducts($category_id = null) {
        $this->foo($category_id);
    }

    private function foo($category_id = null, $all_products = false) {
        $categories = $this->product_model->getCategories();
        if ($category_id) {
            $category_exist = false;
            foreach ($categories as $category) {
                if ($category->id == $category_id) {
                    $category_exist = true;
                    break;
                }
            }

            if (!$category_exist) {
                show_404();
            }
        }
        
        $data['category_view'] = $this->load->view('pages/fragments/category-list', ['categories' => $categories], true);


        $this->load->library('pagination');

        $config['base_url'] = (!$all_products) ? '/categories/' . $category_id : '/categories/all' . $category_id; // todo:: fix, error prone and not scalable
        $config['total_rows'] = $this->product_model->getTotalNumberOfProduct($category_id);
        $config['per_page'] = Product::$no_of_products_to_load;
        $config['num_links'] = 3;
        $config['page_query_string'] = true;
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';
        $config['attributes'] = array('class' => 'page-link');
        $config['cur_tag_open'] = '<li class="page-item active" aria-current="page"> <span class="page-link">';
        $config['cur_tag_close'] = '</span></li>';

        $this->pagination->initialize($config);
        $data['pagination_view'] = $this->load->view('pages/fragments/pagination', ['pagination_view' => $this->pagination->create_links()], true);

        $start_index = $this->input->get('per_page', true);
        
        if ($category_id != null) {
            $data['product_view'] = $this->load->view('pages/fragments/product-list', 
                    [
                        'products' => $this->product_model->getProducts($category_id, $start_index, Product::$no_of_products_to_load),
                        'pagination_view' => $data['pagination_view'],
                        'category_id' => $category_id
                    ], true);
        }
        else if ($all_products) {
            $data['product_view'] = $this->load->view('pages/fragments/product-list', 
                    [
                        'products' => $this->product_model->getProducts(null, $start_index, Product::$no_of_products_to_load),
                        'pagination_view' => $data['pagination_view'],
                        'category_id' => null // TODO:: fix, this might be bad
                    ], true);
        }
        else {
            $data['product_view'] = null;
        }

        $this->load->view('templates/header');
        $this->load->view('pages/product-manager', $data);
        $this->load->view('templates/footer');
    }

    public function showProductDetail($category_id, $product_id) {
        $data = ['data' => $this->product_model->getDetails($product_id)];

        $this->load->view('templates/header');
        $this->load->view('pages/fragments/product-detail', $data['data'][0]);
        $this->load->view('templates/footer'); 
    }

    public function editProduct($category_id, $product_id) {
        if ($this->input->post('product_id') && $this->input->post('name') && $this->input->post('category_id')) {
            $product_id = $this->input->post('product_id');
            $name = $this->input->post('name');
            $result = $this->product_model->update($product_id, $category_id, $name);
            print('affected row: <h1>' . $result . '</h1>');
        }
        else {
            $data = ['data' => $this->product_model->getDetails($product_id)];
            $this->load->view('templates/header');
            $this->load->view('pages/fragments/product-edit', $data['data'][0]);
            $this->load->view('templates/footer');
        }
    }

    public function addProduct($category_id = null) {
        print_r($this->input->post('name'));
        print_r($this->input->post('category_id'));
        // die();
        if ($this->input->post('name') && $this->input->post('category_id')) {
            $name = $this->input->post('name');
            $result = $this->product_model->create($category_id, $name);
            print('affected row: <h1>' . $result . '</h1>');
        }
        else {
            $data = [
                'category_id' => $category_id,
                'categories' => $this->category_model->getCategories()
            ];
            $this->load->view('templates/header');
            $this->load->view('pages/fragments/product-add', $data);
            $this->load->view('templates/footer');
        }
        
		/* print_r($this->category_model->getCategories()[0]);
		die(); */
    }

}