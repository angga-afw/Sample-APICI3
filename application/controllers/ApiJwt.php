<?php
defined('BASEPATH') or exit('No direct script access allowed');


use chriskacerguis\RestServer\RestController;
require APPPATH . '/libraries/RESTController.php';
require APPPATH . '/libraries/Format.php';

class ApiJwt extends RESTController
{
  public function __construct()
  {
    parent::__construct();
	  $this->load->model(array('Mahasiswa_model'));
	  $this->load->database();
  }

  public function index()
  {

  }

  public function login()
	{
		$this->form_validation->set_rules('username', 'username', 'required|max_length[256]');
		$this->form_validation->set_rules('password', 'password', 'required|min_length[8]|max_length[256]');
		return Validation::validate($this, '', '', function($token, $output)
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
      $this->load->model('mahasiswa_model');
			$id = $this->mahasiswa_model->login($username, $password);
			if ($id != false) {
				$token = array();
				$token['id'] = $id;
				$output['status'] = true;
				$output['username'] = $username;
				$output['token'] = JWT::encode($token, $this->config->item('jwt_key'));
			}
			else
			{
				$output['errors'] = '{"type": "invalid"}';
			}
			return $output;
		});
	}
}


/* End of file Api.php */
/* Location: ./application/controllers/Api.php */