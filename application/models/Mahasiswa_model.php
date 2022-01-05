<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 *
 * Model Mahasiswa_model
 *
 * This Model for ...
 * 
 * @package		CodeIgniter
 * @category	Model
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Mahasiswa_model extends CI_Model {

  // ------------------------------------------------------------------------

  function create($id,$key){
      $data = array('user_id' => $id,
      'key'=>$key,
      'level'=>2,//isi terserah ynag penting angka karena tipe data int
      'date_created'=>date('Ymd'));
      $query = $this->db->insert('keys', $data);
      return $query;
  }
  function verifyCreate($id,$key){
      $this->db->where('user_id', $id);
      $this->db->where('key', $key);
      $query = $this->db->get('keys');
      return $query;
  }
  function getByUser($user){
      $this->db->where('user_id', $user);
      $this->db->limit('1');
      $query = $this->db->get('keys');
      return $query;
  }

  public function getMahasiswa(){
    $q = "select * from tb_siswa";
    $q = $this->db->query($q);
    $row = $q->result();
    return $row;
  }

  public function getMahasiswaBy($nim){
    $q = "select * from tb_siswa where kd_siswa='$nim'";
    $q = $this->db->query($q);
    $row = $q->result();
    return $row;
  }

  function login_user($username,$password)
	{
        $query = $this->db->get_where('tb_user',array('username'=>$username));
        if($query->num_rows() > 0)
        {
            $data_user = $query->row();
            if (password_verify($password, $data_user->password)) {
                $this->session->set_userdata('username',$username);
                $this->session->set_userdata('nama',$data_user->nama);
                $this->session->set_userdata('is_login',TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
	}
}

/* End of file Mahasiswa_model.php */
/* Location: ./application/models/Mahasiswa_model.php */