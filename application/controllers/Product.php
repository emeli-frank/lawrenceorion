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
        $this->load->helper(['form', 'url']);
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

        // $config['base_url'] = "/categories/" . ($category_id) ? $category_id : "all";
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
        $data = [
            // $this->product_model->getDetails($product_id),
            'product' => $this->product_model->getDetails($product_id),
            'category' => $this->category_model->getCategory($category_id)
        ];

        // print_r($this->product_model->getDetails($product_id));
        // die();

        $this->load->view('templates/header');
        $this->load->view('pages/fragments/product-detail', $data);
        $this->load->view('templates/footer');
        // hiding footer because it snaps to top when background image and content container are floated
        // $this->load->view('templates/footer'); 
    }

    public function doAddProduct() {
        if (isset($_FILES["product-image"])) {
            
            $this->load->library('form_validation');
            $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
            $this->form_validation->set_rules('name', 'Product name', 'trim|required|min_length[1]');
            $this->form_validation->set_rules('category_id', 'Category', 'required');
            $this->form_validation->set_rules('product-description', 'Product description', 'required|min_length[8]|max_length[256]');
            $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
            $this->form_validation->set_rules('old-price', 'Old price', 'trim|numeric');
            // $this->form_validation->set_rules('old-price', 'Old price', 'trim|numeric|xss_clean');
            $this->form_validation->set_rules('jumia-product-url', 'Jumia product link', 'required');
            // $this->form_validation->set_rules('product-image', 'Product image', 'required');
            if ($this->form_validation->run() == FALSE) {
                // $this->session->set_flashdata('error', 'An error occured, refill relevant fields and try again');
                if (isset($category_id)) {
                    $this->addProduct($category_id);
                    // redirect("categories/$category_id/products/add");
                }
                else if (! empty($this->input->post('category_id'))) {
                    $category_id = $this->input->post('category_id');
                    $this->addProduct($category_id);
                    // redirect("categories/$category_id/products/add");
                }
                else {
                    $this->addProduct(null);
                    // redirect("categories/all");
                }
            }
            else {
                // die('passed');
                // if ($this->input->post('product_id')) { $product_id = $this->input->post('product_id')}
                $name = $this->input->post('name');
                $category_id = $this->input->post('category_id');
                $product_description = $this->input->post('product-description');
                $price = $this->input->post('price');
                $old_price = $this->input->post('old-price');
                $jumia_product_url = $this->input->post('jumia-product-url');
                $custom_fields = $this->input->post('custom-field-data');

                $fileExt = pathinfo($_FILES["product-image"]["name"], PATHINFO_EXTENSION);
                $image_path = time() . '.' . $fileExt;

                $result = $this->product_model->create(
                    $name,
                    $category_id, 
                    $image_path,
                    $price,
                    $old_price,
                    $jumia_product_url,
                    $product_description,
                    $custom_fields
                    );

                $insert_id = $this->db->insert_id();

                $status = $this->doUpload($image_path, $insert_id);

                if ($status['success']) {
                    $this->session->set_flashdata('success', 'Product was successfully created');
                }
                else {
                    $this->session->set_flashdata('error', 'Something was wrong with the image you tried to upload');
                }
                
                redirect("categories/$category_id");
            }
        }
        else {
            $this->session->set_flashdata('error', 'An error occured, refill relevant fields and try again');
            if (isset($category_id)) {
                $this->addProduct($category_id);
                // redirect("categories/$category_id/products/add");
            }
            else if (! empty($this->input->post('category_id'))) {
                $category_id = $this->input->post('category_id');
                $this->addProduct($category_id);
                // redirect("categories/$category_id/products/add");
            }
            else {
                $this->addProduct(null);
                // redirect("categories/all");
            }
        }
    }

    private function doUpload($image_path, $insert_id) {
        // return ['success' => true];

        $config['upload_path']          = './product-images/';
        $config['allowed_types']        = 'gif|jpg|jpeg|png';
        $config['max_size']             = 500;
        $config['file_name']             = $image_path;

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('product-image')) {
            $error = ['error' => $this->upload->display_errors()];

            print_r($error);
            die();

            if ($insert_id) {
                $this->product_model->delete($insert_id);
            }

            return ['success' => false, error => $error];
        }
        
        $data = array('upload_data' => $this->upload->data());

        return ['success' => true];
    }

    public function addProduct($category_id = null) {
        $data = [
            'category_id' => $category_id,
            'categories' => $this->category_model->getCategories(),
        ];
        $this->load->view('templates/header');
        $this->load->view('pages/fragments/product-add', $data);
        $this->load->view('templates/footer');
    }
    
    public function editProduct($product_id) {
        $data = [
            'product' => $this->product_model->getProduct($product_id),
            'categories' => $this->category_model->getCategories()
        ];
        
        $this->load->view('templates/header');
        $this->load->view('pages/fragments/product-add', $data);
        $this->load->view('templates/footer');

        // $this->doEditProduct($product_id);





    }

    public function doEditProduct($product_id) {
        if ( 
            // $this->input->post('name') || 
            $this->input->post('product-id')
            && $this->input->post('name') 
            && $this->input->post('category_id')
            && $this->input->post('product-description')
            && $this->input->post('price')
            && $this->input->post('old-price')
            && $this->input->post('jumia-product-url')
            && $this->input->post('custom-field-data')
            ) {

            $product_id = $this->input->post('product-id');
            $name = $this->input->post('name');
            $category_id = $this->input->post('category_id');
            $product_description = $this->input->post('product-description');
            $price = $this->input->post('price');
            $old_price = $this->input->post('old-price');
            $jumia_product_url = $this->input->post('jumia-product-url');
            $custom_fields = $this->input->post('custom-field-data');
            $image_path = null;

            /* if (empty($_FILES["product-image"]["name"])) {
                die('empty');
            }
            else {
                die('not empty');
            } */

            /* print_r($_FILES["product-image"]);
            die(); */
            
            if ( !empty($_FILES["product-image"]['name']) ) {
                // die('file is not empty');
                $fileExt = pathinfo($_FILES["product-image"]["name"], PATHINFO_EXTENSION);
                $image_path = time() . '.' . $fileExt;
            }
            else {
                // die('file is empty');
            }

            // die($fileExt);

            /* $foo = (isset($image_path)) ? $image_path : null;
            print_r($foo);
            die(); */

            $result = $this->product_model->update(
                $product_id,
                $name, 
                $category_id,
                $image_path,
                $price,
                $old_price,
                $jumia_product_url,
                $product_description,
                $custom_fields
            );

            if ( !empty($_FILES["product-image"]['name']) ) {
                // die('not empty, uploading');
                $status = $this->doUpload($image_path, null);
            } /* else { die('empty, not uploading');} */

            if ($status['success']) {
                $this->session->set_flashdata('success', 'Product was successfully created');
            }
            else {
                $this->session->set_flashdata('error', 'Product was not created');
            }
            
            redirect("/categories/$category_id/products/$product_id");
        }
        else {
            die('does not have all requried data');
            $this->session->set_flashdata('error', 'An error occured, refill relevant fields and try again');
            if (isset($category_id)) {
                redirect("categories/$category_id");
            }
            else {
                redirect("categories/all");
            }
        }




        /* if ($this->input->post('product_id') && $this->input->post('name') && $this->input->post('category_id')) {
            $category_id = 1; // TODO:: remove!
            $product_id = $this->input->post('product_id');
            $name = $this->input->post('name');
            $result = $this->product_model->update($product_id, $category_id, $name);
            print('affected row: <h1>' . $result . '</h1>');
        } */
    }

    public function deleteProduct($product_id) {
        $category_id = $this->product_model->productCategoryId($product_id);

        $this->product_model->delete($product_id);
        $this->session->set_flashdata('success', 'The item was successfully deleted');

		redirect("/categories/$category_id");
    }

}
