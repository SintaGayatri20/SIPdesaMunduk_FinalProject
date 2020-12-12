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

                <a href="" class="btn btn-dark mb-3" data-toggle="modal" data-target="#newSubMenuModal">Tambah Data Guide</a>
                <div class="btn-group mb-3" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Export
                    </button>
                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="<?= base_url('menu/pdf_aset') ?>">Export to PDF</a>
                        <a class="dropdown-item" href="<?= base_url('menu/excel_aset') ?>">Export to Excel</a>
                    </div>
                </div>



                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Data Guide</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Guide</th>
                                        <th>Nomor HP</th>
                                        <th>Email</th>
                                        <th>Guide Rate</th>
                                        <th>Status</th>
                                        <th>Foto Profile Guide</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <?php foreach ($guide as $g) : ?>
                                    <tr>
                                        <?php $status = $g['status'];;
                                        if ($status == 0) {
                                            $sts = 'Not Available';
                                        } else {
                                            $sts = 'Available';
                                        }

                                        ?>
                                        <td scope="row"><?= $i; ?></td>
                                        <td><?= $g['nama_guide']; ?></td>
                                        <td><?= $g['no_hp']; ?></td>
                                        <td><?= $g['email']; ?></td>
                                        <td><?= $g['guide_rate']; ?></td>
                                        <td><?= $sts; ?></td>
                                        <td><img src="<?php echo base_url() . 'assets/media/' . $g['foto_profile']; ?>" width="150" height="100"></td>
                                        <td>
                                            <a href="<?php echo base_url() . 'menu/editDataGuide/' . $g['id_guide']; ?>" class="text-success"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . 'menu/deleteDataGuide/' . $g['id_guide']; ?>" class="text-danger"><i class="far fa-trash-alt"></i></a>
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
                            <h5 class="modal-title" id="newSubMenuModalLabel">Tambah Data Aset Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('menu/dataGuide'); ?>" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="nama_guide" name="nama_guide" placeholder="Nama Guide">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="guide_rate" name="guide_rate" placeholder="Guide Rate">
                                </div>
                                <!-- <div class="form-group">
                                    <input type="text" class="form-control" id="status" name="status" placeholder="Status">
                                </div> -->
                                <div class="form-group">
                                    <input type="file" class="form-control" id="image" name="image" placeholder="Foto Profile Guide">
                                </div>
                                <div class="form-group">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="1" name="status" id="status">
                                        <label class="form-check-label" for="status">
                                            Active?
                                        </label>
                                    </div>
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