<?php
if ( !defined( 'BASEPATH' ) )exit( 'No direct script access allowed' );


class home extends MX_Controller {

	function __construct() {
		parent::__construct();
		$this->load->helper( 'url' );
		$this->load->library( 'session' );
		$this->load->model( 'model' );
	}

	public
	function index() {
		$this->load->view( 'header' );
		if ( $this->session->userdata( 'logged_in' ) ) {
			$role = $this->session->userdata( 'logged_in' )[ 'role' ];
			if ( $role == "0" ) {
				$barang = $this->model->getDataBarang(null);
				$jenis = $this->model->getDataJenis(null);
				$data[ 'barang' ] = $barang;
				$data[ 'jenis' ] = $jenis;
			} else if ( $role == "1" ){
				$pesanan = $this->model->getDataPesanan(null);
				$data[ 'pesanan' ] = $pesanan;
			}else if ( $role == "2" ){
				$pesanan = $this->model->getDataPesananKonfirmasi(null);
				$data[ 'pesanan' ] = $pesanan;
			}
			$this->load->view( 'beranda', $data );
		} else
			$this->load->view( 'Login' );
	}

	public
	function Admin() {
		
		if ( $this->session->userdata( 'logged_in' ) ) {
			
			
			$Admin = $this->model->getDataAdmin("");
			$data[ 'Admin' ] = $Admin;
			$this->load->view( 'header' );
			$this->load->view( 'Admin' , $data );
		}
	}
	
	public
	function openPageEmail() {
		$this->load->view( 'header' );
		if ( $this->session->userdata( 'logged_in' ) ) {
			$member = $this->model->getBanyakMember();
			print_r( $this->db->last_query() );
			$pesan = $this->model->getPesan( "" );
			$data[ 'member' ] = $member;
			$data[ 'pesan' ] = $pesan;
			$this->load->view( 'pageEmail', $data );
		} else
			$this->load->view( 'Login' );
	}

	public
	function openPageMember() {
		$this->load->view( 'header' );
		if ( $this->session->userdata( 'logged_in' ) ) {
			$member = $this->model->getDataBarang();
			$data[ 'member' ] = $member;
			$this->load->view( 'pageMember', $data );
		} else
			$this->load->view( 'Login' );
	}

	public
	function openPageBeranda() {
		$this->load->view( 'header' );
		if ( $this->session->userdata( 'logged_in' ) ) {
			$role = $this->session->userdata( 'logged_in' )[ 'role' ];
			if ( $role == "0" ) {
				$barang = $this->model->getDataBarang(null);
				$data[ 'barang' ] = $barang;
			} else {
				$barang = $this->model->getDataBarang(null);
				$data[ 'barang' ] = $barang;
			}
			$this->load->view( 'beranda', $data );
		} else
			$this->load->view( 'Login' );
	}

	public
	function Login() {
		$this->load->view( 'header' );
		$this->load->view( 'Login' );
	}

	public
	function openPageBarangDetail() {
		$detailBarang = $this->model->getDataBarang( $this->uri->segment( 3 ) );
		$data[ 'barang' ] = $detailBarang;
		$this->load->view( 'header' );
		$this->load->view( 'bukaPesan', $data );
	}
	
	public
	function openPageAdminDetail() {
		$detailAdmin = $this->model->getDataAdmin( $this->uri->segment( 3 ) );
		$data[ 'Admin' ] = $detailAdmin;
		$this->load->view( 'header' );
		$this->load->view( 'bukaAdmin', $data );
	}
	
	public
	function openPesananDetail() {
		$detailPesanan = $this->model->getDataPesananDetail( $this->uri->segment( 3 ) );
		$detailBarang = $this->model->getDataPesananBarang( $this->uri->segment( 3 ) );
		$barang = $this->model->getDataBarang( null );
		$data[ 'pesananDetail' ] = $detailPesanan;
		$data[ 'pesananBarang' ] = $detailBarang;
		$data[ 'barang' ] = $barang;
		$this->load->view( 'header' );
		$this->load->view( 'bukaPesananDetail', $data );
	}

