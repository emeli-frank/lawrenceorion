<?php
/* 
Product fields
	id
	name
	category id
	image path
	previous price
	price
	jumia url
	short description
	custom fields
*/

class Product_model extends CI_Model {

	public $id;
	public $category_id;
	public $name;
	public $image_path;
	public $old_price;
	public $price;
	public $jumia_product_url;
	public $short_description;
	public $custom_fields;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function create(
		$name, 
		$category_id,
		$image_path,
		$price,
		$old_price,
		$jumia_product_url,
		$short_description,
		$custom_fields
		){

    	$this->name = $name;
		$this->category_id = $category_id;
		$this->image_path = $image_path;
		$this->old_price = $old_price;
		$this->price = $price;
		$this->jumia_product_url = $jumia_product_url;
		$this->short_description = $short_description;
		$this->custom_fields = $custom_fields;
		// print_r($this); die();
        $this->db->insert('products', $this);
	}
	
	public function getCategories() {
		$query = $this->db
			->select(['categories.id', 'categories.name', 'COUNT(products.id) as product_count'])
			->from('categories')
			->join('products', 'categories.id = products.category_id', 'left')
			->group_by('categories.id')
			->get();
			/* print_r($query->result()[0]);
			die(); */
        return $query->result();
        // return $query->row_array();
	}

	public function getProducts($category_id = null, $start_index, $number) {
		$query;
		$select = ['id', 'name', 'category_id', 'image_path', 'price', 'old_price', 'jumia_product_url', 'short_description', 'custom_fields'];


		if ($category_id == null) {
			$query = $this->db
				->select($select)
				->from('products')
				->limit($number, $start_index)->get();
			
			// echo("null<br>");print_r(count($query->result()));die();
		}
		else {
			$query = $this->db
				->select($select)
				->from('products')
				->where('category_id', $category_id)
				->limit($number, $start_index)->get();
			// print_r($query->result());die();
		}

		/* print_r($query->result());
		die(); */

		return $query->result();
	}

	public function setProductImage($product_id) {

	}

	public function getDetails($id) {
		$query = $this->db
			->select(['id', 'name', 'category_id', 'price', 'old_price', 'image_path', 'jumia_product_url', 'custom_fields', 'short_description'])
			->from('products')
			->where('id', $id)->get();

		return $query->result();
	}

	public function update($id, $category_id, $name)
    {
		/* $this->id = $id;
		$this->name = $name; */
		$this->db->where('id', $id);
		$this->db->update('products', ['name' => $name, 'category_id' => $category_id]);
		return ($this->db->affected_rows() >= 0);
    }

	public function getTotalNumberOfProduct($category_id = null) {
		if ($category_id == null) {
			return $this->db->from("products")->count_all_results();
		}
		else {
			return $this->db->where(['category_id'=>$category_id])->from("products")->count_all_results();
		}
	}

	public function delete($product_id) {
		// $this->db->delete('products', ['id', $product_id]);
		$sql = "DELETE FROM products WHERE id=$product_id"; //TODO:: change, sql injection is possible
		$query = $this->db->query($sql);
		// print_r($query->result());
		// die();
		// return $query->result_array();
	}

	public function categoryExist($category_id) {
		$query = $this->db->from('categories')->select(['id'])->where(['id' => $category_id])->get();
		return ($query->row()) ? true : false;
	}

	public function productExist($product_id) {
		$query = $this->db->from('products')->select(['id'])->where(['id' => $product_id])->get();
		return ($query->row()) ? true : false;
	}

	public function productCategoryId($product_id) {
		$query = $this->db->from('products')->select(['category_id'])->where(['id' => $product_id])->get();
		$result = $query->row();
		return $result->category_id;
	}

	/* public function getCategory() {
		$array = array('email' => $email);
		$query = $this->db
			->select(['id', 'name'])
			->from('categories')
			->where('email', $email)->get();
        return $query->row_array()
	} */
}