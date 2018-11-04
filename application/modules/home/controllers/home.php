<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
 
class home extends MX_Controller {
	
	 function __construct() {
        parent::__construct();
		$this->load->helper('url');
		$this->load->library('session');
        $this->load->model('model');
     }
	 
   public function index()
   {
      $this->load->view('header');
	  if($this->session->userdata('logged_in'))
	  {
		  
		  $member = $this->model->getBanyakMember();
		  $pesan = $this->model->getPesan("");
	   	  $data ['banyakMember'] = $member;
	   	  $data ['banyakEmail'] = $pesan;
	  	  $this->load->view('beranda',$data);
	  }
	  else
	  	$this->load->view('Login');
   }
    
	public function openPageEmail()
	{
      $this->load->view('header');
	  if($this->session->userdata('logged_in'))
	  {
		$member = $this->model->getBanyakMember();
		print_r($this->db->last_query());
		$pesan = $this->model->getPesan("");
		$data ['member'] = $member;
		$data ['pesan'] = $pesan;
	  	$this->load->view('pageEmail',$data);
	  }
	  else
	  	$this->load->view('Login');
	}
	
	public function openPageMember()
	{
      $this->load->view('header');
	  if($this->session->userdata('logged_in')){
		$member = $this->model->getBanyakMember();
		$data ['member'] = $member;
	  	$this->load->view('pageMember',$data);
	  }
	  else
	  	$this->load->view('Login');
	}
	
	public function openPageBeranda()
	{
      $this->load->view('header');
	  if($this->session->userdata('logged_in'))
	  {//
	  	  $member = $this->model->getBanyakMember();
		  $pesan = $this->model->getPesan("");
	   	  $data ['banyakMember'] = $member;
	   	  $data ['banyakEmail'] = $pesan;
//	   	  $data ['banyakMember'] = $query;

	  	  $this->load->view('beranda',$data);
	  }
	  else
	  	$this->load->view('Login');
	}
	
	public function Login()
	{
      $this->load->view('header');
	  $this->load->view('Login');
	}
	
	public function bukaPesan()
	{
	  $pesan = $this->model->getPesan($this->uri->segment(3));
	  $data ['pesan'] = $pesan;
	  $this->load->view('header');
	  $this->load->view('bukaPesan',$data);
	}
	
	
	public function process(){
        $result = $this->model->validate();
        if(! $result){
            $this->Login();
        }else{
			$this->openPageBeranda();
        }        
    }
	public function processKirimPesan(){
        $result = $this->model->kirimPesan();
        if(!$result){
			$this->status("Kirim Pesan","Kirim Pesan Gagal");
        }else{
			$this->status("Kirim Pesan","Kirim Pesan Berhasil");
        }        
    }
	
	public function do_logout(){
        $this->session->sess_destroy();
		$this->status("Logout","Logout Berhasil");
	}
	
	public function updateProfile(){
		$session_id = $this->session->userdata('logged_in');
        $result = $this->model->UpdateProfile($session_id["idAdmin"]);
		if(!$result){
			$this->status("Update Profile","Update Profile Anda Gagal");
        }else{
			 $this->status("Update Profile","Update Profile Anda Berhasil");
        }       
	}
	
	public function status($status,$status2)
    {
      $data["status1"]= $status;
	  $data["status2"]= $status2;
	  $this->load->view('header');
      $this->load->view('status',$data);
    }
	
	public function AddMember()
	{
	    $result = $this->model->simpanMember();
        if(!$result){
			$this->status("Member Baru","Penambahan Member Gagal");
        }else{
			$this->status("Member Baru","Penambahan Member Berhasil");
        }  
	}
	
	public function kirimUlang()
	{
		$result = $this->model->kirimUlang($this->uri->segment(3));
		if(!$result){
			$this->status("Kirim Ulang","Kirim Ulang Gagal");
        }else{
			$this->status("Kirim Ulang","Kirim Ulang Berhasil");
        } 
	}
}

