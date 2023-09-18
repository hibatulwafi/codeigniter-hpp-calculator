<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('model_app');
		$this->load->model('model_master');
		$this->load->model('model_import');
		$this->load->model('model_sales');
		$this->load->model('model_management');
	}

	function index()
	{
		if ($this->session->level == 1 || $this->session->level == 2 || $this->session->level == 3) {
			redirect('admin/home');
		} else {
			redirect('error404');
		}
	}

	function home()
	{
		if (!empty($this->session->userdata())) {

			$data['title'] = 'Admin - Admin';
			$data['grap'] = $this->model_main->grafik_kunjungan();

			$this->template->load('admin/template', 'admin/view_dashboard', $data);
		} else {
			redirect('admin');
		}
	}

	// Master Barang

	function barang()
	{
		cek_session_admin_import();
		$data['title'] = 'Barang - Einpi';
		$data['record'] = $this->model_master->view_ordering('tb_barang', 'id_barang', 'ASC');
		$this->template->load('admin/template', 'admin/barang/view_barang', $data);
	}

	function tambah_barang()
	{
		cek_session_admin_import();
		if (isset($_POST['submit'])) {
			$data = array(
				'kode_barang' => $this->input->post('kode_barang'),
				'brand' => $this->input->post('brand'),
				'nama_barang' => $this->input->post('nama_barang'),
			);
			$this->model_master->insert('tb_barang', $data);
			redirect('admin/barang');
		} else {
			$data['title'] = 'Tambah Barang - Einpi';
			$this->template->load('admin/template', 'admin/barang/view_barang_tambah', $data);
		}
	}

	function edit_barang()
	{
		cek_session_admin_import();
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {

			$data = array(
				'kode_barang' => $this->input->post('kode_barang'),
				'brand' => $this->input->post('brand'),
				'nama_barang' => $this->input->post('nama_barang'),
			);

			$where = array('id_barang' => $this->input->post('id'));
			$this->model_master->update('tb_barang', $data, $where);
			redirect('admin/barang');
		} else {
			$data['title'] = 'Edit Barang - Einpi';
			$data['rows'] = $this->model_master->edit('tb_barang', array('id_barang' => $id))->row_array();
			$this->template->load('admin/template', 'admin/barang/view_barang_edit', $data);
		}
	}

	function delete_barang($id)
	{
		$where = array('id_barang' => $id);
		$this->model_master->delete('tb_barang', $where);
		echo json_encode(array("status" => TRUE));
	}
	//End Master Barang

	//Sales
	function sales()
	{
		cek_session_admin_sales();
		if (!empty($this->session->userdata())) {
			$data['title'] = 'Sales -Admin';
			$data['record'] = $this->model_sales->view();
			$this->template->load('admin/template', 'admin/sales/view_sales', $data);
		} else {
			redirect('admin');
		}
	}

	function tambah_sales()
	{
		cek_session_admin_sales();
		if (isset($_POST['submit'])) {

			$data = array(
				'id_barang' => $this->input->post('id_barang'),
				'nama_customer' => $this->input->post('nama_customer'),
				'harga_jual' => $this->input->post('harga_jual'),
				'qty' => $this->input->post('qty'),
				'value' => $this->input->post('value'),
				'sales' => $this->input->post('sales'),
				'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
			);

			$this->model_app->insert('tb_sales', $data);
			redirect('admin/sales');
		} else {

			$data['title'] = 'Tambah Sales - Admin';
			$data['barang'] = $this->model_master->view_ordering('tb_barang', 'kode_barang', 'ASC');
			$this->template->load('admin/template', 'admin/sales/view_sales_tambah', $data);
		}
	}

	function edit_sales()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {

			$data = array(
				'id_barang' => $this->input->post('id_barang'),
				'nama_customer' => $this->input->post('nama_customer'),
				'harga_jual' => $this->input->post('harga_jual'),
				'qty' => $this->input->post('qty'),
				'value' => $this->input->post('value'),
				'sales' => $this->input->post('sales'),
				'tanggal_transaksi' => $this->input->post('tanggal_transaksi'),
			);

			$where = array('id_sales' => $this->input->post('id'));
			$this->model_app->update('tb_sales', $data, $where);
			redirect('admin/sales');
		} else {
			$data['title'] = 'Edit Sales - Admin';
			$data['barang'] = $this->model_master->view_ordering('tb_barang', 'kode_barang', 'ASC');
			$data['rows'] = $this->model_sales->edit('tb_sales', array('id_sales' => $id))->row_array();
			$this->template->load('admin/template', 'admin/sales/view_sales_edit', $data);
		}
	}

	function delete_sales($id)
	{
		cek_session_admin_sales();
		$where = array('id_sales' => $id);
		$this->model_app->delete('tb_sales', $where);
		echo json_encode(array("status" => TRUE));
	}

	function cek_stok($id)
	{
		cek_session_admin_sales();
		$data = $this->model_sales->cek_stok($id);
		echo json_encode(array("status" => $data));
	}
	//End Sales


	//Import
	function import()
	{
		cek_session_admin_import();
		if (!empty($this->session->userdata())) {
			$data['title'] = 'Import - Admin';
			$data['record'] = $this->model_import->view();
			$this->template->load('admin/template', 'admin/import/view_import', $data);
		} else {
			redirect('login');
		}
	}

	function detail_import()
	{
		cek_session_admin_import();
		$id = $this->uri->segment(3);
		$data['title'] = 'Detail Import - Admin';
		$data['summary'] = $this->model_import->summary($id);
		$data['record'] = $this->model_import->detail($id);
		$this->template->load('admin/template', 'admin/import/view_import_detail', $data);
	}

	function tambah_import()
	{
		cek_session_admin_import();
		if (isset($_POST['submit'])) {

			$data = array(
				'id_barang' => $this->input->post('id_barang'),
				'qty' => $this->input->post('qty'),
				'value' => $this->input->post('value'),
				'tanggal_input' => $this->input->post('tanggal_input'),
			);

			$this->model_app->insert('tb_import', $data);
			redirect('admin/import');
		} else {

			$data['title'] = 'Tambah Import - Admin';
			$data['barang'] = $this->model_master->view_ordering('tb_barang', 'kode_barang', 'ASC');
			$this->template->load('admin/template', 'admin/import/view_import_tambah', $data);
		}
	}

	function edit_import()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])) {

			$data = array(
				'id_barang' => $this->input->post('id_barang'),
				'qty' => $this->input->post('qty'),
				'value' => $this->input->post('value'),
				'tanggal_input' => $this->input->post('tanggal_input'),
			);

			$where = array('id_import' => $this->input->post('id'));
			$this->model_app->update('tb_import', $data, $where);
			redirect('admin/import');
		} else {
			$data['title'] = 'Edit Import - Admin';
			$data['barang'] = $this->model_master->view_ordering('tb_barang', 'kode_barang', 'ASC');
			$data['rows'] = $this->model_import->edit('tb_import', array('id_import' => $id))->row_array();
			$this->template->load('admin/template', 'admin/import/view_import_edit', $data);
		}
	}

	function delete_import($id)
	{
		cek_session_admin_import();
		$where = array('id_import' => $id);
		$this->model_app->delete('tb_import', $where);
		echo json_encode(array("status" => TRUE));
	}
	//End Import


	// Management
	function management()
	{
		cek_session_admin_management();
		if (!empty($this->session->userdata())) {
			$data['title'] = 'HPP - Management';
			$data['record'] = $this->model_management->view_hpp();
			$this->template->load('admin/template', 'admin/hpp/view_hpp', $data);
		} else {
			redirect('login');
		}
	}

	function simulasi()
	{
		cek_session_admin_management();
		$id = $this->uri->segment(3);
		$data['title'] = 'Detail Import - Admin';
		$data['summary'] = $this->model_import->summary($id);
		$data['record'] = $this->model_management->simulasi($id);
		$this->template->load('admin/template', 'admin/hpp/view_hpp_simulasi', $data);
	}

	function simulator()
	{
		cek_session_admin_management();
		$id = $this->uri->segment(3);
		$data['title'] = 'Simulator - Admin';
		$data['record'] = $this->model_management->view_hpp();
		$this->template->load('admin/template', 'admin/simulasi/view_simulasi', $data);
	}

	function tambah_simulasi()
	{
		cek_session_admin_management();
		if (isset($_POST['submit'])) {
			$data = array(
				'id_barang' => $this->input->post('id_barang'),
				'harga_jual' => $this->input->post('harga_jual'),
				'unit' => $this->input->post('unit'),
			);

			$this->model_app->insert('tb_simulasi', $data);
			redirect('admin/simulasi/'.$this->input->post('id_barang'));
		} 
	}

	function delete_simulasi($id)
	{
		cek_session_admin_management();
		$where = array('id_simulasi' => $id);
		$this->model_app->delete('tb_simulasi', $where);
		echo json_encode(array("status" => TRUE));
	}

	function report()
	{
		cek_session_admin_management();
		$id = $this->uri->segment(3);
		$data['title'] = 'Report - Management';
		$data['record'] = $this->model_management->report();
		$this->template->load('admin/template', 'admin/report/view_report', $data);
	}
	
	// End Management
}
