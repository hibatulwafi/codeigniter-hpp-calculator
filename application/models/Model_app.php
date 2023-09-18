<?php
class Model_app extends CI_model
{
    public function view($table)
    {
        return $this->db->get($table);
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

    public function view_ordering($table, $order, $ordering)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->order_by($order, $ordering);
        return $this->db->get()->result_array();
    }

    public function cek_login($username, $password, $table)
    {
        return $this->db->query("SELECT * FROM $table where username='" . $this->db->escape_str($username) . "' AND password='" . $this->db->escape_str($password) . "'");
    }


   
}