	public
	function process() {
		$result = $this->model->validate();
		if ( !$result ) {
			$this->Login();
		} else {
			$this->load->view( 'header' );
			$role = $this->session->userdata( 'logged_in' )[ 'role' ];
			if ( $role == "0" ) {
				$barang = $this->model->getDataBarang(null);
				$jenis = $this->model->getDataJenis(null);
				$data[ 'barang' ] = $barang;
				$data[ 'jenis' ] = $jenis;
			} else if ( $role == "1" ){
				$pesanan = $this->model->getDataPesanan(null);
				$data[ 'pesanan' ] = $pesanan;
			}else if ( $role == "2" ){
				$pesanan = $this->model->getDataPesananKonfirmasi();
				$data[ 'pesanan' ] = @$pesanan;
			}
			$this->load->view( 'beranda', $data );
		}
	}

	public
	function processKirimPesan() {
		$result = $this->model->kirimPesan();
		if ( !$result ) {
			$this->status( "Kirim Pesan", "Kirim Pesan Gagal (ID pesanan telah digunakan)" );
		} else {
			$this->status( "Kirim Pesan", "Pesanan telah berhasil dibuat dan menunggu konfirmasi" );
		}
	}
	
	public
	function prosesPesananConfirmation() {
		$result = $this->model->PesananConfirmation( $this->uri->segment( 3 ));
		if ( !$result ) {
			$this->status( "Kirim Pesan", "Kirim Pesan Gagal (ID pesanan telah digunakan)" );
		} else {
			$this->status( "Kirim Pesan", "Kirim Pesan Berhasil" );
		}
	}
	
	public
	function confirmation() {
		
		$this->load->view( 'headerExBar' );
		$this->load->view( 'confirmation' );
	}
	
	public
	function openPesananDetailConfirmationAccept() {
		$detailPesanan = $this->model->getDataPesananDetail( $this->uri->segment( 3 ) );
		$detailBarang = $this->model->getDataPesananBarang( $this->uri->segment( 3 ) );
		$barang = $this->model->getDataBarang( null );
		$data[ 'pesananDetail' ] = $detailPesanan;
		$data[ 'pesananBarang' ] = $detailBarang;
		$data[ 'barang' ] = $barang;
		$this->load->view( 'header' );
		$this->load->view( 'bukaPesananDetailConfirmation', $data );
	}

	public
	function openPesananDetailConfirmation() {
		$detailPesanan = $this->model->getDataPesananDetailUser();
		$detailBarang = $this->model->getDataPesananBarangUser();
		$data[ 'pesananDetail' ] = $detailPesanan;
		$data[ 'pesananBarang' ] = $detailBarang;
		//echo $this->db->last_query();
		$this->load->view( 'headerExBar' );
		$this->load->view( 'bukaPesananDetailUser', $data );
	}
	
	public
	function processKonfirmasiPesanan() {
		$result = $this->model->PesananAcceptConfirmation($this->uri->segment( 3 ));
		if ( !$result ) {
			$this->status( "Konfirmasi Pesan", "Konfirmasi pesan gagal" );
		} else {
			$this->status( "Konfirmasi Pesan", "Konfirmasi Pesan Berhasil" );
		}
	}
	
	public
	function procesCariBarang()
	{
		$cariData =	$this->security->xss_clean( $this->input->post( 'cariData' ) );
		$barang = $this->model->getCariDataBarang($cariData);
		$data[ 'barang' ] = $barang;
		$this->load->view( 'header' );
		$this->load->view( 'beranda', $data );
	}
	
	public
	function processBatalPesanan() {
		$result = $this->model->PesananBatal($this->uri->segment( 3 ));
		if ( !$result ) {
			$this->status( "Batal Pesan", "Batal pesan gagal" );
		} else {
			$this->status( "Batal Pesan", "Pesanan Dibatalkan" );
		}
	}
	
