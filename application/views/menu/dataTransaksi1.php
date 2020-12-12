            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800"><?= $title; ?></h1>

                <div class="btn-group mb-3" role="group">
                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <h6 class="m-0 font-weight-bold text-primary">Data Transaksi</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Nomor</th>
                                        <th>Nama Tempat Wisata</th>
                                        <th>Nama Guide</th>
                                        <th>Jumlah Pengunjung</th>
                                        <th>Total Harga</th>
                                        <th>Tanggal Kunjungan</th>
                                        <th>Satus Alergi</th>
                                        <th>Status Makanan</th>
                                        <th>Verifikasi</th>
                                        <th>Finish</th>
                                        <!-- <th>Detail</th> -->
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <?php foreach ($dataTransaksi as $dt) : ?>
                                    <tr>
                                        <td scope="row"><?= $i; ?></td>
                                        <td><?= $dt['nama_guide']; ?></td>
                                        <td><?= $dt['keterangan']; ?></td>
                                        <td><?= $dt['jml_pengunjung']; ?></td>
                                        <td><?= $dt['total_harga']; ?></td>
                                        <td><?= $dt['tgl_kunjungan']; ?></td>
                                        <td><?= $dt['satus_alergi']; ?></td>
                                        <td><?= $dt['status_makanan']; ?></td>
                                        <?php
                                            $verify = $dt['verifikasi'];
                                            $finish = $dt['finish'];

                                            if($verify == 1){

                                                $ver1 = 'success';
                                                $ver2 =  'Verified';
                                            }else{
                                                $ver1 = 'warning';
                                                $ver2 =  'Waiting Verify';
                                            }

                                            if($finish == 1){
                                                $fin1 = 'success';
                                                $fin2 = 'Finished';
                                            }else{
                                                $fin1 = 'warning';
                                                $fin2 = 'Unfinished';
                                            }

                                        ?>
                                        <td><a href="updateVerify/<?php echo $dt['id_transaksi'];  ?>" class="badge badge-<?php echo $ver1; ?>"><?php echo $ver2; ?></a></td>
                                        <td><a href="updateFinished/<?php echo $dt['id_transaksi'];  ?>" class="badge badge-<?php echo $fin1; ?>"><?php echo $fin2; ?></a></td>
                                        <!-- <td>
                                            <?php echo anchor('menu/detailTransaksi' . $dt['id_transaksi'], '<div class="btn btn-sm btn-success">Detail</div>') ?>
                                        </td> -->
                                        <td>
                                            <a href="<?php echo base_url() . 'menu/deleteDataTransaksi/' . $dt['id_transaksi']; ?>" class="text-danger"><i class="far fa-trash-alt"></i></a>
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