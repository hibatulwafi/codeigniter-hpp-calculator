<?php
class Model_sales extends CI_model
{
  public function view()
  {
    $this->db->select('*');
    $this->db->from('tb_sales');
    $this->db->join('tb_barang','tb_sales.id_barang = tb_barang.id_barang');
    return $this->db->get()->result_array();
  }

  public function summary($id)
  {
    $this->db->select('*, sum(tb_sales.qty) sum_qty, sum(tb_sales.value) sum_value, sum(tb_sales.value) / sum(tb_sales.qty) hpp');
    $this->db->from('tb_sales');
    $this->db->join('tb_barang','tb_sales.id_barang = tb_barang.id_barang');
    $this->db->where('tb_sales.id_barang ',$id);
    $this->db->group_by('tb_sales.id_barang');
    return $this->db->get()->result_array();
  }

  public function detail($id)
  {
    $this->db->select('*');
    $this->db->from('tb_sales');
    $this->db->join('tb_barang','tb_sales.id_barang = tb_barang.id_barang');
    $this->db->where('tb_sales.id_barang ',$id);
    return $this->db->get()->result_array();
  }


  public function insert($table, $data)
  {
    return $this->db->insert($table, $data);
  }

  public function edit($table, $data)
  {
    return $this->db->get_where($table, $data);
  }

  public function update($table, $data, $where)
  {
    return $this->db->update($table, $data, $where);
  }

  public function delete($table, $where)
  {
    return $this->db->delete($table, $where);
  }

  public function cek_stok($id)
  {
    $this->db->select('sum(tb_import.qty) sum_qty');
    $this->db->from('tb_import');
    $this->db->where('tb_import.id_barang ',$id);
    $this->db->group_by('tb_import.id_barang');
    $import = $this->db->get()->result_array(); 
    $import[0]['sum_qty'];

    $this->db->select('sum(tb_sales.qty) sum_qty');
    $this->db->from('tb_sales');
    $this->db->where('tb_sales.id_barang ',$id);
    $this->db->group_by('tb_sales.id_barang');
    $sales = $this->db->get()->result_array(); 
    $sales[0]['sum_qty'];

    return $import[0]['sum_qty'] - $sales[0]['sum_qty'];
  }
}
