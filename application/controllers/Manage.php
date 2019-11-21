<?php

class Manage extends CI_controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('category_model');
		$this->load->model('product_model');
	}

    public function seed() {
    	// creating categories and products
    	$this->clean('products');
    	$this->clean('categories');
    	for ($i = 1; $i <= 5; $i++) {
    		$this->category_model->create("Category $i");
			$category_id = $this->db->insert_id();
			
			$number_of_product = rand(0, 10);
			$custom_field = [
				'label' => 'Lorem ipsum dolor',
				'body' => '
					Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
					labore et dolore magna aliqua. Velit euismod in pellentesque massa placerat duis. Quis 
					eleifend quam adipiscing vitae. Sit amet cursus sit amet dictum. Sollicitudin aliquam 
					ultrices sagittis orci a. Quis hendrerit dolor magna eget. Vitae sapien pellentesque 
					habitant morbi tristique. Purus non enim praesent elementum facilisis leo vel fringilla 
					est. Turpis in eu mi bibendum. Adipiscing vitae proin sagittis nisl. Nunc pulvinar 
					sapien et ligula ullamcorper malesuada proin libero.
					'
			];
			$custom_fields = [$custom_field, $custom_field, $custom_field, $custom_field];

    		for ($product_index = 1; $product_index <= $number_of_product; $product_index++) {
    			$this->product_model->create(
					"Product $i" . "_" . "$product_index", 
					$category_id,
					"product-placeholder-image.jpg",
					8000,
					4500,
					"https://www.jumia.com",
					"
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
						labore et dolore magna aliqua. Velit euismod in pellentesque massa placerat duis. Quis 
						eleifend quam adipiscing vitae. Sit amet cursus sit amet dictum. Sollicitudin aliquam 
						ultrices sagittis orci a. Quis hendrerit dolor magna eget. Vitae sapien pellentesque 
						habitant morbi tristique. Purus non enim praesent elementum facilisis leo vel fringilla 
						est. Turpis in eu mi bibendum. Adipiscing vitae proin sagittis nisl. Nunc pulvinar 
						sapien et ligula ullamcorper malesuada proin libero.
					",
					json_encode($custom_fields)
				);
    		}
		}

		echo 'done';
		echo '<br><a href="/">Home</a>';
	}

    private function clean($table) {
    	$query = $this->db->query("DELETE FROM $table");
    }

}