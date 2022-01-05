<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_monitor extends CI_Model{

    public function create($unit,$output,$apikey){//simpan data monitoring
        $data = array('unit_id' => $unit,
        'output'=>$output,
        'api_key'=>$apikey,
        'monitor_created'=>date('Y-m-d H-i-s'));
        $query = $this->db->insert('monitor_client', $data);
        return $query;
    }
    public function getByUnitId($id){//ambil data berdasarkan unit id
        $this->db->where('unit_id', $id);
        $query = $this->db->get('monitor_client');
        return $query;
    }
    public function getByApiKey($key){//ambil data berdasarkan api key
        $this->db->where('api_key', $key);
        $this->db->order_by('monitor_created','desc');
        $query = $this->db->get('monitor_client');
        return $query;
    }
    public function deleteByUnitId($id){//hapus berdasarkan unit id
        $this->db->where('unit_id', $id);
        $query = $this->db->delete('monitor_client');
        return $query;
    }
    public function getLastByUnitId($unit){//ambil data terakhir berdasarkan unit id 
        $this->db->where('unit_id', $unit);
        $this->db->limit(1);
        $this->db->order_by('id_monitor','desc');
        $query = $this->db->get('monitor_client');
        return $query;
    }
    function getByUnitIdReport($id){//ambil 200 data monitoring terakhir
        $this->db->where('unit_id', $id);
        $this->db->order_by('monitor_created','desc');
        $this->db->limit(200);
        $query = $this->db->get('monitor_client');
        return $query;
    }

}