<!-- Outer Row -->
<div class="row justify-content-center mt-5">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-lg-5 p-0">
                <div class="p-4">
                    <div class="text-center mb-4">
                        <h1 class="h4 text-gray-900">KAL PR ONLINE</h1>
                        <span class="text-muted">Buat Akun</span>
                    </div>
                    <?= $this->session->flashdata('pesan'); ?>
                    <?= form_open('', ['class' => 'user']); ?>
                    <div class="form-group">
                        <input autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>" type="text" name="username" autocomplete="off" class="form-control form-control-user" placeholder="Username">
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control form-control-user" autocomplete="off" placeholder="Password">
                                <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input type="password" name="password2" class="form-control form-control-user" autocomplete="off" placeholder="Konfirmasi Password">
                                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input value="<?= set_value('nama_perusahaan'); ?>" type="text" name="nama_perusahaan" class="form-control form-control-user" autocomplete="off" placeholder="Nama Perusahaan">
                        <?= form_error('nama_perusahaan', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input value="<?= set_value('nama'); ?>" autocomplete="off" type="text" name="nama" class="form-control form-control-user" autocomplete="off" placeholder="Nama PIC">
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input value="<?= set_value('alamat'); ?>" type="text" name="alamat" class="form-control form-control-user" autocomplete="off" placeholder="Alamat Perusahaan">
                        <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <input value="<?= set_value('email'); ?>" type="text" name="email" class="form-control form-control-user" autocomplete="off" placeholder="Email Perusahaan">
                                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <input value="<?= set_value('no_telp'); ?>" type="text" name="no_telp" class="form-control form-control-user" autocomplete="off" placeholder="Telepon Perusahaan">
                                <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <input value="<?= set_value('no_wa'); ?>" type="text" name="no_wa" class="form-control form-control-user" autocomplete="off" placeholder="Nomer Whatsapp PIC">
                        <?= form_error('no_wa', '<small class="text-danger">', '</small>'); ?>
                    </div>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Daftar
                    </button>
                    <div class="text-center mt-4">
                        <a class="small" href="<?= base_url('auth') ?>">Sudah punya akun? Login</a>
                    </div>
                    <?= form_close(); ?>

                </div>
            </div>
        </div>

    </div>
</div>