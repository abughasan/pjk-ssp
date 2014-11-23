<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Laporan_ssp extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();			
	}
	
	public function index()
	{
		$page=$this->uri->segment(3);
		$limit= 15; //$this->config->item('limit_data');
		if(!$page):
		$offset = 0;
		else:
		$offset = $page;
		endif;
		
		$tot_hal = $this->app_model->getAllData('tbl_detail_transaksi');
		//$tot_hal = $this->app_model->manualQuery("select a.kode_tr, tgl_manual, uraian, b.jpid, kd_akun, kd_jenis, nilai_belanja, nilai_pajak from tbl_transaksi a inner join tbl_detail_transaksi b on a.kode_tr = b.kode_tr inner join tbl_jp c on b.jpid = c.jpid");
		$config['base_url'] = base_url() . 'laporan/index/';
		$config['total_rows'] = $tot_hal->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Selanjutnya';
		$config['prev_link'] = 'Sebelumnya';
		$this->pagination->initialize($config);
		$data["paginator"] =$this->pagination->create_links();
		
		if($this->session->userdata('bulan') == "")
		{
			$data['dt_ssp'] = $this->app_model->manualQuery
			("select a.kode_tr, tgl_manual, tgl_otomatis,  b.jpid, kd_akun, kd_jenis, nilai_belanja, nilai_pajak from tbl_transaksi a inner join tbl_detail_transaksi b on a.kode_tr = b.kode_tr inner join tbl_jp c on b.jpid = c.jpid"
			,$limit,$offset);			
			$this->db->order_by("kode_tr", "desc"); 
			$data['tbl_transaksi'] = $this->app_model->getAllData('tbl_transaksi');
			
			$data['bulan'] = $this->app_model->getAllData('tbl_bulan');
			$data['jns_pajak'] = $this->app_model->getAllData('tbl_jp');
			
			$data['profile'] = '';		
			$data['template'] = 'new_template';		
			$data['komponen_top'] = array('navbar','forcelogin');
			$data['interface'] = array('laporan_ssp');
			$data['komponen_bottom'] = 'beginfooter';
			
			$this->load->view('index', $data);			
			
		}
		else
		{
			$set_lap1['id_bulan'] = $this->session->userdata('id_bulan');						
			$set_lap1['jpid'] = $this->session->userdata('jpid');						
			
			$data['dt_ssp'] = $this->app_model->manualQuery
			("select a.kode_tr, tgl_manual,  b.jpid, kd_akun, kd_jenis, nilai_belanja, nilai_pajak from tbl_transaksi a inner join tbl_detail_transaksi b on a.kode_tr = b.kode_tr inner join tbl_jp c on b.jpid = c.jpid
			  WHERE 
			  b.jpid ='".$set_lap1['jpid']."'");	
			$data['tbl_transaksi'] = $this->app_model->getAllData('tbl_transaksi');
			  
			$data['bulan'] = $this->app_model->getAllData('tbl_bulan');
			$data['jns_pajak'] = $this->app_model->getAllData('tbl_jp');
			
			$data['profile'] = '';		
			$data['template'] = 'new_template';		
			$data['komponen_top'] = array('navbar','forcelogin');
			$data['interface'] = array('laporan_bulan');
			$data['komponen_bottom'] = 'beginfooter';
			
			$this->load->view('index', $data);			  
		}

	}

	public function set()
	{
		$set_lap1['id_bulan'] = $this->input->post('id_bulan');
		$set_lap1['jpid'] = $this->input->post('jpid');
		
		$this->session->set_userdata($set_lap1);
		header('location:'.base_url().'laporan_bulan');		
	}
	
	public function cetak()
	{
		$this->load->library('pdf');
		$get_kode = $this->uri->segment(3);
		$kd_jenis = explode('-',$get_kode)[0];
		$kd_akun = explode('-',$get_kode)[1];
		
		// $data['interface'] = array('ssp_template');
		// $data['template'] = 'new_template';
		// $data['html2'] = $this->load->view('komponen/BLANKO-SSPss');
		$this->load->view('interface/konten_ssp_template');
	}
	
	function blanko()
	{
		$get_kode = $this->uri->segment(3);
		$data['kd_tr'] = explode('-',$get_kode)[0];
		$data['kd_det_tr'] = explode('-',$get_kode)[1];
		
		
		
		$this->load->view('komponen/template_ssp4',$data);
	}
	
	public function refresh()
	{
		$this->session->unset_userdata('bln');
		$this->session->unset_userdata('pjk');
		redirect(laporan_ssp);
	}
}