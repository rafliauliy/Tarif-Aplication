<?php
class Approval_model extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }

    public function get_approvals($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('approval');
            return $query->result_array();
        }

        $query = $this->db->get_where('approval', array('id_approval' => $id));
        return $query->row_array();
    }

    public function set_approval()
    {
        $data = array(
            'nama_vendor' => $this->input->post('nama_vendor'),
            'muat' => $this->input->post('muat'),
            'bongkar' => $this->input->post('bongkar'),
            'jenis_cargo' => $this->input->post('jenis_cargo'),
            'tarif_tonase' => $this->input->post('tarif_tonase'),
            'tarif_ritase' => $this->input->post('tarif_ritase'),
            'jenis_transportasi' => $this->input->post('jenis_transportasi'),
            'tarif_ritase_persen' => $this->input->post('tarif_ritase_persen'),
            'hasil_ritase' => $this->input->post('hasil_ritase'),
            'tarif_tonase_persen' => $this->input->post('tarif_tonase_persen'),
            'hasil_tonase' => $this->input->post('hasil_tonase')
        );

        return $this->db->insert('approval', $data);
    }

    public function update_approval($id)
    {
        $data = array(
            'nama_vendor' => $this->input->post('nama_vendor'),
            'muat' => $this->input->post('muat'),
            'bongkar' => $this->input->post('bongkar'),
            'jenis_cargo' => $this->input->post('jenis_cargo'),
            'tarif_tonase' => $this->input->post('tarif_tonase'),
            'tarif_ritase' => $this->input->post('tarif_ritase'),
            'jenis_transportasi' => $this->input->post('jenis_transportasi'),
            'tarif_ritase_persen' => $this->input->post('tarif_ritase_persen'),
            'hasil_ritase' => $this->input->post('hasil_ritase'),
            'tarif_tonase_persen' => $this->input->post('tarif_tonase_persen'),
            'hasil_tonase' => $this->input->post('hasil_tonase')
        );

        $this->db->where('id_approval', $id);
        return $this->db->update('approval', $data);
    }

    public function delete_approval($id)
    {
        $this->db->where('id_approval', $id);
        return $this->db->delete('approval');
    }
}
