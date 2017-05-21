<?php
class Admin extends CI_CONTROLLER
{

    public function __construct()
    {
    	parent::__construct();
    	if(!$this->session->userdata('user_id'))
    		return redirect('login/admin_login');
    	$this->load->library('pagination');
    	$this->load->helper('form');
		$this->load->model('articlesmodel');
	}


	
    public function dashboard()
    {  
    	$this->load->library('pagination');
    	$this->load->helper('form');
		$this->load->model('articlesmodel');
    	$config=
    	         [
    	         'base_url'      => base_url('admin/dashboard'),
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

        $this->load->view('admin/dashboard',['articles'=>$articles]);
    }


    public function add_article()
    {
    	$this->load->helper('form');
    	$this->load->view('admin/add_article');
    }   


    function store_article()
    {
        $config=[
                 'upload_path'   => './uploads',
                 'allowed_types' =>'jpg|png|jpeg|gif|mp4|3gp',
                ];
        $this->load->library('upload',$config);        
    	$this->load->library('form_validation');
    	if($this->form_validation->run('add_article_rules') && $this->upload->do_upload() )
    	{
             $post=$this->input->post();
             unset($post['submit']);
             $data=$this->upload->data();
             //print_r($data); exit;
             $image_path=base_url("uploads/" . $data['raw_name'] . $data['file_ext']);
             $post['image_path']=$image_path;
             $this->load->model('articlesmodel');
             if($this->articlesmodel->add_article($post))
             {
             	$this->session->set_flashdata('feedback',"Article Added Successfuly");
             	$this->session->set_flashdata('feedback_class','alert-success');
             }
             else
             {
             	//echo "Failed";
             	$this->session->set_flashdata('feedback',"Article Failed to Add,Please Try Again");
             	$this->session->set_flashdata('feedback_class','alert-danger');
             }
             return redirect('admin/dashboard');
    	}
    	else
    	{
            $upload_error=$this->upload->display_errors();
    		$this->load->view('admin/add_article',compact('upload_error'));
    	}
    }

    function edit_article($article_id)
    { 
    	$this->load->helper('form');
    	$this->load->model('articlesmodel');
    	$article=$this->articlesmodel->fetch_article($article_id);
    	$this->load->view('admin/edit_article',['article'=>$article]);
    }

    function update_article($article_id)
    { 

        $this->load->library('form_validation');
    	if($this->form_validation->run('add_article_rules') )
    	{
             $post=$this->input->post();
             
             unset($post['submit']);
             $this->load->model('articlesmodel');
             if($this->articlesmodel->update_article($article_id,$post))
             {
             	$this->session->set_flashdata('feedback',"Article Updated Successfuly");
             	$this->session->set_flashdata('feedback_class','alert-success');
             }
             else
             {
             	//echo "Failed";
             	$this->session->set_flashdata('feedback',"Article Failed to Update,Please Try Again");
             	$this->session->set_flashdata('feedback_class','alert-danger');
             }
             return redirect('admin/dashboard');
    	}
    	else
    	{
    		$this->load->view('admin/edit_article');
    	}
    }

    function delete_article()
    {
       $article_id=$this->input->post('article_id');
       $this->load->model('articlesmodel'); 
       if($this->articlesmodel->delete_article($article_id) )
             {
             	$this->session->set_flashdata('feedback',"Article Deleted Successfuly");
             	$this->session->set_flashdata('feedback_class','alert-success');
             }
             else
             {
             	//echo "Failed";
             	$this->session->set_flashdata('feedback',"Article Failed to Delete,Please Try Again");
             	$this->session->set_flashdata('feedback_class','alert-danger');
             }
             return redirect('admin/dashboard');
    }


    

}

