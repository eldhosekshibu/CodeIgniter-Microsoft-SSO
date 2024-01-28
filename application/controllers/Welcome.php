<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	function __construct() {
	    parent::__construct();
	    
	    $this->load->helper('url');
	    $this->load->library('microsoft_auth');
	    $this->load->library('session');
	    $this->load->config('microsoft');
	   
	}
	public function index()
	{
		$data['auth_url'] = $this->microsoft_auth->getLoginUrl();
        $this->load->view('welcome', $data);
	}

	public function callback()
    {
        $userdata = $this->microsoft_auth->handleCallback();
        // print_r($userdata);
        // Use $userdata as needed
        // ...
        if($userdata){
        	echo "<p>Name : ".$userdata["displayName"]."</p>";
        	echo "<p>Email : ".$userdata["mail"]."</p>";
        }else{
        	echo "Some thing went wrong. Please try again later.";
        }

        // Example: Redirect to the next page
        // redirect('welcome/form');
    }

    public function logout()
    {
        $logout_url = $this->microsoft_auth->logout();

        // Redirect the user to the logout URL
        header("Location: $logout_url");
        exit;
    }
}
