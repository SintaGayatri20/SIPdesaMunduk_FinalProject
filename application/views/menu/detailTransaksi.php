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
                                        <th>Detail</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <?php $i = 1; ?>
                                <tr>
                                    <td scope="row"><?= $i; ?></td>
                                    <td><?= $dataTPS->keterangan ?></td>
                                    <td><?= $dataGuide->nama_guide ?></td>
                                    <td><?= $detailTransaksi->jml_pengunjung ?></td>
                                    <td><?= $detailTransaksi->total_harga ?></td>
                                    <td><?= $detailTransaksi->tgl_kunjungan ?></td>
                                    <td><?= $detailTransaksi->satus_alergi ?></td>
                                    <td><?= $detailTransaksi->status_makanan ?></td>
                                </tr>
                                <?php $i++; ?>
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