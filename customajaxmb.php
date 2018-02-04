<?php

namespace Custom\Controllers;

use RightNow\Libraries\AbuseDetection,
    RightNow\Utils\Config;

class user_mb{

    public $fname;
    public $lname;
    public $email;

    function __construct($a, $b, $c){
        $this->fname = $a;
        $this->lname = $b;
        $this->email = $c;
    }

}

class customajaxmb extends \RightNow\Controllers\Base
{
    //This is the constructor for the custom controller. Do not modify anything within
    //this function.
    function __construct()
    {
        parent::__construct();
    }

    /**
     * Sample function for ajaxCustom controller. This function can be called by sending
     * a request to /ci/ajaxCustom/ajaxFunctionHandler.
     */

     function create_contact()
    {   
        // echo "Mukul";
        $fname = $this->input->post('fname');
        $lname = $this->input->post('lname');
        $email = $this->input->post('email');

        $mu = new user_mb($fname, $lname, $email);
        // echo "<pre/>";
        // print_r($mu);   
        
        $this->model('custom/custom_model_mb')->create_contact($mu);


        //Perform logic on post data here

        // echo $fname;
    }

   

    
  function saveContact()
    {
       // $postData = $this->input->post('post_data_name');
        //Perform logic on post data here
       // echo $returnedInformation;  
      try{
        
            $fname = $_POST["fname"];
            $lname = $_POST["lname"];
            $email = $_POST["email"];      
            $this->load->model('custom/crysismodel_MB3');     
        
            $data = $this->crysismodel_MB3->sampleFunction($fname, $lname, $email);
        
            echo "<pre />";
            //$data->Address->Street;
            //$data->Address->Country;
            //$data->Address->City ;
            //$data->Address->PostalCode; 
            //print_r($data);       
        
            $data->Name->First;
            $data->Name->Last;
            $data->Emails[0]->Address;
        
        
            foreach ($data as $key => $value) {
              $x = $data->$key;
              echo "<pre />";
              echo json_encode($x);
              //echo json_encode($y);
            }
            return $x;
        
        
          }
      catch(Exception $err){
                
            echo $err->getMessage();
          }
    }


}