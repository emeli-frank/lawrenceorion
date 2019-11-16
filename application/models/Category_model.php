<?php
class Category_model extends CI_Model {

	public $id;
	public $name;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function create($name)
    {
    	$this->name = $name;
        $this->db->insert('categories', $this);
	}
	
	public function getCategories() {
		$query = $this->db
			->select(['id', 'name'])
			->from('categories')->get();
		return $query->result();
	}

	public function delete($category_id) {
		$sql = "DELETE FROM products WHERE category_id=$category_id"; //TODO:: change, sql injection is possible
		$query = $this->db->query($sql);

		$sql = "DELETE FROM categories WHERE id=$category_id"; //TODO:: change, sql injection is possible
		$query = $this->db->query($sql);

		return true; // TODO:: improve
	}
}