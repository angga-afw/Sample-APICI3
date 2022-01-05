<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;
require APPPATH . '/libraries/RESTController.php';
require APPPATH . '/libraries/Format.php';

// require_once APPPATH . '/libraries/JWT.php';
// use \Firebase\JWT\JWT;

class Api extends RestController
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

  public function mhs_get(){
    $data = $this->Mahasiswa_model->getMahasiswa();
    $this->response($data);
  }

  public function mhsby_get(){
    $nim=$this->get('kd_siswa'); //menggunakan parameters
    // $nim=$this->input->get_request_header('kd_siswa',true);  //menggunakan header
    $data = $this->Mahasiswa_model->getMahasiswaBy($nim);
    $this->response($data);
  }
  // input data
  function insert_post() {
      $data = array(
        'nama' => $this->post('nama'),
        'jenis_kelamin' => $this->post('jenis_kelamin'),
        'tempat_lahir' => $this->post('tempat_lahir'),
        'tanggal_lahir' => $this->post('tanggal_lahir'),
        'no_telp' => $this->post('no_telp'),
        'alamat' => $this->post('alamat'));
      $insert = $this->db->insert('tb_siswa', $data);
      if ($insert) {
        $this->response($data, 200);
      } else {
        $this->response(array('status' => 'fail', 502));
      }
    }
    //update data
    function update_put() {
        $nim = $this->put('kd_siswa');
        $data = array(
          'nama' => $this->put('nama'),
          'jenis_kelamin' => $this->put('jenis_kelamin'),
          'tempat_lahir' => $this->put('tempat_lahir'),
          'tanggal_lahir' => $this->put('tanggal_lahir'),
          'no_telp' => $this->put('no_telp'),
          'alamat' => $this->put('alamat'));
        $update = $this->db->update('tb_siswa', $data,array('kd_siswa' => $nim));
        if ($update) {
          $this->response($data, 200);
        } else {
          $this->response(array('status' => 'fail', 502));
        }
      }
     //hapus data
     function hapus_delete() {
        $nim = $this->delete('kd_siswa');
        $this->db->where('kd_siswa', $nim);
        $delete = $this->db->delete('tb_siswa');
        if ($delete) {
          $this->response(array('status'=>'sukses'), 200);
        } else {
          $this->response(array('status' => 'gagal', 502));
        }
      }
}


/* End of file Api.php */
/* Location: ./application/controllers/Api.php */