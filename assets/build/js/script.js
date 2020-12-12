$(function () {

    // AJAX ASET
    $('.tombolTambahAset').on('click', function () {

        $('#judulModal').html('Input Data');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#id').val('');
        // $('#id_lokasi').val('');
        $('#barang').val('');
        $('#spesifikasi').val('');
        $('#jumlah').val('');
        $('#satuan').val('');
        $('#keterangan').val('');
        $('#foto').val('');

    });

    $('.modalUbahAset').on('click', function () {

        $('#judulModal').html('Update Data');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_aset');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_aset',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.kode_aset);
                $('#id_lokasi').val(data.id_lokasi);
                $('#barang').val(data.nama_barang);
                $('#spesifikasi').val(data.spesifikasi);
                $('#jumlah').val(data.jumlah);
                $('#satuan').val(data.satuan);
                $('#keterangan').val(data.keterangan);
                $('#foto').val(data.foto);
            }
        });

    });
    // END AJAX ASET


    // AJAX LOKASI
    $('.tombolTambahLokasi').on('click', function () {

        $('#judulModal').html('Input Data');
        $('.modal-footer button[type=submit]').html('Tambah Data');

        $('#id').val('');
        // $('#id_prodi').val('');
        $('#email').val('');

    });

    $('.modalUbahLokasi').on('click', function () {

        $('#judulModal').html('Update Data');
        $('.modal-footer button[type=submit]').html('Ubah Data');
        $('.modal-body form').attr('action', 'http://localhost/silab/Admin/saveUpdate_lokasi');

        const id = $(this).data('id');

        $.ajax({
            url: 'http://localhost/silab/Admin/update_lokasi',
            data: { id: id },
            method: 'post',
            dataType: 'json',
            success: function (data) {
                $('#id').val(data.id_lokasi);
                $('#id_prodi').val(data.id_prodi);
                $('#lab').val(data.nama_lab);
            }
        });

    });
    // END AJAX LOKASI


});