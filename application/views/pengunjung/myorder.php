<div class="slider-area ">
    <!-- Mobile Menu -->
    <div class="single-slider slider-height2 d-flex align-items-center" data-background="<?= base_url('vendor/'); ?>assets/img/hero/contact_hero.png">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap text-center">
                        <h2>My Order</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card shadow mb-4">
               
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
                                        <th>Status</th>
                                    </tr>
                                </thead>
                               
                                <tbody>
                                <?php 
                                $no=1;
                                foreach($myorder as $m) : ?>
                                    <tr>
                                    <td><?php echo $no; ?></td>
                                    <td><?php echo $m['keterangan']; ?></td>
                                    <td><?php echo $m['nama_guide']; ?></td>
                                    <td><?php echo $m['jml_pengunjung']; ?></td>
                                    <td><?php echo $m['total_harga']; ?></td>
                                    <td><?php echo $m['tgl_kunjungan']; ?></td>
                                    <?php $verif =  $m['verifikasi'];
                                        if($verif==0){
                                            $sty = 'orange';
                                            $st = 'Menunggu Verifikasi';
                                        }else{
                                            $sty = 'green';
                                            $st = 'Sudah Terverifikasi';
                                        }
                                    
                                    ?>
                                    <td><a href="detailInvoice/<?php echo $m['id_transaksi'] ?>" class="badge" style="background-color:<?php echo $sty; ?>" id="sg"><?php echo $st; ?></a></td>
                                    </tr>
                                    <?php 
                                $no++;
                                endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>