<?php
class Articlesmodel extends CI_Model
{
	public function articles_list($limit,$offset)
	{
		
        $user_id=$this->session->userdata('user_id');

		$query=$this->db->select('sr_no')->select('title')->select('created_at')->select('body')->where('user_id',$user_id)->limit($limit,$offset)->order_by('created_at','DESC')->get('articles');

        return $query->result();
	}

	public function records_count() 
	{
		$user_id=$this->session->userdata('user_id');
        return $this->db->count_all('articles');
    }

	public function add_article($array)
	{
		return $this->db->insert('articles',$array);

	}
	

	public function fetch_article($article_id)
	{

      $q=$this->db->select('sr_no')->select('title')->select('body')->where('sr_no',$article_id)->get('articles');
      
      return $q->row();
	}


	public function update_article($article_id, Array $article)
	{
		return $this->db->where('sr_no',$article_id)->update('articles',$article);
	}

	public function delete_article($article_id)
	{
		return $this->db->delete('articles',['sr_no'=>$article_id]);
	}
	public function search($query)
    {
        $q=$this->db->from('articles')->like('title',$query)->get();
        return $q->result();
    }

    public function find($article_id)
    {
    	$q=$this->db->from('articles')->where(['sr_no'=>$article_id])->get();
    	
    	return $q->row();
    	
    }
}