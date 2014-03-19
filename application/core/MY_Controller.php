<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller{
	
	//variables to view
	protected $data = Array();
	//header
	protected $page_name = FALSE;
	//the inner template
	protected $template = "page";
	//urls to resources
	protected $javascript = array();
	protected $css = array();
	protected $fonts = array();
	//strings for meta
	protected $title = FALSE;
	protected $description = FALSE;
	protected $keywords = FALSE;
	protected $author = FALSE;
	
	function __construct()
	{
		parent::__construct();

		$this->lang->load('auth');
		$this->load->helper('language');
		$this->lang->load('home');
		$this->load->library('form_validation');

		$this->data["uri_segment_1"] = $this->uri->segment(1);
		$this->data["uri_segment_2"] = $this->uri->segment(2);
		$this->title = $this->config->item('site_title');
		$this->description = $this->config->item('site_description');
		$this->keywords = $this->config->item('site_keywords');
		$this->author = $this->config->item('site_author');
		
		$this->page_name = strtolower(get_class($this));
	}
	
	protected function _render($view, $render_type = "FULLPAGE") {
        switch ($render_type) {
        case "AJAX"     :
            $this->load->view($view,$this->data);
        break;
        case "JSON"     :
            echo json_encode($this->data);
        break;
        case "FULLPAGE" :
        default			:

		$template_args["javascript"] = $this->javascript;
		$template_args["css"] = $this->css;
		$template_args["fonts"] = $this->fonts;
		
		$template_args["title"] = $this->title;
		$template_args["description"] = $this->description;
		$template_args["keywords"] = $this->keywords;
		$template_args["author"] = $this->author;

		$body_args["header"] = $this->load->view("elements/navbar",array(),true);
		$body_args["footer"] = $this->load->view("elements/footer",array(),true);
		$body_args["content"] = $this->load->view($view,array_merge($this->data,$template_args),true);

		$template_args["template"] = $this->template;
		$template_args["content"] = $this->load->view("templates/".$this->template,$body_args,true);
		
		$this->load->view("templates/base",$template_args);
		 break;
    }
	}
}
