<div class="row">
    <?php if (is_admin()) : ?>
        <div class="col-xl-3 col-md-6 mb-4">
            <a class="nav-link pb-0" href="<?= base_url('barang'); ?>">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Data Vendor</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $barang; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-folder fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <a class="nav-link" href="<?= base_url('user'); ?>">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total User</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $user; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-user-plus fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
    <?php endif; ?>

    <!-- New section for welcome message and image -->
    <div class="col-xl-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="text-center">
                    <!-- Adjusted image size -->
                    <img src="<?= base_url('assets/img/KAL.png') ?>" alt="Logo Perusahaan" style="width: 220px; height: auto; margin-bottom: 10px;">
                    <!-- Adjusted heading size -->
                    <h4 class="text-gray-800" style="margin-top: 10px; font-size: 1.25rem;">Selamat Datang di Aplikasi BTTD Online PT Krakatau Argo Logistics</h4>
                </div>
            </div>
        </div>
    </div>
</div>