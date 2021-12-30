<?php
class Test_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function getTodos() {
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
}