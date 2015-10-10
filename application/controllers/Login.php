<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	public function __construct(){

		parent:: __construct();

		$this->load->library('session');
		$this->load->library('facebook');

	}

	public function index()
	{
		//url base e permisões de login
		$url_login = $this->facebook->url_login( base_url(), array('email') );

		$data = array(
			"url_login"  => $url_login,
		);

		$this->load->view('login', $data);
	}

	public function callback(){

		$callback = $this->facebook->callback();

		//print error callback, caso for uma string imprima o erro. 
		if( is_string($callback) )
			echo $callback;

		if( !empty($this->session->userdata('facebook_access_token')) && !is_string($callback) )			
        	echo "Você esta logado!";
        	// Logged in!                    
          	// Now you can redirect to another page and use the
          	// access token from $_SESSION['facebook_access_token'] 

	}

}
