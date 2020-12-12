<div class="row">
    <div class="col-lg">


        <div class="content-wrapper">
            <section class="content">
                <div class="row justify-content-center mt-10">
                    <div class="col-md-10">
                        <form action="<?php echo base_url() . 'user/insertTrans'; ?>" method="post">

                            <div class="form-group">
                                <label for="">Nama Lokasi</label>
                                <input type="hidden" name="id_tps" class="form-control" value="<?= $dtTrs->id_tps; ?>">
                                <input type="text" name="title" class="form-control" value="<?= $dtTrs->keterangan; ?>">
                            </div>
                            <input type="hidden" name="user_id" id="user_id" class="form-control" value="<?php echo $this->session->userdata('user_id'); ?>">

                            <div class="form-group">
                                <label for="">Jumlah Pengunjung</label>
                                <input type="text" name="jp" id="jp" class="form-control" value="">
                            </div>

                            <div class="form-group">
                                <label for="">Total Harga</label>
                                <input type="text" name="total" id="total" class="form-control" value="">
                            </div>

                            <div class="form-group">
                                <label for="">Tanggal Kunjungan</label>
                                <input type="date" name="tgl_kunjungan" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label for="">Kecendrungan Alergi</label>
                                <div class="y"><input type='radio' name='alergi' value='1' /> Yas</div>
                                <div class="n"><input type='radio' name='alergi' value='Tidak ada riwayar alergi' checked='checked' value='Tidak ada riwayar alergi' /> No</div>
                            </div>
                            <div class="tampil"><input type="text" name="alergi2" class="form-control" value=""></div>
                            <div class="form-group">
                                <label for="">Makanan</label>
                                <div class="v"><input type='radio' name='makanan' value='Vegetarian' /> Vagetarian</div>
                                <div class="nv"><input type='radio' name='makanan' checked='checked' value='Non Vegetarian' /> Non Vagetarian</div>
                            </div>
                            <div class="form-group">
                                <span class="badge badge-success" id="sg">Show Guide</span>
                                <span class="badge badge-success" id="hg">Hide Guide</span>

                                <div class="guide">
                                    <br>

                                    <table class="table table-striped" border="0" cellspacing="0" cellspading="0">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Guide</th>
                                            <th>Email</th>
                                            <th>Guide Rate</th>
                                            <th>Foto</th>
                                            <th>Status</th>
                                            <th>Pilih</th>
                                        </tr>

                                        <tbody>
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
                                                    <th scope="row"><?= $i; ?></th>
                                                    <td><?= $g['nama_guide']; ?></td>
                                                    <td><?= $g['email']; ?></td>
                                                    <td><input type="text" name="g_rate" id="jp" class="form-control" value="<?= $g['guide_rate']; ?>" readonly></td>
                                                    <td><img src="<?php echo base_url('assets/img/' . $g['foto_profile']) ?>" height="60" width="60" /></td>
                                                    <td><?= $sts; ?></td>
                                                    <td>
                                                        <div class="n"><input type='radio' name='pilih_guide' value='<?= $g['id_guide']; ?>' /></div>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <input type="submit" class="btn btn-primary" value="Submit" />

                            <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                            <br>
                        </form>
                    </div>
                </div>
            </section>
        </div>

    </div>
</div>
<br>
<br>