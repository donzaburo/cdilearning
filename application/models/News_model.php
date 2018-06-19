<?php
class News_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
	public function get_news($slug = FALSE)
	{
	        if ($slug === FALSE)
	        {
	                $query = $this->db->order_by('id','DESC')->get('news');
	                return $query->result_array();
	        }

	        $query = $this->db->get_where('news', array('slug' => $slug));

		return $query->row_array();
	}
	public function set_news()
	{
	    $this->load->helper('url');

	    $slug = url_title($this->input->post('title'), 'dash', TRUE);

	    $data = array(
	        'title' => $this->input->post('title'),
	        'slug' => $slug,
	        'text' => $this->input->post('text')
	    );

	    return $this->db->insert('news', $data);
	}
	public function update_entry($id)
	{
	    $slug = url_title($this->input->post('title'), 'dash', TRUE);
	    $data = array(
	        'title' => $this->input->post('title'),
	        'slug' => $slug,
	        'text' => $this->input->post('text')
	    );
			$this->db->where('id', $id);
			$this->db->update('news', $data);
			echo $this->db->last_query();
	}
	public function delete_entry($id)
	{
		$slug = urldecode($slug);
		$this->db->where('id', $id);
		$this->db->delete('news');
	}
}
