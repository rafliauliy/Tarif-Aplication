<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function update($table, $column, $id, $data)
    {
        $this->db->where($column, $id);
        return $this->db->update($table, $data);
    }

    public function insert($table, $data, $batch = false)
    {
        return $batch ? $this->db->insert_batch($table, $data) : $this->db->insert($table, $data);
    }

    public function getUsers($id)
    {
        $this->db->where('id_user !=', $id);
        return $this->db->get('user')->result_array();
    }

    public function getAllPurchase()
    {
        return $this->db->get('purchase_request')->result_array();
    }

    public function getPurchaseByUserId($userId)
    {
        return $this->db->get_where('purchase_request', ['id_user' => $userId])->result_array();
    }

    public function getMax($table, $field, $kode = null)
    {
        $this->db->select_max($field);
        if ($kode != null) {
            $this->db->like($field, $kode, 'after');
        }
        return $this->db->get($table)->row_array()[$field];
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }

    public function delete($table, $pk, $id)
    {
        return $this->db->delete($table, [$pk => $id]);
    }

    public function getPurchaseById($id)
    {
        $query = $this->db->get_where('purchase_request', array('id_purchase' => $id));
        return $query->row_array();
    }



    public function get_purchase_request($id_purchase)
    {
        return $this->db->get_where('purchase_request', ['id_purchase' => $id_purchase])->row_array();
    }

    public function get_purchase_items($id_purchase)
    {
        return $this->db->get_where('purchase_items', ['id_purchase' => $id_purchase])->result_array();
    }



    public function getDataById($id_purchase)
    {
        $query = $this->db->get_where('purchase_request', array('id_purchase' => $id_purchase));
        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return null;
        }
    }

    public function get_purchase_by_id_vendor($id_purchase)
    {
        return $this->db->get_where('purchase_request', array('id_purchase' => $id_purchase))->result_array();
    }

    public function getUserById($id_user)
    {
        $this->db->where('id_user', $id_user);
        $query = $this->db->get('user');
        return $query->row_array();
    }

    public function updateUser($id_user, $data)
    {

        $this->db->where('id_user', $id_user);
        return $this->db->update('user', $data);
    }


    public function getAllData()
    {
        $query = $this->db->get('purchase_request');
        return $query->result_array();
    }

    // Method save_purchase_item untuk menyimpan data item pembelian
    public function save_purchase_item($data)
    {
        $this->db->insert('purchase_items', $data);
        return $this->db->insert_id();
    }

    public function get_approval_options()
    {
        return $this->db->get('approval')->result_array();
    }

    public function getApprovalOptions()
    {
        return $this->db->select('name, position')->get('approval')->result_array();
    }

    public function update_purchase_item($data)
    {
        $this->db->where('id_items', $data['id_items']);
        return $this->db->update('purchase_items', $data);
    }
    public function get_last_pr_number()
    {
        $this->db->select('number_pr');
        $this->db->order_by('id_purchase', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('purchase_request');

        if ($query->num_rows() > 0) {
            return $query->row()->number_pr;
        } else {
            return 'PR000000'; // Jika tidak ada nomor PR sebelumnya, kembalikan nilai default
        }
    }

    // Fungsi untuk menghasilkan nomor PR berikutnya
    public function generate_next_pr_number()
    {
        $last_pr_number = $this->get_last_pr_number();
        // Dapatkan angka dari nomor PR terakhir
        $last_pr_number_numeric = (int)substr($last_pr_number, 2);
        // Tambahkan 1 untuk mendapatkan nomor PR berikutnya
        $next_pr_number_numeric = $last_pr_number_numeric + 1;
        // Format nomor PR berikutnya
        $next_pr_number = 'PR' . str_pad($next_pr_number_numeric, 6, '0', STR_PAD_LEFT);
        return $next_pr_number;
    }
    public function get_purchase_data_by_id($id)
    {
        $query = $this->db->get_where('purchase_request', array('id' => $id));
        return $query->row();
    }
}
