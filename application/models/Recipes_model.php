<?php
class Recipes_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getMeasurementOptions() {
        $sql = 'SELECT * FROM MeasurementOptions;';
    
        // creates a data array of arguments for sql query
        // $data = array($Mode);
        
        // use this if need to pass data into query
        // $query = $this->db->query($sql, $data);
        
        // use this if no data for query
        $query = $this->db->query($sql);
    
        $result = $query->result_array();
        
        
        return $result;
    }

    public function createMeasurementOptions($label, $value) {
        $sql = 'INSERT INTO MeasurementOptions (Label, Value)
        VALUES (?,?)';
    
        // creates a data array of arguments for sql query
        $data = array('label' => $label, 'value' => $value);
        
        // use this if need to pass data into query
        $resp = $this->db->query($sql, $data);
    
        return $resp;
    }
}