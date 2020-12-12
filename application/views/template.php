<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>SILAB</title>

  <!-- Bootstrap -->
  <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link href="<?= base_url('assets/'); ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= base_url('assets/'); ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= base_url('assets/'); ?>vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- iCheck -->
  <link href="<?= base_url('assets/'); ?>vendors/iCheck/skins/flat/green.css" rel="stylesheet">
  <!-- Datatables -->
  <link href="<?= base_url('assets/'); ?>vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
  <link href="<?= base_url('assets/'); ?>vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
  <!-- Custom Theme Style -->
  <link href="<?= base_url('assets/'); ?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-empire"></i> <span>SILAB FTK</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="<?= base_url('assets/') ?>img/Undiksha.png" alt="..." class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span><?= $akun['jabatan']; ?></span>
              <h2><?= $akun['nama']; ?></h2>
            </div>
            <div class="clearfix"></div>
          </div>
          <!-- /menu profile quick info -->

          <br />

          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <ul class="nav side-menu">
                <li><a href="<?= site_url('admin') ?>"><i class="fa fa-home"></i>Dashboard </a></li>
                <?php if ($this->session->userdata('jabatan') == "Kepala Laboran") { ?>
                  <li><a href="<?= site_url('admin/data_user'); ?>"><i class="fa fa-user"></i>Data User</a></li>
                  <li><a href="<?= site_url('admin/data_lokasi'); ?>"><i class="fa fa-location-arrow"></i>Data Lokasi</a></li>
                  <li><a href="<?= site_url('admin/data_prodi'); ?>"><i class="fa fa-database"></i>Data Prodi</a></li>
                  <li><a href="<?= site_url('admin/data_pelaporan'); ?>"><i class="fa fa-pencil"></i>Data Pelaporan</a></li>
                <?php } else { ?>
                  <li><a href="<?= site_url('admin/pelaporanLaboran'); ?>"><i class="fa fa-pencil"></i>Data Pelaporan</a></li>
                <?php } ?>
                <li><a href="<?= site_url('admin/data_aset'); ?>"><i class="fa fa-cubes"></i>Data Aset</a></li>
                <br>

              </ul>
            </div>
          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="fa fa-gears" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="fa fa-arrows-alt" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="fa fa-eye-slash" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="<?= base_url('auth/logout') ?>">
              <span class="fa fa-sign-out" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
          </div>
          <nav class="nav navbar-nav">
            <ul class=" navbar-right">
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      <div class="right_col" role="main">
        <div class="">
          <?php $this->load->view($content); ?>
        </div>
      </div>
      <!-- /page content -->


      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Edy Krisnawan - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="<?= base_url('assets/'); ?>vendors/jquery/dist/jquery.min.js"></script>
  <!-- Bootstrap -->
  <script src="<?= base_url('assets/'); ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- FastClick -->
  <script src="<?= base_url('assets/'); ?>vendors/fastclick/lib/fastclick.js"></script>
  <!-- NProgress -->
  <script src="<?= base_url('assets/'); ?>vendors/nprogress/nprogress.js"></script>
  <!-- iCheck -->
  <script src="<?= base_url('assets/'); ?>vendors/iCheck/icheck.min.js"></script>
  <!-- Datatables -->
  <script src="<?= base_url('assets/'); ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/jszip/dist/jszip.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/pdfmake/build/pdfmake.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendors/pdfmake/build/vfs_fonts.js"></script>
  <!-- Custom Theme Scripts -->
  <script src="<?= base_url('assets/'); ?>build/js/custom.min.js"></script>
  <!-- <script src="<?= base_url('assets/'); ?>build/js/dist/script.js"></script> -->
  <script>
    $('.tombolTambahPelaporan').on('click', function() {

      $('#judulModal').html('Input Data');
      $('.modal-footer button[type=submit]').html('Tambah Data');

      $('#id').val('');
      // $('#id_pelaporan').val('');
      $('#nama_barang').val(1);
      $('#deskripsi').val('');
      $('#status').val('');
      $('#tanggapan').val('');

    });

    $('.modalUbahPelaporan').on('click', function() {

      $('#judulModal').html('Update Data');
      $('.modal-footer button[type=submit]').html('Ubah Data');
      $('.modal-body form').attr('action', 'http://localhost/SiLab/Admin/saveUpdate_pelaporan');

      const id = $(this).data('id');

      $.ajax({
        url: 'http://localhost/SiLab/Admin/update_pelaporan',
        data: {
          id: id
        },
        method: 'post',
        dataType: 'json',
        success: function(data) {
          $('#id').val(data.id_pelaporan);
          $('#nama_barang').val(data.kode_aset);
          $('#deskripsi').val(data.deskripsi_laporan);
          $('#status').val(data.status);
          $('#tanggapan').val(data.tanggapan);
        }
      });

    });

    $('.modalUbahTanggapan').on('click', function() {

      $('#judulModal').html('Tanggapan');
      $('.modal-footer button[type=submit]').html('Tanggapi');
      $('.modal-body form').attr('action', 'http://localhost/SiLab/Admin/saveUpdate_tanggapan');

      const id = $(this).data('id');

      $.ajax({
        url: 'http://localhost/SiLab/Admin/update_tanggapan',
        data: {
          id: id
        },
        method: 'post',
        dataType: 'json',
        success: function(data) {
          $('#id_tanggapan').val(data.id_pelaporan);
          $('#tanggapan').val(data.tanggapan);
        }
      });

    });
    // AJAX USER
    $('.tombolTambahUser').on('click', function() {

      $('#judulModal').html('Input Data User');
      $('.modal-footer button[type=submit]').html('Tambah Data');

      $('#id').val('');
      $('#nama').val('');
      $('#jabatan').val('');
      $('#old_pass').val('');
      $('#password').val('');

    });

    $('.modalUbahUser').on('click', function() {

      $('#judulModal').html('Update Data User');
      $('.modal-footer button[type=submit]').html('Ubah Data');
      $('.modal-body form').attr('action', 'http://localhost/SiLab/Admin/saveUpdate_user');

      const id = $(this).data('id');

      $.ajax({
        url: 'http://localhost/SiLab/Admin/update_user',
        data: {
          id: id
        },
        method: 'post',
        dataType: 'json',
        success: function(data) {
          $('#id').val(data.id_user);
          $('#nama').val(data.nama);
          $('#jabatan').val(data.jabatan);
          $('#old_pass').val(data.password);
          $('#password').val(data.password);
          if (data.jabatan == "Kepala Laboran") {
            document.getElementById("kepalaLaboran").checked = true;
          } else {
            document.getElementById("laboran").checked = true;
          }
        }
      });

    });
    // END AJAX USER
  </script>
</body>

</html>