<?php
class Model_management extends CI_model
{
  public function view_hpp()
  {
    $this->db->select('*, sum(tb_import.qty) sum_qty, sum(tb_import.value) sum_value, sum(tb_import.value) / sum(tb_import.qty) hpp');
    $this->db->from('tb_import');
    $this->db->join('tb_barang','tb_import.id_barang = tb_barang.id_barang');
    $this->db->group_by('tb_import.id_barang');
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

  public function simulasi($id)
  {
    $this->db->select('*');
    $this->db->from('tb_simulasi');
    $this->db->join('tb_barang','tb_simulasi.id_barang = tb_barang.id_barang');
    $this->db->where('tb_simulasi.id_barang ',$id);
    return $this->db->get()->result_array();
  }

  public function simulator($id)
  {
    $this->db->select('*');
    $this->db->from('tb_simulasi');
    $this->db->join('tb_barang','tb_simulasi.id_barang = tb_barang.id_barang');
    $this->db->where('tb_simulasi.id_barang ',$id);
    return $this->db->get()->result_array();
  }



  public function report()
  {
    $this->db->select('*');
    $this->db->from('tb_sales');
    $this->db->join('tb_barang','tb_sales.id_barang = tb_barang.id_barang');
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
}
