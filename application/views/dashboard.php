<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SB Admin Illustration Card</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-img-top {
            width: 220px;
            height: auto;
            margin: 20px;
            display: block;
        }

        .card-body {
            text-align: center;
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

        <div class="card">
            <div class="card border-bottom-primary shadow h-100">
                <div class="image-container">
                    <img src="<?= base_url('assets/img/KAL.png') ?>" alt="Logo Perusahaan" class="card-img-top">
                </div>
                <div class="card-body">
                    <h5 class="card-title">Tarif Web Application Krakatau Argo Logistics!</h5>
                </div>
            </div>
        </div>
        <!-- Bootstrap JS and dependencies -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</body>

</html>