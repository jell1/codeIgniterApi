<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require (APPPATH.'libraries/REST_Controller.php');
require (APPPATH . 'libraries/Format.php');
use Restserver\Libraries\REST_Controller;

class Recipes extends REST_Controller {
	public function __construct() {
        parent::__construct();
        Header('Access-Control-Allow-Origin: *'); //for allow any domain, insecure
Header('Access-Control-Allow-Headers: *'); //for allow any headers, insecure
Header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE'); //method allowed
        $this->load->helper('url');
        $this->load->model('Recipes_model');
    }

    public function MeasurementOptions_get() {
        $this->load->model('Recipes_model');

        $response = $this->Recipes_model->getMeasurementOptions();

        if($response) {
            $this->response($response, 200);
        } else {
            $this->response(array(), 201);
        }
    }

    public function MeasurementOptions_post() {
        $this->load->model('Recipes_model');

        $label = $this->post('label');
        $value = $this->post('value');

        $response = $this->Recipes_model->createMeasurementOptions($label,$value);

        if($response) {
            $this->response($response, 200);
        } else {
            $this->response(array(), 201);
        }
    }
}