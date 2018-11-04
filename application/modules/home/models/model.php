<?php
Class model extends CI_Model {
  function __construct(){
	  parent::__construct();
	  $this->load->database();
      $this->load->helper(array('form', 'url'));
  }
  
  public function validate(){
	  $username = $this->security->xss_clean($this->input->post('username'));
	  $password = $this->security->xss_clean($this->input->post('password'));
	  $this->db->where('emailadmin', $username);
	  $this->db->where('auth', $password);
	  $query = $this->db->get('admin');
	  $adm = $query;
	  $query = $query->result_array();
	  if(count($query) >0)
	  {
		  $row = $adm->row();
		  $data = array(
				  'idAdmin' => $row->idAdmin,
				  'namaAdmin' => $row->namaAdmin,
				  'alamatAdmin' => $row->alamatAdmin,
				  'picAdmin' => $row->picAdmin,
				  'emailAdmin' => $row->emailAdmin,
				  'status' => $row->status,
				  'upline' => @$row->upline,
				  'validated' => true
				  );
		  $this->session->set_userdata('logged_in',$data);
		  return true;
	  }
	  return false;
  }
  
  function getBanyakMember(){
		$id = $this->session->userdata('logged_in');
		$this->db->where('admin.upline', $id['idAdmin']);
		$this->db->or_where('admin.idAdmin', $id['upline']);
        return  $this->db->get('admin');
    }
	
  public function UpdateProfile($user_id){
	$data["namaAdmin"] = $this->security->xss_clean($this->input->post('namaAdmin'));
	$data["alamatAdmin"] = $this->security->xss_clean($this->input->post('alamatAdmin'));
	$data["emailAdmin"] = $this->security->xss_clean($this->input->post('emailAdmin'));
	$ses = $this->session->set_userdata('logged_in');
	$datasess = array(
				  'idAdmin' => $ses['idAdmin'],
				  'namaAdmin' => $this->input->post('namaAdmin'),
				  'alamatAdmin' => $this->input->post('alamatAdmin'),
				  'picAdmin' => $ses['picAdmin'],
				  'emailAdmin' => $this->input->post('emailAdmin'),
				  'status' => $ses['status'],
				  'validated' => true
				  );
	$this->session->set_userdata('logged_in',$datasess);
	$this->db->where('idAdmin', $user_id);
	return $this->db->update('admin', $data); 
   }
   
   public function kirimPesan()
   {
		$session_id = $this->session->userdata('logged_in');
	    $uplo = $this->do_upload();
		$g["idPesan"] = "D".date('YmdHis');
		$g["timestamp"] =date('YmdHis'); 
		$g["judulPesan"] = $this->security->xss_clean($this->input->post('judulPesan'));
		$g["isiPesan"] = $this->security->xss_clean($this->input->post('isiPesan'));
		$g["idAdmin"] = $session_id["idAdmin"];
		$g["file"] = $uplo['full_path'];
		$this->db->insert("pesan", $g);
	   $email =$this->security->xss_clean($this->input->post('email'));
	   for($i =0 ;$i<count($email);$i++)
	   {
		  $dapat = explode("|",$email[$i]);
		  $data["timestamp"] = date('YmdHis'); 
		  $data["idAdmin"] = $dapat[0];
		  $data["status"] = '0';
		  $data["idPesan"] = $g["idPesan"];
		  $this->db->insert("notifpesan", $data);
		  $this->email($g["judulPesan"],$g["isiPesan"],$dapat[1],$session_id["namaAdmin"],$uplo);
	   }
	    $data["timestamp"] = date('YmdHis'); 
		$data["idAdmin"] = $session_id["idAdmin"];
		$data["status"] = '0';
		$data["idPesan"] = $g["idPesan"] ;
		$this->db->insert("notifpesan", $data);
		$this->email($g["judulPesan"],$g["isiPesan"],$session_id["emailAdmin"],$session_id["namaAdmin"],$uplo);
	   return true;
   }
   
   public function getPesan($idpesan)
   {
		$id = $this->session->userdata('logged_in');
	    $this->db->select('notifpesan.`status`,
							pesan.idPesan,
							pesan.`timestamp`,
							pesan.judulPesan,
							pesan.isiPesan,
							admin.namaAdmin,
							pesan.idAdmin,pesan.file
							');
							
		$this->db->from('notifpesan');
		$this->db->join('pesan', 'notifpesan.idPesan = pesan.idPesan');
		$this->db->join('admin', 'pesan.idAdmin = admin.idAdmin');
		$this->db->where('notifpesan.idAdmin', $id['idAdmin']);
		if($idpesan!= "")
			$this->db->where('pesan.idPesan',$idpesan);
		$query = $this->db->get();
		return $query;
   }
   
   
   public function simpanMember(){
		$session_id = $this->session->userdata('logged_in');
		$g["idAdmin"] = "M".date('YmdHis');
		$g["timestamp"] =date('YmdHis'); 
		$g["namaAdmin"] = $this->security->xss_clean($this->input->post('namaAdmin'));
		$g["alamatAdmin"] = $this->security->xss_clean($this->input->post('alamatAdmin'));
		$g["emailAdmin"] = $this->security->xss_clean($this->input->post('emailAdmin'));
		$g["auth"] = $this->security->xss_clean($this->input->post('password'));
		$g["upline"] = $session_id["idAdmin"];
		$this->db->insert("admin", $g);
		return true;
   }
    public function do_upload()
    {
	  $config['upload_path']          = 'assets/upload/';
	  $config['allowed_types']        = 'doc|docx';
	  $config['max_size']             = 5000;
	  $config['overwrite'] = 'TRUE';
	  $config['file_name'] = 'FILE'.date('YmdHis');
	  $this->load->library('upload', $config);

	  if ( ! $this->upload->do_upload('userfile'))
	  {
		  return 'error';
	  }
	  else
	  {
		  return $this->upload->data();
	  }
   }
   public function email($subjek, $pesan,$email,$nama,$upl)
    {
		$url = $_SERVER['HTTP_REFERER'];
	
		$config = Array(
		  'protocol' => 'smtp',
		  'smtp_host' => 'ssl://smtp.googlemail.com',
		  'smtp_port' => 465,
		  'smtp_user' => 'autoemail456@gmail.com', //isi dengan gmailmu!
		  'smtp_pass' => 'autoemail123', //isi dengan password gmailmu!
		  'mailtype' => 'html',
		  'charset' => 'iso-8859-1',
		  'wordwrap' => TRUE
		);
	
		$this->load->library('email', $config);
		$this->email->set_newline("\r\n");
		$this->email->from("autoemail456@gmail.com");
		$this->email->to($email); 
		$this->email->subject($subjek);
		$this->email->message($pesan);
		$this->email->attach($upl['full_path']);
		$this->email->send();
	}
	public function getKirimUlang($idpesan)
   {
		$id = $this->session->userdata('logged_in');
	    $this->db->select('admin.emailAdmin,
							pesan.isiPesan,
							pesan.judulPesan');
							
		$this->db->from('pesan');
		$this->db->join('notifpesan', 'notifpesan.idPesan = pesan.idPesan ');
		$this->db->join('admin', 'notifpesan.idAdmin = admin.idAdmin');
		$this->db->where('pesan.idPesan',$idpesan);
		$query = $this->db->get();
		return $query;
   }
	
	public function kirimUlang($id)
	{
		$session_id = $this->session->userdata('logged_in');
		$pesan = $this->getKirimUlang($id);
		foreach ($pesan->result() as $row)
        {
		  $this->email($row->judulPesan,$row->isiPesan,$row->emailAdmin,$session_id["namaAdmin"]);
		}
		return true;
	}
}
?>