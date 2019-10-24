<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authservice {

    protected $CI;

    public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->helper('url');
	}

	public function validateLoginCredentials($email, $password) {
		$received_password = $password;

		$this->CI->load->model('user_model');
		$user_data = $this->CI->user_model->getAdminCredentials($email);
		$stored_password = $user_data['password'];

		if (password_verify($received_password, $stored_password)) {
			print('login successful');
			redirect('/admin'); //todo:: redirect to previous url if any
			return [
				'id' => null,
				'email' => $user_data['email'],
				'password' => $user_data['password'],
			];
		}
		else {
			print('login was not successful');
			redirect('/admin/login');
		}
		// $hashToStoreInDb = password_hash($password, PASSWORD_BCRYPT);
	}

	public function createUser($email, $password) {
		if (true){
			$this->CI->load->model('user_model');
			$user_data = $this->CI->user_model->insert($email, password_hash($password, PASSWORD_BCRYPT));
			print_r($user_data);
			redirect('/admin');
		}
		else {
			// do something
		}
	}
	
}