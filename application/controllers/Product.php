<?php

class Product extends CI_controller {
    static public $no_of_products_to_load = 20;

    public function __construct() {
        parent::__construct();
        $this->load->library('Authservice');
        if ( ! $this->authservice->isLoggedIn()) {
            // Allow some methods?
            $allowed = [
                // 'index',
                'showProductDetail',
                'showCategoriesAndProducts',
                'foo',
            ];
            if ( ! in_array($this->router->fetch_method(), $allowed)) {
                redirect('/');
            }
        }

        $this->load->model('category_model');
        $this->load->model('product_model');
        $this->load->helper('url');
    }

    public function showCategoriesAndProducts($category_id = null) {
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
        
        $data['category_view'] = $this->load->view(
            'pages/fragments/category-list', 
            ['categories' => $categories, 'current_category_id' => $category_id, 'all_category_class' => (!$category_id) ? 'active' : ''], 
            true
        );


        $this->load->library('pagination');

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
                        'category_id' => $category_id,
                    ], true);
        }
        else {
            $data['product_view'] = $this->load->view('pages/fragments/product-list', 
                    [
                        'products' => $this->product_model->getProducts(null, $start_index, Product::$no_of_products_to_load),
                        'pagination_view' => $data['pagination_view'],
                        'category_id' => null // TODO:: fix, this might be bad
                    ], true);
        }

        $this->load->view('templates/header');
        $this->load->view('pages/product-manager', $data);
        $this->load->view('templates/footer');
    }

    public function showProductDetail($category_id, $product_id) {
        if (!$this->product_model->productExist($product_id)) {
            show_404();
        }
        $data = ['data' => $this->product_model->getDetails($product_id)];

        $this->load->view('templates/header');
        $this->load->view('pages/fragments/product-detail', $data['data'][0]);
        // hiding footer because it snaps to top when background image and content container are floated
        // $this->load->view('templates/footer'); 
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
        if (
            $this->input->post('name') 
            && $this->input->post('category_id')
            && $this->input->post('product-description')
            && $this->input->post('price')
            && $this->input->post('old-price')
            && $this->input->post('jumia-product-url')
            && $this->input->post('custom-field-data')
            ) {

            // die("Adding product");

            $name = $this->input->post('name');
            $product_description = $this->input->post('product-description');
            $price = $this->input->post('price');
            $old_price = $this->input->post('old-price');
            $jumia_product_url = $this->input->post('jumia-product-url');
            $image_path = "product-placeholder-image.jpg";
            $short_description = null;
            $custom_fields = $this->input->post('custom-field-data');

            $result = $this->product_model->create(
                $name,
                $category_id, 
                $image_path,
                $price,
                $old_price,
                $jumia_product_url,
                $short_description,
                $custom_fields
            );
            $this->session->set_flashdata('success', 'Product was successfully created');  
            // print('affected row: <h1>' . $result . '</h1>');
            redirect("categories/$category_id");
        }
        else {
            $data = [
                'category_id' => $category_id,
                'categories' => $this->category_model->getCategories(),
            ];
            $this->load->view('templates/header');
            $this->load->view('pages/fragments/product-add', $data);
            $this->load->view('templates/footer');
        }
        
		/* print_r($this->category_model->getCategories()[0]);
		die(); */
    }

    public function deleteProduct($product_id) {
        $category_id = $this->product_model->productCategoryId($product_id);
        $this->product_model->delete($product_id);
        $this->session->set_flashdata('success', 'The item was successfully deleted');
        // print( $this->session->flashdata('success') );
        // die();
		redirect("/categories/$category_id");
    }

}