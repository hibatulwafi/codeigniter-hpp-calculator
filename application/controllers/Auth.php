<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
	}


	public function login()
	{
		// cek session
		$ses_id = $this->session->id_pengguna;
		$ses_lv = $this->session->level;

		if (empty($ses_id)) {
			$this->form_validation->set_rules('user_email', 'Email / Username', 'required|trim', [
				'required' => 'Email / Username wajib diisi'
			]);

			$this->form_validation->set_rules('password', 'Password', 'required|trim', [
				'required' => 'Password wajib diisi'
			]);
			if ($this->form_validation->run() == false) {
				$data['title'] = 'Login';
				$data['breadcrumb'] = 'Login';
				$this->template->load('home/template', 'home/auth/view_login', $data);
			} else {
				$this->_login();
			}
		} else {
			if ($ses_lv == 1) {
				redirect('admin/sales');
			} elseif ($ses_lv == 2) {
				redirect('admin/import');
			} else {
				redirect('admin/management');
			}
		}
	}

	private function _login()
	{
		$user_email 	= $this->input->post('user_email');
		$password   	= $this->input->post('password');

		$this->db->from('tb_pengguna');
		$this->db->where("(tb_pengguna.email = '$user_email' OR tb_pengguna.username = '$user_email')");
		$user = $this->db->get()->row_array();

		// jika usernya ada
		if ($user) {
			// juka usernya aktif
			if ($user['aktif'] == 1) {
				// cek password
				if (password_verify($password, $user['password'])) {
					$data = array(
						'id_pengguna'   => $user['id_pengguna'],
						'username'   	=> $user['username'],
						'email'     	=> $user['email'],
						'password'   	=> $user['password'],
						'level' 		=> $user['level'],
					);
					$this->session->set_userdata($data);
					if ($user['level'] == 1) {
						redirect('admin/sales');
					} elseif ($user['level'] == 2) {
						redirect('admin/import');
					} else {
						redirect('admin/management');
					}
				}
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                    <center>
                    Email / Password salah.
                    </center>
                    </div>');
				redirect('login');
			} else {
				$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                <center>
                Akun tidak aktif
                </center>
                </div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            <center>
            Email / Password salah.
            </center>
            </div>');
			redirect('login');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('login');
	}
}
