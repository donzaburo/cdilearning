<?php
class News extends CI_Controller {

        public function __construct()
        {
                parent::__construct();
                $this->load->model('news_model');
                $this->load->helper('url_helper');
		            $this->load->helper('html');
                $this->load->library('pagination');
                $this->load->database();
        }
       public function index()
	{
	        $data['news'] = $this->news_model->get_news();
          var_dump($data);
	        $data['title'] = 'News archive';

          $config['base_url'] = 'http://192.168.241.132/news/index/';
          $config['total_rows'] = $this->db->get("$flug")->num_rows();
          $config['per_page'] = 3;

            $this->pagination->initialize($config);

	        $this->load->view('templates/header', $data);
		      $this->load->view('templates/sideber');
	        $this->load->view('news/index', $data);
	        $this->load->view('templates/footer');

	}
	public function view($slug = NULL)
	{
		$slug = urldecode($slug);

	        $data['news_item'] = $this->news_model->get_news($slug);
	        if (empty($data['news_item']))
	        {
	                show_404();
	        }

	        $data['title'] = $data['news_item']['title'];

	        $this->load->view('templates/header', $data);
           $this->load->view('templates/sideber');
	        $this->load->view('news/view', $data);
	        $this->load->view('templates/footer');
	}
	public function create()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'Create a news item';

		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if ($this->form_validation->run() === FALSE)
		{
		    $this->load->view('templates/header', $data);
         $this->load->view('templates/sideber');
		    $this->load->view('news/create');
		    $this->load->view('templates/footer');
		}
		else
		{
		    $this->news_model->set_news();

        $this->load->view('templates/header', $data);
         $this->load->view('templates/sideber');
		    $this->load->view('news/success');
        $this->load->view('templates/footer');
		}
	}
	public function update($slug)
	{

		$this->load->helper('form');
		$this->load->library('form_validation');

		$data['title'] = 'update a news item';


		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('text', 'Text', 'required');

		if ($this->form_validation->run() === FALSE)
		{
		    $slug = urldecode($slug);
		    $data['news_item'] = $this->news_model->get_news($slug);
		    $this->load->view('templates/header', $data);
         $this->load->view('templates/sideber');
		    $this->load->view('news/update', $data);
		    $this->load->view('templates/footer');
		}
		else
		{
		    $this->news_model->update_entry($slug);
        $this->load->view('templates/header', $data);
         $this->load->view('templates/sideber');
		    $this->load->view('news/success2');
        $this->load->view('templates/footer');
		}
	}
	public function delete($id)
	{
		$this->news_model->delete_entry($id);
		redirect('news/');
	}
}
