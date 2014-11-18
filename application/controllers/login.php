<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$mode = $this->uri->segment(3);
		$game['masterdata'] = '';										#--- ACTIVATE Navbar Class="active". Just declare it with no value. sesuai dengan menu
		$game['template'] = 'twocolumn';								#--- pilihan template. anda bisa pilih twocolumn / onecolumn
		$game['komponen_top'] = array('forcelogin','navbar');			#--- Tambahkan html komponen di bagian paling atas halaman / sebelum template
				
		#------------------------------------------------------------------------------------------------------------
		#	Ambil data tambahan jika dibutuhkan dari database 
		#------------------------------------------------------------------------------------------------------------
		
		//$golongan = $this->app_model->getAllData('m_golongan')->result();
		//$lembaga = $this->app_model->getAllData('m_lembaga')->result();
		//$status = $this->app_model->getAllData('m_status')->result();
		
		#------------------------------------------------------------------------------------------------------------
		#	jQGrid variable dimulai dari sini 							KETERANGAN
		#------------------------------------------------------------------------------------------------------------
		
		$game['interface'] = array('grid');								#--- Tambahkan interface grid di template kolom 2
		$game['jqgrid'] = 'table_interface_jqgrid';						#--- meload javascript jqgrid interface
		$game['table'] = 'tbl_login';										#--- mendefinisikan nama table yang dipanggil ke jqgrid
		$game['kolom'] = $this->_getkolom($game['table']);				#--- memanggil private fungsi _getkolom. lihat fungsi _getkolom utk ket lebih lanjut
		$game['jqgrid_at_name'] = array(								#--- mendefinisikan nama kolom pada jqgrid
				$game['kolom'][1] => 'ID',							#    didefnikan  berdasarkan urutan kolom 
				$game['kolom'][2] => 'Username',							#    didefnikan  berdasarkan urutan kolom 
				$game['kolom'][3] => 'Password',						    #    misalkan kolom[1] namanya ID, kolom[2] namanya Nama, dst
				$game['kolom'][4] => 'Nama Pengguna',												
				$game['kolom'][5] => 'Status',																
		);																
		$game['jqgrid_at'] = array(										#--- mendefinisikan attribut kolom pada jqgrid
			$game['kolom'][1] => 'hidden:true,width:30',				#    didefnikan  berdasarkan urutan kolom 
			$game['kolom'][2] => 'editable:true,width:150',						#    misalkan kolom[1] attributnua hidden:false, kolom[2] attributnya width:100, dst
			$game['kolom'][3] => 'editable:true,width:150',
			$game['kolom'][4] => 'editable:true,width:150',
			$game['kolom'][5] => 'editable:true,width:200',
		);
				
		$game['button_nav'] = array(									#--- Tambahkan tombol perintah di jqgrid
			'add' => true,												#    tersedia tombol add, reload, cari dan delete
			'reload' => true,											#    cara mengaktifkannya dengan memberi nilai TRUE pada key variabel array
			'delete' => true											#    cara mengaktifkannya dengan memberi nilai TRUE pada key variabel array
		);
		
		$game['join'] = array(													  #--- mengaktifkan fungsi join table di jqgird
			// 'id_golongan'	=> array( 'm_golongan-idid'	=>	'golongan' ),	  #	contoh :
			// 'id_lembaga'	=> array( 'm_lembaga-idid'	=>	'lembaga' ), 		  #	'id_lembaga'	=> array( 'm_lembaga-idid'			=>	'desc' ),
			// 'id_status'		=> array( 'm_status-idid'	=>	'status' ),       #	'id_lembaga'	=> array( 'm_lembaga-idid'			=>	'desc' ),
		);																          #	 ^ Sbg Foreign Key			^ Nama table-Primary Key	 ^ Kolom yg ingin diambil valuenya
		
		#----------------------------------------------------------------------------------------------------------------------------
		# load variabel into url untuk menghasilkan jqgird
		#----------------------------------------------------------------------------------------------------------------------------
		# ada tiga jenis load url :
		# 1. Dengan variabel $mode == ""
		# 	 memanggil file index yang di dalamnya terdapat script table_interface_jqgrid yang berada di view/jqgrid
		#	 menampilkan interface jqgrid
		# 2. Dengan variabel $mode == "load"
		#	 memanggil file table_load_jqgrid di view/jqgrid
		#	 fungsi : meload data jqgrid dari server
		# 3. Dengan variabel $mode == "update"
		#	 memanggil file table_update_jqgrid di view/jqgrid
		#	 fungsi : mengupdate data jqgrid ke server
		
		if ( empty ( $mode ) ):
			$this->load->view('index',$game);
		endif;
		if ( $mode == 'load' ):
			$this->load->view('jqgrid/table_load_jqgrid',$game);
		endif;
		if ( $mode == 'update' ):
			$this->load->view('jqgrid/table_update_jqgrid',$game);
		endif;
	}
	
	# Fungsi pRIVATE ambil nama kolom dari table
	private function _getkolom($table)
	{
		$i=0;
		$fields = $this->db->list_fields($table);
		foreach ($fields as $field){$i++;$kolom[$i] = $field;}
		return $game['kolom'] = $kolom;
	}
}

/* End of file pejabat.php */
/* Location: ./application/controllers/pejabat.php */