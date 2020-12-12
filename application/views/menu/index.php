            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



                <div class="row">
                    <div class="col-lg-6">

                        <?= form_error('menu', '<div class="alert alert-danger" role="alert">Enter your menu!</div>'); ?>

                        <?= $this->session->flashdata('message'); ?>

                        <a href="" class="btn btn-secondary mb-3" data-toggle="modal" data-target="#newMenuModal">Tambah Menu Baru</a>

                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nomor</th>
                                    <th scope="col">Menu</th>
                                    <th scope="col">Edit</th>
                                    <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($menu as $m) : ?>
                                    <tr>
                                        <th scope="row"><?= $i; ?></th>
                                        <td><?= $m['menu']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url() . 'menu/updateUserMenu/' . $m['id']; ?>" class="text-success"><i class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url() . 'menu/deleteuserMenu/' . $m['id']; ?>" class="text-danger"><i class="far fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!--MODAL-->

            <!-- Modal -->
            <div class="modal fade" id="newMenuModal" tabindex="-1" role="dialog" aria-labelledby="newMenuModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newMenuModalLabel">Tambah Menu Baru</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="<?= base_url('menu'); ?>" method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="menu" name="menu" placeholder="Menu name">
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