<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchase extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login(); // Pastikan ada fungsi helper untuk mengecek status login.

        $this->load->model('Admin_model', 'admin');
        $this->load->model('Admin_model', 'admin_model');
        $this->load->library('form_validation');

        // Ambil role dan user ID dari session
        $this->role = $this->session->userdata('role');
        $this->userId = $this->session->userdata('login_session')['user'];
    }

    public function index()
    {
        $data['title'] = "Purchase Request Online";

        $data['user'] = $this->admin->count('user');
        // Hitung total data yang belum diproses



        // Periksa apakah pengguna adalah admin menggunakan fungsi is_admin()
        if (is_admin()) {
            $data['purchase'] = $this->admin->getAllPurchase(); // Admin mendapatkan semua data
        } else {
            // Pastikan hanya role 'vendor' yang bisa mengakses data mereka sendiri
            $data['purchase'] = $this->admin->getPurchaseByUserId($this->userId); // Non-admin mendapatkan data mereka sendiri
        }

        $this->template->load('templates/dashboard', 'purchase/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('mra_title', 'Mra Title', 'required|trim');
        $this->form_validation->set_rules('mra_date', 'Mra Date', 'required');
        $this->form_validation->set_rules('budget_year', 'Budget Year', 'required');
        $this->form_validation->set_rules('department', 'Department', 'required');
        $this->form_validation->set_rules('budget_type', 'Budget Type', 'required');
        $this->form_validation->set_rules('delivery_date', 'Delivery Date', 'required');
        $this->form_validation->set_rules('description_benefit', 'Description Benefit', 'required');
        $this->form_validation->set_rules('total_amount', 'Total Amount', 'required');
        $this->form_validation->set_rules('approval_user_1', 'Approval User 1', 'required');
        $this->form_validation->set_rules('approval_user_2', 'Approval User_2', 'required');
        $this->form_validation->set_rules('approval_finance_1', 'Approval Finance 1', 'required');
        $this->form_validation->set_rules('approval_finance_2', 'Approval Finance_2', 'required');
        $this->form_validation->set_rules('position_user_1', 'Position User 1', 'required');
        $this->form_validation->set_rules('position_user_2', 'Position User 2', '');
        $this->form_validation->set_rules('position_finance_1', 'Position finance 1', 'required');
        $this->form_validation->set_rules('position_finance_2', 'Position finance 2', 'required');
        $this->form_validation->set_rules('status', 'Status', '');
    }

    public function add()

    {
        $this->_validasi();

        // Ambil opsi approval dari model dan kirim ke view
        $data['approval_options'] = $this->admin_model->getApprovalOptions();
        $data['number_pr'] = $this->Admin_model->generate_next_pr_number();

        if ($this->form_validation->run() == FALSE) {
            // Validasi gagal, tampilkan form dengan pesan error
            $data['title'] = "Add Purchase Request";
            $kode_terakhir = $this->admin_model->getMax('purchase_request', 'id_purchase');
            $kode_tambah = (int)$kode_terakhir + 1;
            $number = str_pad($kode_tambah, 4, '0', STR_PAD_LEFT); // Ubah menjadi 4 angka
            $data['id_purchase'] = $number;

            $this->template->load('templates/dashboard', 'purchase/add', $data);
        } else {
            // Validasi berhasil, simpan data purchase request
            $input = $this->input->post(null, TRUE);
            $input['id_user'] = $this->session->userdata('login_session')['user'];

            // Generate automatic purchase ID
            $last_purchase_id = $this->admin_model->getMax('purchase_request', 'id_purchase');
            $next_purchase_id = (int)$last_purchase_id + 1;
            $input['id_purchase'] = str_pad($next_purchase_id, 4, '0', STR_PAD_LEFT); // Ubah menjadi 4 angka

            // Ambil data item dari formulir dan ubah ke format JSON
            $items = $this->input->post('item');
            $input['item'] = json_encode($items);

            $id_purchase_request = $this->admin_model->insert('purchase_request', $input);

            if ($id_purchase_request) {
                // Simpan item pembelian dengan ID pembelian yang baru saja dimasukkan
                $this->save_purchase_items($id_purchase_request, $items, $input['id_purchase']);

                set_pesan('data saved successfully.');
                redirect('purchase');
            } else {
                set_pesan('failed to save data.', false);
                redirect('purchase/add');
            }
        }
    }

    public function save_purchase_items($id_purchase_request, $items, $id_purchase)
    {
        foreach ($items as $item) {
            // Hitung jumlah (amount)
            $amount = $item['quantity'] * $item['price'];

            $data_item = array(

                'item_description' => $item['description'],
                'qty' => $item['quantity'],
                'uom' => $item['uom'],
                'price' => $item['price'],
                'amount' => $amount, // Pastikan amount dihitung
                'id_purchase' => $id_purchase // Menggunakan id_purchase yang baru saja di-generate
            );

            // Simpan data item pembelian
            $this->admin_model->insert('purchase_items', $data_item);
        }
    }


    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        // Ambil opsi approval dari model dan kirim ke view
        $data['approval_options'] = $this->admin->getApprovalOptions();
        $data['number_pr'] = $this->Admin_model->generate_next_pr_number();
        if ($this->form_validation->run() == false) {
            $data['title'] = "View & Update Purchase Request";

            // Ambil detail permintaan pembelian yang akan diedit
            $data['purchase'] = $this->admin->get('purchase_request', ['id_purchase' => $id]);

            // Ambil item-item pembelian terkait dengan ID pembelian yang akan diedit
            $purchase_items = $this->admin->get('purchase_items', null, ['id_purchase' => $id]);
            $data['purchase_items'] = !empty($purchase_items) ? $purchase_items : [];

            $this->template->load('templates/dashboard', 'purchase/edit', $data);
        } else {
            // Memperbarui detail permintaan pembelian
            $input['mra_title'] = $this->input->post('mra_title', true);
            $input['mra_date'] = $this->input->post('mra_date', true);
            $input['budget_year'] = $this->input->post('budget_year', true);
            $input['department'] = $this->input->post('department', true);
            $input['delivery_date'] = $this->input->post('delivery_date', true);
            $input['description_benefit'] = $this->input->post('description_benefit', true);
            $input['total_amount'] = $this->input->post('total_amount', true);
            $input['approval_user_1'] = $this->input->post('approval_user_1', true);
            $input['approval_user_2'] = $this->input->post('approval_user_2', true);
            $input['approval_finance_1'] = $this->input->post('approval_finance_1', true);
            $input['approval_finance_2'] = $this->input->post('approval_finance_2', true);
            $input['position_user_1'] = $this->input->post('position_user_1', true);
            $input['position_user_2'] = $this->input->post('position_user_2', true);
            $input['position_finance_1'] = $this->input->post('position_finance_1', true);
            $input['position_finance_2'] = $this->input->post('position_finance_2', true);
            $input['status'] = $this->input->post('status', true);
            // Memperbarui detail permintaan pembelian di database
            $update_purchase = $this->admin->update('purchase_request', 'id_purchase', $id, $input);

            if ($update_purchase) {
                // Hapus semua item pembelian terkait dengan ID pembelian yang akan diedit
                $this->admin->delete('purchase_items', 'id_purchase', $id);

                // Tambahkan kembali item-item pembelian yang baru dari data yang dikirimkan oleh formulir
                $items_posted = $this->input->post('item');
                foreach ($items_posted as $item) {
                    $item_data = [
                        'id_purchase' => $id,
                        'item_description' => $item['description'],
                        'qty' => $item['quantity'],
                        'uom' => $item['uom'],
                        'price' => $item['price'],
                        'amount' => $item['amount']
                    ];
                    $this->admin->insert('purchase_items', $item_data);
                }

                set_pesan('Data berhasil disimpan.');
                redirect('purchase');
            } else {
                set_pesan('Gagal menyimpan data.', false);
                redirect('purchase/edit/' . $id);
            }
        }
    }


    public function delete($id_purchase)
    {
        // Hapus data purchase request
        $result = $this->admin_model->delete('purchase_request', 'id_purchase', $id_purchase);

        if ($result) {
            // Hapus item pembelian terkait
            $this->admin_model->delete('purchase_items', 'id_purchase', $id_purchase);

            set_pesan('Data successfully deleted.');
        } else {
            set_pesan('Failed to delete data.', false);
        }

        redirect('purchase');
    }




    public function print_purchase($id_purchase)
    {
        // Load model
        $this->load->model('admin_model');

        // Ambil data purchase request
        $purchase = $this->admin_model->get_purchase_request($id_purchase);

        // Ambil data purchase items
        $purchase_items = $this->admin_model->get_purchase_items($id_purchase);

        // Ambil data approval
        $approval_options = $this->admin_model->get_approval_options();

        // Load view dengan data
        $data = [
            'purchase' => $purchase,
            'purchase_items' => $purchase_items,
            'approval_options' => $approval_options,
            'title' => "Purchase Request"
        ];

        // Muat view ke dalam string
        $html = $this->load->view('purchase/print_purchase', $data, true);

        // Tentukan nama file PDF
        $file_pdf = $data['title'];
        $paper = 'A4';
        $orientation = "portrait";

        // Load library pdfgenerator dan generate PDF
        $this->load->library('pdfgenerator');
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }


    public function print_all()
    {
        if (!is_admin()) {
            redirect('purchase');
        }
        // Ambil data dari model
        $data['purchase'] = $this->Admin_model->getAllData();

        // Load library DOMPDF
        $this->load->library('pdfgenerator');
        $data['title'] = "Laporan BTTD";
        $file_pdf = $data['title'];
        $paper = 'A4';
        $orientation = "landscape";
        $html = $this->load->view('purchase/print_all', $data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
    }

    public function data_detail($id_purchase)
    {
        $data['title'] = "Detail BTTD"; // Set judul halaman

        // Mengambil detail barang berdasarkan $id_purchase dari model
        $data['purchase'] = $this->Admin_model->get_purchase_by_id_vendor($id_purchase);

        // Load views dengan data yang sudah diambil
        $this->template->load('templates/dashboard', 'purchase/data_detail', $data);
    }
    // Contoh penghitungan total barang di dalam controller

    public function excel()
    {
        if (!is_admin()) {
            redirect('purchase');
        }
        $data['title'] = "Data BTTD"; // Set judul halaman
        $data['purchase'] = $this->admin->getAllPurchase();
        $this->template->load('templates/dashboard', 'purchase/download_excel', $data);
    }
}
