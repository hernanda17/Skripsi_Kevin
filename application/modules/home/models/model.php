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
		if($id != null )
		{
		   $this->db->where('idBarang', $id);
		   $this->db->join('user', 'user.idUser = barang.idUser ');
		}
    	return $this->db->get( 'barang' );
    }
	
	public
    function getDataReportJenis() {
		
	    $this->db->select("jenis_barang.id_jenisBarang,
							jenis_barang.Nama_jenis,
							COUNT(barang.id_jenisBarang) 'Jumlah'");
		$this->db->join('jenis_barang', 'barang.id_jenisBarang = jenis_barang.id_jenisBarang ', 'Inner');
    	$this->db->group_by("jenis_barang.Nama_jenis"); 
		$this->db->group_by("jenis_barang.id_jenisBarang"); 
		return $this->db->get( 'barang' );
    }
	
	public
    function getDataJenis($id) {
		
		$this->db->where('status', "0");
		if($id != null )
		{
		   $this->db->where('id_jenisBarang', $id);
		}
    	return $this->db->get( 'jenis_barang' );
    }
	
	public
    function getDataAdmin($id) {
		
    	$session_id = $this->session->userdata( 'logged_in' );
		$this->db->where('status', "0");
		$this->db->where('idUser_Atasan', $session_id[ "idUser" ]);
		
		
		if($id != null )
		{
		   $this->db->where('idUser', $id);
		}
    	return $this->db->get( 'user' );
    }
	
	public
    function getCariDataBarang($id) {
		if($id != null )
		{
			$this->db->like('idBarang', $id);	
			$this->db->or_like('namaBarang', $id);	
		}
		$this->db->where('statusBarang', "0");
    	return $this->db->get( 'barang' );
    }
	
	public
    function getDataBarang_pesanan($idPesanan) {
		
	    $this->db->select('barang.namaBarang,
						   barang.idBarang');
		$this->db->join('pesanandetail', 'pesanandetail.idBarang = barang.idBarang ', 'left');
		
		$this->db->where('pesanandetail.idBarang IS NULL', null, false);
    	return $this->db->get( 'barang' );
    }

    public
    function simpanBarang() {
		
		$temp1 = $this->security->xss_clean( $this->input->post( 'idBarang' ) );
		$temp2 = $this->security->xss_clean( $this->input->post( 'namaBarang' ) );
		if((count($temp1)>0 && $temp1 != null)&&(count($temp2)>0 && $temp2 != null)){
    	$session_id = $this->session->userdata( 'logged_in' );
    	$g[ "idBarang" ] = $this->security->xss_clean( $this->input->post( 'idBarang' ) );
    	$g[ "namaBarang" ] = $this->security->xss_clean( $this->input->post( 'namaBarang' ) );
    	$g[ "Supplier" ] = $this->security->xss_clean( $this->input->post( 'supplier' ) );
    	$g[ "idRFID" ] = $this->security->xss_clean( $this->input->post( 'idRFID' ) );
    	$g[ "statusBarang" ] = "0";
    	$g[ "timestamp" ] = date( 'YmdHis' );
    	$g[ "idUser" ] = $session_id[ "idUser" ];
    	return $this->db->insert( "barang", $g );
		}return false;
    }
	
	public
    function simpanJenis() {
		
		$temp1 = $this->security->xss_clean( $this->input->post( 'id_jenisBarang' ) );
		$temp2 = $this->security->xss_clean( $this->input->post( 'Nama_jenis' ) );
		if((count($temp1)>0 && $temp1 != null)&&(count($temp2)>0 && $temp2 != null)){
    	$session_id = $this->session->userdata( 'logged_in' );
    	$g[ "id_jenisBarang" ] = $this->security->xss_clean( $this->input->post( 'id_jenisBarang' ) );
    	$g[ "Nama_jenis" ] = $this->security->xss_clean( $this->input->post( 'Nama_jenis' ) );
    	return $this->db->insert( "jenis_barang", $g );
		}
			return false;
    }
	
	public
    function simpanAdmin() {
    	$session_id = $this->session->userdata( 'logged_in' );
    	$g[ "idUser_Atasan" ] = $session_id[ "idUser" ];
    	$g[ "idRFID" ] = $this->security->xss_clean( $this->input->post( 'id_rfid' ) );
    	$g[ "role" ] = $session_id[ "role" ];
    	$g[ "username" ] = $this->security->xss_clean( $this->input->post( 'username' ) );
    	$g[ "password" ] = $this->security->xss_clean( $this->input->post( 'password' ) );
    	return $this->db->insert( "user", $g );
    }
	
	public
    function kirimPesan() {
		$temp1 = $this->security->xss_clean( $this->input->post( 'idPesanan' ) );
		$temp2 = $this->security->xss_clean( $this->input->post( 'description' ) );
		if((count($temp1)>0 && $temp1 != null)&&(count($temp2)>0 && $temp2 != null)){
			$session_id = $this->session->userdata( 'logged_in' );
			$g[ "idPesanan" ] = $this->security->xss_clean( $this->input->post( 'idPesanan' ) );
			$g[ "description" ] = $this->security->xss_clean( $this->input->post( 'description' ) );
			$g[ "status" ] = "0";
			$g[ "timestamp" ] = date( 'YmdHis' );
			$g[ "idUser" ] = $session_id[ "idUser" ];
			return $this->db->insert( "pesanan", $g );
		}
			return false;
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
	function perbaharuiAdmin() {
		$idUser =  $this->security->xss_clean( $this->input->post( 'idUser' ) );
		$data[ "username" ] = $this->security->xss_clean( $this->input->post( 'username' ) );
		$data[ "idRFID" ] = $this->security->xss_clean( $this->input->post( 'idRFID' ) );
		$this->db->where( 'idUser', $idUser );
		return $this->db->update( 'user', $data );
	}
	
	public
	function HapusBarang($idBarang) {
		$data[ "statusBarang" ] = "1";
		$this->db->where( 'idBarang', $idBarang );
		return $this->db->update( 'barang', $data );
	}
	
	public
	function ScanBarang() {
		$idRfid =  $this->security->xss_clean( $this->input->post( 'idRFID_barang' ) );
		$idPesanan =  $this->security->xss_clean( $this->input->post( 'idPesanan' ) );
		$data = $this->getDataJenisBarang($idRfid,$idPesanan)->result_array()[0]["idBarang"];
		$dataBarang[ "status" ] = "1";
		$this->db->where( 'idBarang', $data );
		return $this->db->update( 'pesanandetail', $dataBarang );
	}
	
	public
	function CekDataJenisBarang($idRfid,$idPesanan) {
		
	    $this->db->select(' barang.idBarang');
		$this->db->where('jenis_barang.id_rfid', $idRfid);
		$this->db->where('pesanandetail.idPesanan', $idPesanan);
		$this->db->join('barang', 'barang.id_jenisBarang = jenis_barang.id_jenisBarang ', 'Inner');
		$this->db->join('pesanandetail', 'pesanandetail.idBarang = barang.idBarang ', 'Inner');
    	$res = $this->db->get( 'jenis_barang' );
		$res = $res->result_array();
		if(count($res)>0)
			return true;
		else 
			return false;
	}
	
	public
	function getDataJenisBarang($idRfid,$idPesanan) {
		
	    $this->db->select(' barang.idBarang');
		$this->db->where('barang.idRFID', $idRfid);	
		
    	return $this->db->get( 'barang' );
	}
	
	
	
	
	public
	function HapusAdmin($idAdmin) {
		$data[ "status" ] = "1";
		$this->db->where( 'idUser', $idAdmin );
		return $this->db->update( 'user', $data );
	}
	
	public
    function getDataPesanan($idPesanan) {
		
		$id = $this->session->userdata('logged_in')['idUser'];
		$this->db->where('idUser', $id);
		if(count($idPesanan)> 0 && $idPesanan != null )
		{
		   $this->db->where('idPesanan', $idPesanan);
		   //$this->db->join('user', 'user.idUser = barang.idUser ');
		}
		
		   $this->db->order_by('timestamp', 'DESC');
    	return $this->db->get( 'pesanan' );
    }
	
	public
    function getDataPesananDetail($idPesanan) {
		
		$id = $this->session->userdata('logged_in')['idUser'];
	    $this->db->select(' pesanan.idPesanan,
							pesanan.idUser,
							pesanan.`timestamp`,
							pesanan.`status`,
							pesanan.timeapproval,
							pesanan.description,
							`user`.username');
		$this->db->distinct();
		$this->db->where('`pesanan`.idPesanan', $idPesanan);
		$this->db->join('`user`', 'pesanan.idUserApproval = `user`.idUser ', 'left');
    	return $this->db->get( 'pesanan' );
    }
	
	public
    function getDataPesananBarang($idPesanan) {
		
		$id = $this->session->userdata('logged_in')['idUser'];
	    $this->db->select(' barang.idBarang,
							barang.namaBarang,
							pesanandetail.qty,
							pesanandetail.status');
		$this->db->where('`pesanandetail`.idPesanan', $idPesanan);
		$this->db->join('pesanandetail', 'barang.idBarang = pesanandetail.idBarang');
    	return $this->db->get( 'barang' );
    }
	
    public
    function tambahDataPesananBarang() {
		$id= $this->input->post( 'idPesanan' );
		$arrId_barang = $this->security->xss_clean( $this->input->post( 'idBarang' ) );
		for($i = 0;$i < count($arrId_barang);$i++ )
		{
			$g = array();
			$g[ "idPesanan" ] = $id;
			$g[ "idBarang" ] = $arrId_barang[$i];
			$this->db->insert( "pesanandetail", $g );
		}
		
		
    	return true;
    }
	
	function cekStokBarang($idBarang,$qtyMasuk){
		//ambil databarang
		$data = $this->getDataBarang($idBarang);
		//ambil data stok
		$dataBarang = $data->result_array();
		$stok = (int) $dataBarang[0]["stokBarang"];
		//kurangi stok nya
		$stok = $stok - $qtyMasuk;
		return $stok;
	}
	
	public
	function UpdateStok($idBarang,$banyak) {
		$data[ "stokBarang" ] = $banyak;
		$this->db->where( 'idBarang', $idBarang );
		return $this->db->update( 'barang', $data );
	}
	
	
	public
	function getDataPesananDetailUser() {

		$id = $this->security->xss_clean( $this->input->post( 'idRFID' ) );
		$this->db->select( 'pesanan.idPesanan,
							pesanan.`timestamp`,
							pesanan.`status`,
							pesanan.timeapproval,
							pesanan.description,
							pesanan.idUser,
							a.username,
							b.username "UserApproval",a.idRFId' );
		$this->db->where( 'a.idRFId', $id );
		$this->db->where( 'pesanan.`status`', "1" );
		$this->db->order_by( 'pesanan.`timestamp`', "ASC" );
		$this->db->join( 'user AS a', 'pesanan.idUser = a.idUser ');
		$this->db->join( 'user AS b', 'b.idUser = pesanan.idUserApproval ','left');
		return $this->db->get( 'pesanan' );
	}

	public
	function getDataPesananBarangUser() {

		$id = $this->security->xss_clean( $this->input->post( 'idRFID' ) );
		$this->db->select( 'barang.idBarang,
							barang.namaBarang,
							pesanandetail.qty,pesanandetail.status ' );
		$this->db->order_by( 'pesanan.`timestamp`', "ASC" );
		$this->db->where( '`user`.idRFID', $id );
		$this->db->where( 'pesanan.`status`', "1" );
		$this->db->join( 'pesanandetail', 'pesanandetail.idPesanan = pesanan.idPesanan' );
		$this->db->join( 'barang', 'pesanandetail.idBarang = barang.idBarang' );
		$this->db->join( '`user`', 'user.idUser = pesanan.idUser' );
		return $this->db->get( 'pesanan' );
	}
	
	public
	function PesananConfirmation($idPesanan) {
		$data[ "status" ] = "2";
		$this->db->where( 'idPesanan', $idPesanan );
		return $this->db->update( 'pesanan', $data );
	}
	
	public
	function PesananAcceptConfirmation($idPesanan) {
		$data[ "status" ] = "1";
		$data[ "timeapproval" ] = date( 'YmdHis' );
		$data[ "idUserApproval" ] = $this->session->userdata('logged_in')['idUser'];
		$this->db->where( 'idPesanan', $idPesanan );
		return $this->db->update( 'pesanan', $data );
	}
	
	public
	function PesananBatal($idPesanan) {
		$data[ "status" ] = "3";
		$this->db->where( 'idPesanan', $idPesanan );
		return $this->db->update( 'pesanan', $data );
	}
	
	public
	function getReportData() {

		$this->db->select( 'barang.namaBarang,
							pesanandetail.qty,
							pesanan.idPesanan,
							pesanan.`status`,
							`user`.username' );
		$this->db->join( 'pesanandetail', 'pesanan.idPesanan = pesanandetail.idPesanan ');
		$this->db->join( 'barang', 'barang.idBarang = pesanandetail.idBarang');
		$this->db->join( '`user`', 'user.idUser = pesanan.idUser');
		return $this->db->get( 'pesanan' );
	}

	public
    function getDataPesananKonfirmasi() {
	
		$this->db->select( 'pesanan.idPesanan,
							pesanan.`timestamp`,
							pesanan.description,
							`user`.username' );
		$this->db->where('pesanan.`status`', '0');
		$this->db->join( '`user`', 'user.idUser = pesanan.idUser' );
    	return $this->db->get( 'pesanan' );
    }
	
	public
    function getDataPesananDetailKonfirmasi($idPesanan) {
		
		$id = $this->session->userdata('logged_in')['idUser'];
	    $this->db->select(' pesanan.idPesanan,
							pesanan.idUser,
							pesanan.`timestamp`,
							pesanan.`status`,
							pesanan.timeapproval,
							pesanan.description,
							`user`.username');
		$this->db->distinct();
		$this->db->where('`pesanandetail`.idPesanan', $idPesanan);
		$this->db->join('pesanan', 'pesanandetail.idPesanan = pesanan.idPesanan');
		$this->db->join('`user`', 'pesanan.idUserApproval = `user`.idUser ', 'left');
    	return $this->db->get( 'pesanandetail' );
    }
   
/*	public function do_upload()
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
	}*/
}
?>