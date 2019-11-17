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

	public function update($category_id, $category_name) {
		// $this->db->from('categoreis')->where(['id' => $category_id])->set(['name' => $category_name]);
		
		$this->name = $category_name;
        $this->db->update('categories', $this, ['id' => $category_id]);

		/* $sql = "UPDATE categories SET name='$category_name' WHERE id=$category_id"; //TODO:: change, sql injection is possible
		$query = $this->db->query($sql); */
	}

	public function delete($category_id) {
		$sql = "DELETE FROM products WHERE category_id=$category_id"; //TODO:: change, sql injection is possible
		$query = $this->db->query($sql);

		$sql = "DELETE FROM categories WHERE id=$category_id"; //TODO:: change, sql injection is possible
		$query = $this->db->query($sql);

		return true; // TODO:: improve
	}
}