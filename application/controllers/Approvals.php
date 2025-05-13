<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Approvals extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Approval_model');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['approvals'] = $this->Approval_model->get_approvals();
        $data['title'] = 'KAL Tarif';
        $this->template->load('templates/dashboard', 'approval/data', $data);
    }

    public function view($id)
    {
        $data['approval'] = $this->Approval_model->get_approvals($id);

        if (empty($data['approval'])) {
            show_404();
        }

        $data['title'] = 'Tarif List';
        $this->template->load('templates/dashboard', 'approval/data', $data);
    }

    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a new Tarif';

        $this->form_validation->set_rules('nama_vendor', 'Nama Vendor', 'required');
        $this->form_validation->set_rules('muat', 'Muat', 'required');
        $this->form_validation->set_rules('bongkar', 'Bongkar', 'required');
        $this->form_validation->set_rules('jenis_cargo', 'Jenis Cargo', '');
        $this->form_validation->set_rules('tarif_tonase', 'Tarif Tonase', '');
        $this->form_validation->set_rules('tarif_ritase', 'Tarif Ritase', '');
        $this->form_validation->set_rules('jenis_transportasi', 'Jenis Transportasi', 'required');
        $this->form_validation->set_rules('tarif_ritase_persen', 'Tarif Ritase Persen', '');
        $this->form_validation->set_rules('hasil_ritase', 'Hasil Ritase', '');
        $this->form_validation->set_rules('tarif_tonase_persen', 'Tarif Tonase Persen', '');
        $this->form_validation->set_rules('hasil_tonase', 'Hasil Tonase', '');

        if ($this->form_validation->run() === FALSE) {
            $this->template->load('templates/dashboard', 'approval/add', $data);
        } else {
            $this->Approval_model->set_approval();
            redirect('approvals');
        }
    }

    public function edit($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['approval'] = $this->Approval_model->get_approvals($id);

        if (empty($data['approval'])) {
            show_404();
        }

        $data['title'] = 'Edit Tarif';

        $this->form_validation->set_rules('nama_vendor', 'Nama Vendor', 'required');
        $this->form_validation->set_rules('muat', 'Muat', 'required');
        $this->form_validation->set_rules('bongkar', 'Bongkar', 'required');
        $this->form_validation->set_rules('jenis_cargo', 'Jenis Cargo', '');
        $this->form_validation->set_rules('tarif_tonase', 'Tarif Tonase', '');
        $this->form_validation->set_rules('tarif_ritase', 'Tarif Ritase', '');
        $this->form_validation->set_rules('jenis_transportasi', 'Jenis Transportasi', 'required');
        $this->form_validation->set_rules('tarif_ritase_persen', 'Tarif Ritase Persen', '');
        $this->form_validation->set_rules('hasil_ritase', 'Hasil Ritase', '');
        $this->form_validation->set_rules('tarif_tonase_persen', 'Tarif Tonase Persen', '');
        $this->form_validation->set_rules('hasil_tonase', 'Hasil Tonase', '');

        if ($this->form_validation->run() === FALSE) {
            $this->template->load('templates/dashboard', 'approval/edit', $data);
        } else {
            $this->Approval_model->update_approval($id);
            redirect('approvals');
        }
    }

    public function delete($id)
    {
        $this->Approval_model->delete_approval($id);
        redirect('approvals');
    }
}
