            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?= validation_errors(); ?>
                    </div>
                <?php endif; ?>


                <?= $this->session->flashdata('message'); ?>

                <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Data Tempat Wisata</a>
                <div class="btn-group mb-3" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Export
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="<?= base_url('menu/pdf_tempatWisata') ?>">Export to PDF</a>
                        <a class="dropdown-item" href="<?= base_url('menu/excel_aset') ?>">Export to Excel</a>
                    </div>
                </div>



                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Tempat Wisata</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Kategori</th>
                                        <th>Tarif</th>
                                        <th>Keterangan</th>
                                        <th>Tanggal Upload</th>
                                        <th>Lokasi</th>
                                        <th>Link Berita</th>
                                        <th>Foto</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <?php foreach ($dataTPS as $dtps) : ?>
                                    <tr>
                                        <td scope="row"><?= $i; ?></td>
                                        <td><?= $dtps['kategori']; ?></td>
                                        <td><?= $dtps['tarif']; ?></td>
                                        <td><?= $dtps['keterangan']; ?></td>
                                        <td><?= $dtps['tgl_upload']; ?></td>
                                        <td><?= $dtps['lokasi']; ?></td>
                                        <td><?= $dtps['link_berita']; ?></td>
                                        <td><img src="<?php echo base_url() . 'assets/media/' . $dtps['foto']; ?>" width="150" height="100"></td>
                                        <td>
                                            <a href="<?php echo base_url() . 'menu/editDataTPS/' . $dtps['id_tps']; ?>" class="text-success"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . 'menu/deleteDataTempatWisata/' . $dtps['id_tps']; ?>" class="text-danger"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Modal Tambah Data-->
            <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Tempat Wisata</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('menu/dataTempatWisata'); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <select name="id_kategori" id="id_kategori" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        <?php foreach ($kategori as $k) : ?>
                                            <option value="<?= $k['id_kategori']; ?>"><?= $k['kategori']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="tarif" name="tarif" placeholder="Tarif">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan">
                                </div>
                                <div class="form-group">
                                    <input type="date" class="form-control" id="tgl_upload" name="tgl_upload" placeholder="Tanggal Upload">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="link_berita" name="link_berita" placeholder="Link Berita">
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Foto">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">TUTUP</button>
                                <button type="submit" class="btn btn-success">TAMBAH</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>