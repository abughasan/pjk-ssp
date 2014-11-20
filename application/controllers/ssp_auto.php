<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Ssp_auto extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//$this->authentication->protect();
		$this->load->library('form_validation');
	}
	
	public function index()
	{
		$game['judul'] = 'INPUT SSP';
		$game['kodeakun'] = $this->app_model->manualQuery('SELECT kd_akun FROM tbl_jp')->result();
		$game['kodejenis'] = $this->app_model->manualQuery('SELECT DISTINCT(kd_jenis) FROM tbl_jp')->result();
		$game['belanja'] = $this->app_model->getAllData('tbl_belanja')->result();
		$game['pemungut'] = $this->app_model->getAllData('tbl_pp')->result();
		
		
		$game['template'] = 'new_template';											#--- pilihan template. anda bisa pilih twocolumn / onecolumn
		$game['komponen_top'] = array('navbar','forcelogin');						#--- Tambahkan html komponen di bagian paling atas halaman / sebelum template
		$game['komponen_bottom'] = 'beginfooter';
		$game['interface'] = array('form_ssp3');	
		$this->load->view('index',$game);
	}
	
	function post()
	{
		$data['ppid'] = $this->input->post('pp');
		$data['nilai_belanja'] = $this->input->post('nilai');
		$data['belanjaid'] = $this->input->post('belanja');
		$data['uraian'] = $this->input->post('uraian');
		$data['masa_p'] = $this->input->post('bulan');
		$data['tahun_p'] = $this->input->post('tahun');
		$data['tgl_otomatis'] = date('Y-m-d');
		$data['wpid']=$this->app_model->getSelectedData('tbl_wp',array('npwp'=>$this->input->post('npwp')))->row()->wpid;
		
		$this->app_model->insertData('tbl_transaksi',$data); // INSERT DATA KE tbl_transaksi
		
		if ($this->db->affected_rows() > 0):
			//echo "inserted";
			$ppn = $this->input->post('ppn');
			$pph = $this->input->post('pph');
			$last_kodetr = $this->app_model->manualQuery('SELECT kode_tr FROM tbl_transaksi ORDER BY kode_tr DESC LIMIT 1')->ROW()->kode_tr;
			//SAVE last kodetr to session
			$this->session->set_userdata(array('lastkodetr'=>$last_kodetr));
			
			if($ppn>0):
				$ppn_ex = explode('-',$ppn);
				$ppnid = $this->app_model->getSelectedData('tbl_jp',array('kd_akun'=>$ppn_ex[0],'kd_jenis'=>$ppn_ex[1]))->row()->jpid;
				$this->app_model->insertData('tbl_detail_transaksi',array('kode_tr'=>$last_kodetr,'jpid'=>$ppnid));
			endif;
			
			if($pph>0):
				$pph_ex = explode('-',$pph);
				$pphid = $this->app_model->getSelectedData('tbl_jp',array('kd_akun'=>$pph_ex[0],'kd_jenis'=>$pph_ex[1]))->row()->jpid;
				$this->app_model->insertData('tbl_detail_transaksi',array('kode_tr'=>$last_kodetr,'jpid'=>$pphid));
			endif;
			
		endif;
	}
	
	function generate_form()
	{
		?>
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Cetak SSP [Melengkapi data...]</h4>
			  </div>
			  <div class="modal-body">
				
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			  </div>
		<?php
	}
	
	
	function cekpajak()
	{
		$belanjaid = $this->input->post('belanjaid');
		$nilai = $this->input->post('nilai');
		$npwp = $this->app_model->getSelectedData('tbl_pp',array('ppid'=>$this->input->post('npwp')))->row()->npwp;
		
		//BEGIN FUNGSI CEK PAJAK
		if ($npwp == ""):
			echo "NPWP tidak boleh kosong";
		elseif ($nilai == ""):
			echo "NILAI tidak boleh kosong";
		elseif ($belanjaid == ""):
			echo "Pilih jenis transaksi";
		else:
		
		$jpjoin = $this->app_model->manualQuery("
			SELECT * FROM tbl_jp jp
			INNER JOIN tbl_belanja b ON jp.jpid = b.jpid
			WHERE belanjaid = {$belanjaid}
		");
		$kode_akun = $jpjoin->row()->kd_akun;
		$kode_jenis = $jpjoin->row()->kd_jenis;
		$nama_jenis = $jpjoin->row()->nm_jenis;
		
		//CEK JENIS BELANJA
		if ($belanjaid == 1) //---> BELANJA BARANG
		{
			//CEK NILAI PAJAK
			if ($nilai < 1000000) 
			{
				$ppn = 0;
			}
			if ($nilai >= 1000000 && $nilai < 2000000) 
			{
				$ppn = 100/110 * $nilai * 0.1;
			}
			if ($nilai >= 2000000 ) 
			{
				$ppn = 100/110 * $nilai * 0.1;
				if($npwp == '20.025.203.9-411.000') // isi dengan NPWP dinas
				{
					$pph = $nilai * 0.03;
				}else{
					$pph = $nilai * 0.015;
				}
			}
			if($ppn>0) {
				echo "<a class='btn btn-info btn-sm notif' 
				data-container='body' data-toggle='popover' data-placement='top' 
				data-title='Cetak SSP PPN' data-html='true'
				data-content='<a class=btn data-toggle=modal href=ssp_auto/generate_form data-target=#modalppn>lengkapi data</a>'
				>PPN (411211-100)</a>
				<input type='hidden' name='ppn' id='ppn' value='411211-100' />
				<script>
				$('.notif').popover()
				</script>
			"; }
			if(isset($pph)) {
				echo "<a class='btn btn-danger btn-sm notif'
				data-container='body' data-toggle='popover' data-placement='bottom' data-content='test'
				>{$nama_jenis} ({$kode_akun}-{$kode_jenis})</a>
				<input type='hidden' name='pph' id='pph' value='{$kode_akun}-{$kode_jenis}' />
				<script>
				$('.notif').popover()
				</script>
			"; }
		}
		
		if ($belanjaid == 3) //---> JASA KONSTRUKSI
		{
			if ($nilai < 1000000) 
			{
				$ppn = 0;
			}
			if ($nilai >= 1000000) 
			{
				$ppn = 100/110 * $nilai * 0.1;
			}
			$pph = ($nilai - 0.1); // PPh 4 (2)
			if($ppn>0) { echo "<a class='btn btn-info btn-sm'>PPN (411211-100)</a> 
			<input type='hidden' name='ppn' id='ppn' value='411211-100' />"; }
			if(isset($pph)) { echo "<a class='btn btn-danger btn-sm'>{$nama_jenis} ({$kode_akun}-{$kode_jenis})</a>
			<input type='hidden' name='pph' id='pph' value='{$kode_akun}-{$kode_jenis}' />
			"; }
		}
		if ($belanjaid == 4 || $belanjaid == 5) //---> JASA NON KONSTRUKSI
		{
			if ($nilai < 1000000) 
			{
				$ppn = 0;
			}
			if ($nilai >= 1000000) 
			{
				$ppn = 100/110 * $nilai * 0.1;
			}
			$pph = ($nilai - $ppn) * 0.02; // PPh 23
			if($ppn>0) { echo "<a class='btn btn-info btn-sm'>PPN (411211-100)</a> 
			<input type='hidden' name='ppn' id='ppn' value='411211-100' />
			"; }
			if(isset($pph)) { echo "<a class='btn btn-danger btn-sm'>{$nama_jenis} ({$kode_akun}-{$kode_jenis})</a>
			<input type='hidden' name='pph' id='pph' value='{$kode_akun}-{$kode_jenis}' />
			"; }
		}
		/*if ($belanjaid == 5) //---> SEWA BARANG
		{
			ECHO "sedang dikerjakan";
		}*/	
		if ($belanjaid == 6) //---> SEWA GEDUNG / BANGUNAN
		{
			if ($nilai < 1000000) 
			{
				$ppn = 0;
			}
			if ($nilai >= 1000000) 
			{
				$ppn = 100/110 * $nilai * 0.1;
			}
			$pph = ($nilai - 0.1); // PPh 4 10%
			if($ppn>0) { echo "<a class='btn btn-info btn-sm'>PPN (411211-100)</a> <input type='hidden' name='ppn' id='ppn' value='411211-100' />"; }
			if(isset($pph)) { echo "<a class='btn btn-danger btn-sm'>{$nama_jenis} ({$kode_akun}-{$kode_jenis})</a>
			<input type='hidden' name='pph' id='pph' value='{$kode_akun}-{$kode_jenis}' />
			"; }
		}
		if ($belanjaid == 7) //---> JASA CATERING
		{
			$ppn =0;
			$pph = ($nilai - $ppn) * 0.02; // PPh 23
			if(isset($pph)) { echo "<a class='btn btn-danger btn-sm'>{$nama_jenis} ({$kode_akun}-{$kode_jenis})</a>
			<input type='hidden' name='pph' id='pph' value='{$kode_akun}-{$kode_jenis}' />
			"; }
		}
		if ($belanjaid == 8) //---> JASA RESTAURANT
		{
			$ppn =0;
			if ($nilai >= 2000000) 
			{
				$pph = ($nilai - $ppn) * 0.015; // PPh 23
			}
			if(isset($pph)) { echo "<a class='btn btn-danger btn-sm'>{$nama_jenis} ({$kode_akun}-{$kode_jenis})</a>
			<input type='hidden' name='pph' id='pph' value='{$kode_akun}-{$kode_jenis}' />
			"; }
		}
		
		endif;
	
	}
	
	function cek_wp()
	{
		$cek = $this->app_model->getSelectedData('tbl_wp',array('npwp'=>$this->input->post('npwp')))->num_rows();
		if ($cek>0):
		 echo "1";
		else:
		 echo "0";
		endif;
	}
	
	function input_wp()
	{
		$data['npwp'] = $this->input->post('npwp');
		$data['nama'] = $this->input->post('nama');
		$data['alamat'] = $this->input->post('alamat');
		$input = $this->app_model->insertData('tbl_wp',$data);
	}
	
	
}
?>