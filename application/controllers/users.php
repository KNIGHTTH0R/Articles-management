<?php
class Users extends CI_Controller
{
	public function articles()
	{
		$this->load->helper('form');
		$this->load->model('articlesmodel');
		$this->load->library('pagination');
		$config=
    	         [
    	         'base_url'      => base_url('users/articles'),
                 'per_page'      => 5,
                 'total_rows'    => $this->articlesmodel->records_count(),
                 'full_tag_open' => "<ul class='pagination'>",
                 'full_tag_close'=> "</ul>",
                 'next_tag_open' => '<li>',
                 'next_tag_close'=> '</li>',
                 'prev_tag_open' => '<li>',
                 'prev_tag_close'=> '</li>',
                 'num_tag_open'  => '<li>',
                 'num_tag_close' => '</li>',
                 'cur_tag_open'  => "<li class='active'><a>",
                 'cur_tag_close' => '</a></li>',
                 ];
        $this->pagination->initialize($config);
        $articles=$this->articlesmodel->articles_list( $config['per_page'],$this->uri->segment(3) );

        $this->load->view('pages/articles_list',['articles'=>$articles]);
	}

	public function search()
	{
		if(!$this->session->userdata('user_id'))
    		return redirect('login/admin_login');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('query','Query','required');
    	if(!$this->form_validation->run() )
    	  return $this->articles();
	      $query=$this->input->post('query');
	      $this->load->model('articlesmodel');
	      $articles=$this->articlesmodel->search($query);
	      $this->load->view('pages/search_result',compact('articles'));
    }

    public function article($article_id)
    {
    	$this->load->helper('form');
    	$this->load->model('articlesmodel');
    	$article=$this->articlesmodel->find($article_id);
    	$this->load->view('pages/article_details',compact('article'));
    }
}