<?php
Class model extends CI_Model {
  function __construct(){
	  parent::__construct();
	  $this->load->database();
      $this->load->helper(array('form', 'url'));
  }
  
    public
    function validate() {
    	$username = $this->security->xss_clean( $this->input->post( 'username' ) );
    	$password = $this->security->xss_clean( $this->input->post( 'password' ) );
    	$this->db->where( 'username', $username );
    	$this->db->where( 'password', $password );
    	$this->db->where( 'status', "0" );
    	$query = $this->db->get( 'user' );
    	$adm = $query;
    	$query = $query->result_array();
    	if ( count( $query ) > 0 ) {
    		$row = $adm->row();
    		$data = array(
    			'idUser' => $row->idUser,
    			'role' => $row->role,
    			'validated' => true
    		);
    		$this->session->set_userdata( 'logged_in', $data );
    		return true;
    	}
    	return false;
    }

    public
    function getDataBarang($id) {
		
		$this->db->where('statusBarang', "0");
		if(count($id)> 0 && $id != null )
		{
		   $this->db->where('idBarang', $id);
		   $this->db->join('user', 'user.idUser = barang.idUser ');
		}
    	return $this->db->get( 'barang' );
    }

    public
    function simpanBarang() {
    	$session_id = $this->session->userdata( 'logged_in' );
    	$g[ "idBarang" ] = $this->security->xss_clean( $this->input->post( 'idBarang' ) );
    	$g[ "namaBarang" ] = $this->security->xss_clean( $this->input->post( 'namaBarang' ) );
    	$g[ "stokBarang" ] = $this->security->xss_clean( $this->input->post( 'stokBarang' ) );
    	$g[ "statusBarang" ] = "0";
    	$g[ "timestamp" ] = date( 'YmdHis' );
    	$g[ "idUser" ] = $session_id[ "idUser" ];
    	return $this->db->insert( "barang", $g );
    }
	
	public
	function perbaharuiBarang() {
		$idBarang =  $this->security->xss_clean( $this->input->post( 'idBarang' ) );
		$data[ "namaBarang" ] = $this->security->xss_clean( $this->input->post( 'namaBarang' ) );
		$data[ "stokBarang" ] = $this->security->xss_clean( $this->input->post( 'stokBarang' ) );
		$this->db->where( 'idBarang', $idBarang );
		return $this->db->update( 'barang', $data );
	}
	
	public
	function HapusBarang($idBarang) {
		$data[ "statusBarang" ] = "1";
		$this->db->where( 'idBarang', $idBarang );
		return $this->db->update( 'barang', $data );
	}
	
	
	
	
	
	
	
	
	
	
	
  function getBanyakMember(){
		$id = $this->session->userdata('logged_in');
		$this->db->where('admin.upline', $id['idAdmin']);
		$this->db->or_where('admin.idAdmin', $id['upline']);
        return  $this->db->get('admin');
    }
	
  
   
   public function kirimPesan()
   {
		$session_id = $this->session->userdata('logged_in');
		$g["idPesan"] = $this->security->xss_clean($this->input->post('idPesanan'));
		$g["timestamp"] =date('YmdHis'); 
		$g["description"] = $this->security->xss_clean($this->input->post('description'));
		$g["idUser"] = $this->security->xss_clean($this->input->post('isiPesan'));
		$g["status"] = "0";
		$this->db->insert("pesanan", $g);
	   $barang =$this->security->xss_clean($this->input->post('barang'));
	   for($i =0 ;$i<count($barang);$i++)
	   {
		  $data["timestamp"] = date('YmdHis'); 
		  $data["idPesanan"] = $g["idPesan"];
		  $data["status"] = '0';
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