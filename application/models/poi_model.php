<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

class Poi_model extends CI_Model
{
	public $table_name = "tbl_poi";

	public function addNewPOI($data){
		 $this->db->insert($this->table_name, $data);
	}

	public function getAllPois() {
		$query = $this->db->get($this->table_name);
        
        $result = $query->result();        
        return $result;
	}

	public function getAllPoisArray() {
		$query = $this->db->get($this->table_name);
        
        $result = $query->result_array();        
        return $result;
	}

	public function getPOIById($poi_id){
		$this->db->where('poi_id', $poi_id);
		$query = $this->db->get($this->table_name);
        
        $result = $query->result();        
        return $result[0];
	}

	public function updatePoiById($poi_id, $data){
		$this->db->where('poi_id', $poi_id);
		$this->db->update($this->table_name, $data);
	}

	public function deleteById($poi_id){
		$this->db->where('poi_id', $poi_id);
		$this->db->delete($this->table_name);
	}
}
   