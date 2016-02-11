<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	private $footer;
	private $head;
	private $nav;

	public function __construct()
	{
		parent:: __construct();

		$this->load->library('session');
		$this->load->library('facebook');

		/* documento base dinamico */
		$this->head = $this->metags->head('title - login','keywords','description',['estilos', 'theme']);
		/* scripts dinamico */
		$this->footer = $this->metags->footer_scripts(
			["jquery.min", "fut"],
			["http://lennonsantos.com.br/script.js"]
		); 
	}

	public function index()
	{
		//url base e permisões de login
		$url_login = $this->facebook->url_login( base_url() );

		$login = array(
			"url_login"  => $url_login,
		);

		$this->nav['bread_path'] = $this->metags->bread_path(
			["home &#9654; " => "/login-facebook-codeigniter",
			"faça login com o facebook" => "",]
		);

		$this->load->view('master_page/head', $this->head);
		$this->load->view('master_page/nav', $this->nav);
		$this->load->view('login', $login);
		$this->load->view('master_page/footer', $this->footer );
	}

	public function callback()
	{
		$user = $this->facebook->callback();

		//print error user, caso for uma string é um erro. então imprima. 
		if( is_string($user) )
			echo $user;

		if( !empty($this->session->userdata('facebook_access_token')) && !is_string($user) )
		{
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

			print_r($data);
		}
		//var_dump($user);

    	// Logged in!                    
      	// Now you can redirect to another page and use the
      	// access token from $_SESSION['facebook_access_token'] 
    	//var_dump($user);
	}
}