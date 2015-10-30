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

	public function __construct()
	{
		parent:: __construct();

		$this->load->library('session');
		$this->load->library('facebook');
	}

	public function index()
	{
		//url base e permisões de login
		$url_login = $this->facebook->url_login( base_url(), ['email'] );

		$login = array(
			"url_login"  => $url_login,
		);

		$nav = array(
			"bread_path" => $this->metags->bread_path('/', 'Home', 'Login'),
		);

		$this->load->view('master_page/head', $this->metags->head('Login - Login com facebook e codeigniter'));
		$this->load->view('master_page/nav', $nav);
		$this->load->view('login', $login);
		$this->load->view('master_page/footer', $this->metags->scripts());
	}

	public function callback()
	{
		$user = $this->facebook->callback();

		//print error user, caso for uma string é um erro. então imprima. 
		if( is_string($user) )
			echo $user;

		if( !empty($this->session->userdata('facebook_access_token')) && !is_string($user) )
			$data = array(
				"email"      => $user['email'],
				"name"       => $user['name'],
				"first_name" => $user['first_name'],
				"middle_name"=> $user['middle_name'],
				"last_name"  => $user['last_name'],
				"gender"     => $user['gender'],
				"link"       => $user['link'],
				"locale"     => $user['locale'],
				"timezone"   => $user['timezone'],
			);

		var_dump($data);

    	// Logged in!                    
      	// Now you can redirect to another page and use the
      	// access token from $_SESSION['facebook_access_token'] 
    	//var_dump($user);
	}
}