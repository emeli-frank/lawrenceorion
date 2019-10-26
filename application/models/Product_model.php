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

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert($name, $category_id)
    {
    	$this->name = $name;
    	$this->category_id = $category_id;
        $this->db->insert('products', $this);
	}

	public function create($category_id, $name)
    {
    	$this->name = $name;
    	$this->category_id = $category_id;
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

	public function getProducts($id, $start_index, $number) {
		$query = $this->db
			->select(['id', 'name'])
			->from('products')
			->where('category_id', $id)
			->limit($number, $start_index)->get();
		return $query->result();
	}

	public function getDetails($id) {
		$query = $this->db
			->select(['id', 'name', 'category_id'])
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
		return $this->db->where(['category_id'=>$category_id])->from("products")->count_all_results();
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