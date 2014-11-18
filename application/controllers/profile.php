<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Profile extends CI_Controller {
	
	function __construct()
	{
		parent::__construct();	
		$this->profile = $this->session->userdata('username');		
	}
	
	public function index()
	{
		if ($_POST)
		{
			$this->load->library ('Form_validation');
			$f = $this->form_validation;
			$f->set_rules('nama_pengguna', 'Nama Lengkap', 'trim|required');
			if ($f->run())
			{
				$rtn = array ('code' => 0);
				$id['username'] = $this->input->post('username');
				$up['nama_pengguna'] = $this->input->post('nama_pengguna');
				$this->app_model->updateData("tbl_login",$up,$id);										
			}
			else
			{
				$rtn = array ('code' => 1, 'message' => validation_errors('<li>', '</li>'));
			}
				print json_encode ($rtn);
				exit();
		}
		
		$data['profile'] = '';		
		$data['template'] = 'new_template';		
		$data['komponen_top'] = array('navbar','forcelogin');
		$data['interface'] = array('profile');
		$data['komponen_bottom'] = 'beginfooter';
		$data['profile'] = $this->session->userdata('nama_pengguna');
		$this->load->view('index', $data);
	}
	
	public function chpasswd()
	{
		if ($_POST)
		{
			$this->load->library ('Form_validation');
			$f = $this->form_validation;
			$f->set_rules('password', 'Password Sekarang', 'trim|required|callback_check_password');
			$f->set_rules('new_password', 'Password Baru', 'trim|required|min_length[3]|max_length[30]');
			$f->set_rules('conf_password', 'Konfirmasi Password Baru', 'trim|required|matches[new_password]');
			if ($f->run())
			{
				$rtn = array ('code' => 0);
				$data = array (
					'password' => set_value('new_password') //md5(set_value('new_password'))
				);
				$id['username'] = $this->session->userdata('username');
				$this->app_model->updateData("tbl_login",$data,$id);														
			}
			else
			{
				$rtn = array ('code' => 1, 'message' => validation_errors('<li>', '</li>'));
			}
			print json_encode ($rtn);
			exit();
		}
		
		$data['profile'] = '';		
		$data['template'] = 'new_template';		
		$data['komponen_top'] = array('navbar','forcelogin');
		$data['interface'] = array('chpasswd');
		$data['komponen_bottom'] = 'beginfooter';
		$data['profile'] = $this->session->userdata('username');
		$this->load->view('index', $data);		
	}
	
	public function check_password ($password)
	{
		$username = $this->session->userdata('username');
		if ($this->app_model->login ($username, $password))
			return true;
		else
		{
			$this->form_validation->set_message('check_password', 'Password yang Anda masukkan tidak benar, silahkan mencoba kembali.');
			return false;
		}
	}
}