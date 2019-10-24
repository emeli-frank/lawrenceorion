<?php
class Category_model extends CI_Model {

	public $id;
	public $name;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}

	public function insert($name)
    {
    	$this->name = $name;
        $this->db->insert('categories', $this);
    }
        
}