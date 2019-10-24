<?php
class User_model extends CI_Model {

	public $email;
	public $password;

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('AuthService');
	}

	public function getAdminCredentials($email) {
		$this->load->database();

		$array = array('email' => $email);
		$query = $this->db
			->select(['email', 'password'])
			->from('users')
			->where('email', $email)->get();
        return $query->row_array();
	}

	public function insert($email, $password)
    {
    	$this->email = $email;
    	$this->password = $password;
        $this->db->insert('users', $this);
    }
        
}