<?php

class Home extends CI_controller {
    public function index($page = 'home') {
        if ( ! file_exists(APPPATH.'views/pages/'.$page.'.php')) {
            show_404();
        }

        $this->load->model('product_model');

        $random_products = $this->product_model->getRandomProducts(16);
        $data = [
            // 'products' => $random_products
        ];

        $product_views = [];

        $random_products = $this->product_model->getRandomProducts(16);
        for ($i = 0; $i < count($random_products); $i++) {
            $card_data = [
                'product' => $random_products[$i]
            ];
            array_push($product_views, $this->load->view("pages/fragments/product-card", $card_data, true));
        }

        // print_r($product_views[0]); die();

        $data['product_views'] = $product_views;

        $this->load->view('templates/header');
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer');
    }
}