 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="row">
         <div class="col-lg">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'menu/newEditDataTPS'; ?>" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                             <input type="hidden" name="id_tps" class="form-control" value="<?= $newdataTPS->id_tps ?>">
                             <select name="id_kategori" id="form-control" class="form-control">
                                 <?php foreach ($newKategori as $dk) :
                                        $idTPS = $newdataTPS->id_kategori;
                                        $idk = $dk->kategori;
                                        if ($idTPS == $idk) {
                                    ?>
                                     <?php } ?>
                                     <option value=<?php echo $dk->id_kategori ?>><?php echo $dk->kategori ?></option>
                                 <?php endforeach; ?>
                             </select>
                         </div>
                         <div class="form-group">
                             <label for="">Tarif</label>
                             <input type="text" name="tarif" class="form-control" value="<?= $newdataTPS->tarif ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Keterangan</label>
                             <input type="text" name="keterangan" class="form-control" value="<?= $newdataTPS->keterangan ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Tanggal Upload</label>
                             <input type="date" name="tgl_upload" class="form-control" value="<?= $newdataTPS->tgl_upload ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Lokasi</label>
                             <input type="text" name="lokasi" class="form-control" value="<?= $newdataTPS->lokasi ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Link Berita</label>
                             <input type="text" name="link_berita" class="form-control" value="<?= $newdataTPS->link_berita ?>">
                         </div>
                         <div class="form-group">
                             <input type="hidden" name="gambar" class="form-control" value="<?php echo $newdataTPS->foto ?>">
                             <label for="">Foto</label>
                             <input type="file" name="image" class="form-control" value="<?= $newdataTPS->foto ?>">
                         </div>
                         <input type="submit" class="btn btn-primary" value="Update" />
                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>
                     </form>
                 </section>
             </div>
         </div>
     </div>

 </div>
 <!-- /.container-fluid -->