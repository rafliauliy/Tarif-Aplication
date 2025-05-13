<?= $this->session->flashdata('pesan'); ?>

<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Tarif
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('approvals/create') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Tarif Baru
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped" id="dataTable">
            <thead>
                <tr>
                    <th width="10">No.</th>
                    <th>Nama Vendor</th>
                    <th>Asal Muat</th>
                    <th>Wilayah Bongkar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($approvals)) :
                    $no = 1;
                    foreach ($approvals as $data) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama_vendor']; ?></td>
                            <td><?= $data['muat']; ?></td>
                            <td><?= $data['bongkar']; ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Action Buttons">
                                    <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#detailModal<?= $data['id_approval']; ?>">
                                        <i class="fa fa-fw fa-eye"></i>
                                    </button>
                                    <a href="<?= base_url('approvals/edit/') . $data['id_approval'] ?>" class="btn btn-warning btn-sm">
                                        <i class="fa fa-fw fa-edit"></i>
                                    </a>
                                    <a onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('approvals/delete/') . $data['id_approval'] ?>" class="btn btn-danger btn-sm">
                                        <i class="fa fa-fw fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                        <!-- Modal Detail -->
                        <div class="modal fade" id="detailModal<?= $data['id_approval']; ?>" tabindex="-1" role="dialog" aria-labelledby="detailModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailModalLabel">Detail Tarif</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Nama Vendor:</strong> <?= $data['nama_vendor']; ?></p>
                                        <p><strong>Muat:</strong> <?= $data['muat']; ?></p>
                                        <p><strong>Bongkar:</strong> <?= $data['bongkar']; ?></p>
                                        <p><strong>Jenis Cargo:</strong> <?= $data['jenis_cargo']; ?></p>
                                        <p><strong>Tarif Sales Tonase:</strong> <?= $data['tarif_tonase']; ?></p>
                                        <p><strong>Persentase Tonase (%):</strong> <?= $data['tarif_tonase_persen']; ?></p>
                                        <p><strong>Hasil Tonase:</strong> <?= $data['hasil_tonase']; ?></p>
                                        <p><strong>Tarif Sales Ritase:</strong> <?= $data['tarif_ritase']; ?></p>
                                        <p><strong>Persentase Ritase (%):</strong> <?= $data['tarif_ritase_persen']; ?></p>
                                        <p><strong>Hasil Ritase:</strong> <?= $data['hasil_ritase']; ?></p>
                                        <p><strong>Jenis Moda Transportasi:</strong> <?= $data['jenis_transportasi']; ?></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach;
                else : ?>
                    <tr>
                        <td colspan="5" class="text-center">Data tidak tersedia.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Custom CSS for Modal -->
<style>
    .modal-content {
        padding: 20px;
    }

    .modal-body p {
        margin-bottom: 10px;
    }

    .modal-header {
        border-bottom: 1px solid #e9ecef;
    }

    .modal-footer {
        border-top: 1px solid #e9ecef;
    }

    .btn-group .btn {
        margin-right: 5px;
    }

    .btn-group .btn:last-child {
        margin-right: 0;
    }
</style>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>