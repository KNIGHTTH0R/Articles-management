<?php
class Loginmodel extends CI_MODEL
{
	public function login_valid($username,$password)
	{
		$q=$this->db->where(['username'=>$username,'password'=>$password])->get('users');

		if($q->num_rows())
		{

			return TRUE;
		}
		else
		{
			return FALSE;
		}             
	}
}