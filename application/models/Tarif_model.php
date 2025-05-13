<?php
class Tarif_model extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function get_tarif($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('tarif');
            return $query->result_array();
        }

        $query = $this->db->get_where('tarif', array('id' => $id));
        return $query->row_array();
    }

    public function set_approval()
    {
        $data = array(
            'muat' => $this->input->post('muat'),
            'bongkar' => $this->input->post('bongkar')
        );

        return $this->db->insert('tarif', $data);
    }

    public function update_tarif($id)
    {
        $data = array(
            'muat' => $this->input->post('muat'),
            'bongkar' => $this->input->post('bongkar')
        );

        $this->db->where('id', $id);
        return $this->db->update('tarif', $data);
    }

    public function delete_tarif($id)
    {
        return $this->db->delete('tarif', array('id' => $id));
    }
}
