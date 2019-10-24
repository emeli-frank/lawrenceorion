<?php
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
	
	public function getCategories() {
		$query = $this->db
			->select(['id', 'name'])
			->from('categories')->get();
        return $query->result();
        // return $query->row_array();
	}

	public function getProducts($id) {
		$query = $this->db
			->select(['id', 'name'])
			->from('products')
			->where('category_id', $id)->get();
        return $query->result();
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