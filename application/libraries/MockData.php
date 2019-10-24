<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MockData {

    protected $CI;

    public function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->helper('url');
	}

	public function run() {

	}
	
}