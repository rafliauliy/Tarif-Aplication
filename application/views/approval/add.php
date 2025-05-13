<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="card p-3">
    <?php echo validation_errors(); ?>
    <?php echo form_open('approvals/create'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label for="nama_vendor">Nama Vendor</label>
                <input type="text" name="nama_vendor" class="form-control form-control-sm" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="muat">Muat</label>
                <input type="text" name="muat" class="form-control form-control-sm" />
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="bongkar">Bongkar</label>
                <input type="text" name="bongkar" class="form-control form-control-sm" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="jenis_cargo">Jenis Cargo</label>
                <input type="text" name="jenis_cargo" class="form-control form-control-sm" />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="jenis_transportasi">Jenis Moda Transportasi</label>
                <input type="text" name="jenis_transportasi" class="form-control form-control-sm" />
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="tarif_ritase">Tarif Sales Ritase</label>
                <input type="text" name="tarif_ritase" id="tarif_ritase" class="form-control form-control-sm" />
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="tarif_ritase_persen">Persen Ritase(%)</label>
                <input type="number" name="tarif_ritase_persen" id="tarif_ritase_persen" value="10" class="form-control form-control-sm" />
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="tarif_tonase">Tarif Sales Perton</label>
                <input type="text" name="tarif_tonase" id="tarif_tonase" class="form-control form-control-sm" />
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="tarif_tonase_persen">Persentase tonase(%)</label>
                <input type="number" name="tarif_tonase_persen" id="tarif_tonase_persen" value="10" class="form-control form-control-sm" />
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <button type="button" id="calculateRitaseButton" class="btn btn-secondary btn-block mb-3">Hitung Tarif Ritase</button>
        </div>
        <div class="col-md-6">
            <button type="button" id="calculateTonaseButton" class="btn btn-secondary btn-block mb-3">Hitung Tarif Pertonase</button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="hasil_ritase">Hasil Tarif Ritase</label>
                <input type="text" id="hasil_ritase" name="hasil_ritase" class="form-control form-control-sm" readonly />
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="hasil_tonase">Hasil Tarif Pertonase</label>
                <input type="text" id="hasil_tonase" name="hasil_tonase" class="form-control form-control-sm" readonly />
            </div>
        </div>

    </div>

    <input type="submit" name="submit" value="Create" class="btn btn-primary btn-block" />

    <?php echo form_close(); ?>
</div>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script>
    function formatRupiah(angka, prefix, unit) {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix === undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah + unit : '');
    }

    function calculateTonaseWithPercentage() {
        var tonase = $('input[name="tarif_tonase"]').val().replace(/[^,\d]/g, '');
        var percentage = $('input[name="tarif_tonase_persen"]').val();
        if (tonase && percentage) {
            var tonase_value = parseFloat(tonase);
            var percentage_value = parseFloat(percentage) / 100;
            var calculated_value = tonase_value + (tonase_value * percentage_value);
            $('#hasil_tonase').val(formatRupiah(calculated_value.toString(), 'Rp. ', '/tonase'));
        }
    }

    function calculateRitaseWithPercentage() {
        var ritase = $('input[name="tarif_ritase"]').val().replace(/[^,\d]/g, '');
        var percentage = $('input[name="tarif_ritase_persen"]').val();
        if (ritase && percentage) {
            var ritase_value = parseFloat(ritase);
            var percentage_value = parseFloat(percentage) / 100;
            var calculated_value = ritase_value + (ritase_value * percentage_value);
            $('#hasil_ritase').val(formatRupiah(calculated_value.toString(), 'Rp. ', '/ritase'));
        }
    }

    $(document).ready(function() {
        $('#calculateTonaseButton').on('click', function() {
            calculateTonaseWithPercentage();
        });

        $('#calculateRitaseButton').on('click', function() {
            calculateRitaseWithPercentage();
        });

        $('input[name="tarif_tonase"]').on('input', function() {
            var formattedValue = formatRupiah($(this).val(), 'Rp. ', '/tonase');
            $(this).val(formattedValue);
        });

        $('input[name="tarif_ritase"]').on('input', function() {
            var formattedValue = formatRupiah($(this).val(), 'Rp. ', '/ritase');
            $(this).val(formattedValue);
        });

        // Set hidden input values on form submit
        $('form').on('submit', function() {
            $('#hasil_ritase').prop('readonly', false);
            $('#hasil_tonase').prop('readonly', false);
        });
    });
</script>