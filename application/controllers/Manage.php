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
    		$this->category_model->insert("Category $i");
			$category_id = $this->db->insert_id();
			
			$number_of_product = rand(40, 50);

    		for ($product_index = 1; $product_index <= $number_of_product; $product_index++) {
    			$this->product_model->insert("Product $i" . "_" . "$product_index", $category_id);
    		}
		}

		echo 'done';
		echo '<br><a href="/">Home</a>';
	}

    private function clean($table) {
    	$query = $this->db->query("DELETE FROM $table");
    }

}