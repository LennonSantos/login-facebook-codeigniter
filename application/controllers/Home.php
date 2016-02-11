<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	private $footer;
	private $head;
	private $nav;

	public function __construct()
	{
		parent::__construct();

		/* documento base dinamico */
		$this->head = $this->metags->head('title','keywords','description',['estilos', 'theme']);
		/* scripts dinamico */
		$this->footer = $this->metags->footer_scripts(
			["jquery.min", "fut"],
			["http://lennonsantos.com.br/script.js"]
		); 
	}

	public function index()
	{	
		//$this->head['title_page'] = 'novo title';
		$this->nav['bread_path'] = $this->metags->bread_path(
			["home &#9654; " => "/login-facebook-codeigniter",
			"inicio" => "",]
		);

		$this->load->view('master_page/head', $this->head);
		$this->load->view('master_page/nav', $this->nav);
		$this->load->view('home');
		$this->load->view('master_page/footer', $this->footer );		
	}
}
