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

	public function getCategory($category_id) {
		$query = $this->db
			->select(['id', 'name'])
			->from('categories')
			->where('id', $category_id)->get();
		return $query->row();
	}
	
	public function getCategories() {
		$query = $this->db
			->select(['id', 'name'])
			->from('categories')
			->order_by('id', 'DESC')
			->get();
		return $query->result();
	}

	public function update($category_id, $category_name) {
		// $this->db->from('categoreis')->where(['id' => $category_id])->set(['name' => $category_name]);
		
		$this->name = $category_name;
		$this->id = $category_id;
        $this->db->update('categories', $this, ['id' => $category_id]);

		/* $sql = "UPDATE categories SET name='$category_name' WHERE id=$category_id"; //TODO:: change, sql injection is possible
		$query = $this->db->query($sql); */
	}

	public function delete($category_id) {
		$this->db->where('category_id', $category_id)->delete('products');
		$this->db->where('id', $category_id)->delete('categories');
		
		/* $sql = "DELETE FROM products WHERE category_id=$category_id"; //TODO:: change, sql injection is possible
		$query = $this->db->query($sql);

		$sql = "DELETE FROM categories WHERE id=$category_id"; //TODO:: change, sql injection is possible
		$query = $this->db->query($sql); */

		return true; // TODO:: improve
	}

	public function getCategoryCount() {
		return $this->db->from("categories")->count_all_results();
	}
}