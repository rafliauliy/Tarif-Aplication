<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KAL PR Online</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: white;
        }

        .card-custom {
            max-width: 500px;
            margin: auto;
        }

        .logo {
            width: 100%;
            max-width: 220px;
            height: auto;
            margin-bottom: 10px;
        }

        .card-body {
            padding: 15px;
            /* Further reduced padding */
        }

        .form-group {
            margin-bottom: 10px;
            /* Further reduced margin-bottom */
        }

        .text-center {
            margin-bottom: 10px;
            /* Reduced margin-bottom for text-center */
        }

        .preloader {
            position: fixed;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background-color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .preloader .spinner {
            width: 50px;
            height: 50px;
            border: 5px solid #f3f3f3;
            border-top: 5px solid #3498db;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader" id="preloader">
        <div class="spinner"></div>
    </div>

    <!-- Outer Row -->
    <div class="row justify-content-center mt-5 pt-lg-5">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg card-custom">
                <div class="card-body p-lg-5 p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <!-- Form Column -->
                        <div class="col-12">
                            <div class="p-4">
                                <div class="text-center mb-3">
                                    <!-- Image Added Here -->
                                    <img src="<?= base_url('assets/img/KAL.png') ?>" alt="Logo Perusahaan" class="logo">
                                    <h1 class="h4 text-gray-900">Tarif Application</h1>
                                    <span class="text-muted">Login</span>
                                </div>
                                <!-- Flash Data Message -->
                                <?= $this->session->flashdata('pesan'); ?>
                                <!-- Login Form -->
                                <?= form_open('', ['class' => 'user']); ?>
                                <div class="form-group">
                                    <input autofocus="autofocus" autocomplete="off" value="<?= set_value('username'); ?>" type="text" name="username" class="form-control form-control-user" placeholder="Username">
                                    <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                                    <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                </button>
                                <?= form_close(); ?>
                            </div>
                            <div class="copyright text-center my-auto" style="font-size: 12px;">
                                <span>Copyright &copy; 2024 <a href="https://krakatau-argologistics.com/">PT Krakatau Argo Logistics</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Load Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        window.addEventListener('load', function() {
            document.getElementById('preloader').style.display = 'none';
        });

        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('preloader').style.display = 'flex';
        });
    </script>
</body>

</html>
