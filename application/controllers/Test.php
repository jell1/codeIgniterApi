<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require (APPPATH.'libraries/REST_Controller.php');
require (APPPATH . 'libraries/Format.php');
use Restserver\Libraries\REST_Controller;

class Test extends REST_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Test_model');
    }

     public function users_get()
    {
        // Users from a data store e.g. database
        $users = [
            ['id' => 1, 'name' => 'John', 'email' => 'john@example.com'],
            ['id' => 2, 'name' => 'Jim', 'email' => 'jim@example.com'],
        ];

        $id = $this->get('id');
       
        if ($id === null)
        {
            // Check if the users data store contains users
            if ($users)
            {
                // Set the response and exit
                $this->response($users, 200);
            }
            else
            {
                // Set the response and exit
                $this->response([
                    'status' => false,
                    'message' => 'No users were found'
                ], 404);
            }
        }
    }

    public function todos_get() {
        // $Mode = $this->get('Mode');
        
        $this->load->model('Test_model');

        $response = $this->Test_model->getTodos();

        if($response) {
            $this->response($response, 200);
        } else {
            $this->response(array(), 201);
        }
    }
}