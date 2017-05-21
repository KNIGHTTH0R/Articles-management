<?php
class pages extends CI_Controller{
	public function view($page='articles_list')
	{
		if(!file_exists(APPPATH.'views/pages/'.$page.'.php'))
		{
			show_404();
		}
		$data['title']=ucfirst($page);
		$this->load->view('templates/header');
		$this->load->view('pages/'.$page,$data);
		$this->load->view('templates/footer');

        $this->load->model('articlesmodel');
		$this->load->library('pagination');
		$config=
    	         [
    	         'base_url'      => base_url('users/index'),
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
        return $articles=$this->articlesmodel->articles_list( $config['per_page'],$this->uri->segment(3) );
        
       
   }	
	
}
?>