	public
	function procesDataBarangPesanan() {
		$result = $this->model->tambahDataPesananBarang();
		if ( !$result ) {
			$this->status( "Data Barang", "Stok barang tidak mencukupi" );
		} else {
			$this->status( "Data Barang", "Barang sudah ditambahkan" );
		}
	}
	
	public
	function do_logout() {
		$this->session->sess_destroy();
		$this->status( "Logout", "Logout Berhasil" 	);
	}

	public
	function PerbaharuiBarang() {
		
		$result = $this->model->perbaharuiBarang();
		if ( !$result ) {
			$this->status( "Perbaharui Barang", "Perbaharui Barang Anda Gagal" );
		} else {
			$this->status( "Perbaharui Barang", "Data barang telah diperbaharui" );
		}
	}
	
	public
	function PerbaharuiAdmin() {
		
		$result = $this->model->perbaharuiAdmin();
		if ( !$result ) {
			$this->status( "Perbaharui Admin", "Perbaharui Admin Anda Gagal" );
		} else {
			$this->status( "Perbaharui Admin", "Data Admin telah diperbaharui" );
		}
	}
	
	public
	function prosesHapusBarang() {
		$result = $this->model->HapusBarang( $this->uri->segment( 3 ));
		if ( !$result ) {
			$this->status( "Hapus Barang", "Hapus Barang Anda Gagal" );
		} else {
			$this->status( "Hapus Barang", "Data Barang telah dihapus" );
		}
	}
	
	public
	function ProsesScanBarang() {
		$result = $this->model->ScanBarang();
		if ( !$result ) {
			$this->status( "Scan Barang", "Scan Barang Anda Gagal" );
		} else {
			$this->status( "Scan Barang", "Scan Data Barang Berhasil" );
		}
	}
	
	public
	function prosesHapusAdmin() {
		$result = $this->model->HapusAdmin( $this->uri->segment( 3 ));
		if ( !$result ) {
			$this->status( "Hapus Admin", "Hapus Admin Anda Gagal" );
		} else {
			$this->status( "Hapus Admin", "Data Admin telah dihapus" );
		}
	}

	public
	function status( $status, $status2 ) {
		$data[ "status1" ] = $status;
		$data[ "status2" ] = $status2;
		$this->load->view( 'header' );
		$this->load->view( 'status', $data );
	}

	public
	function SimpanBarang() {
		$result = $this->model->simpanBarang();
		if ( !$result ) {
			$this->status( "Barang Baru", "Penambahan Barang Gagal" );
		} else {
			$this->status( "Barang Baru", "Penambahan Barang Berhasil" );
		}
	}
	
	public
	function SimpanJenis() {
		$result = $this->model->simpanJenis();
		if ( !$result ) {
			$this->status( "Jenis Baru", "Penambahan Jenis Gagal" );
		} else {
			$this->status( "Jenis Baru", "Penambahan Jenis Berhasil" );
		}
	}
	
	public
	function SimpanAdmin() {
		$result = $this->model->simpanAdmin();
		if ( !$result ) {
			$this->status( "Admin Baru", "Penambahan Admin Gagal" );
		} else {
			$this->status( "Admin Baru", "Penambahan Admin Berhasil" );
		}
	}

	public 
	function Report()
	{
		$this->load->helper('pdf_helper');
		$result = $this->model->getReportData();
		$data['data'] = $result;
		//$this->load->view( 'header' );
		$this->load->view('report', $data);
	}
	
	
	public
	function kirimUlang() {
		$result = $this->model->kirimUlang( $this->uri->segment( 3 ) );
		if ( !$result ) {
			$this->status( "Kirim Ulang", "Kirim Ulang Gagal" );
		} else {
			$this->status( "Kirim Ulang", "Kirim Ulang Berhasil" );
		}
	}
}