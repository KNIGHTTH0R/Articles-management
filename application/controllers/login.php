<?php
class Login extends CI_CONTROLLER
{

    public function index()
	{
        $this->load->helper('form');
		$this->load->view('pages/admin_login');	
	}



	public function admin_login()
	{

        if($this->session->userdata('user_id'))
        return redirect('admin/dashboard');        
		$this->load->library('form_validation');
		
		//$this->form_validation->set_rules('username','User Name','required|trim|alpha');
		//$this->form_validation->set_rules('password','Password','required');
      
      if($this->form_validation->run('admin_login') ) //if validation passes
      {
            //success
      	    $username=$this->input->post('username');
      	    $password=$this->input->post('password');

      	    $this->load->model('loginmodel');
      	    $login_id=$this->loginmodel->login_valid($username,$password);
      	    if($login_id)
      	    {
      	    	//$this->load->library('session');
      	    	$this->session->set_userdata('user_id',$login_id);
      	    	return redirect('admin/dashboard');
      	    	//credentials valid,login user
      	    	//echo "Password Match";
      	    }
      	    else
      	    {
                //authentication failed
                //echo"password/username do not Match";
                $this->session->set_flashdata('login_failed','Invalid Username/password');
                return redirect('login/admin_login');
                
      	    }
      }

      else
      {
      	//failed
      	$this->load->view('templates/header');
      	$this->load->view('pages/admin_login');
      	$this->load->view('templates/footer');
      }
	}

    public function logout()
    {
    	$this->session->unset_userdata('user_id');
    	return redirect('login/admin_login');
    }

}
?>