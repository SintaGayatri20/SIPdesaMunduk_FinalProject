 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="row">
         <div class="col-lg">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'menu/newEditDataGuide'; ?>" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                             <input type="hidden" name="id_guide" class="form-control" value="<?= $dataGuide->id_guide ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Nama Guide</label>
                             <input type="text" name="nama_guide" class="form-control" value="<?= $dataGuide->nama_guide ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Nomor HP</label>
                             <input type="text" name="no_hp" class="form-control" value="<?= $dataGuide->no_hp ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Email</label>
                             <input type="text" name="email" class="form-control" value="<?= $dataGuide->email ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Guide Rate</label>
                             <input type="text" name="guide_rate" class="form-control" value="<?= $dataGuide->guide_rate ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Status</label>
                             <input type="text" name="status" class="form-control" value="<?= $dataGuide->status ?>">
                         </div>
                         <div class="form-group">
                             <input type="hidden" name="gambar" class="form-control" value="<?php echo $dataGuide->foto_profile ?>">
                             <label for="">Foto Profile Guide</label>
                             <input type="file" name="image" class="form-control" value="<?= $dataGuide->foto_profile ?>">
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