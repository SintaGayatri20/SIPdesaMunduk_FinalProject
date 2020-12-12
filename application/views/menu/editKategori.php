 <!-- Begin Page Content -->
 <div class="container-fluid">
     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
     <div class="row">
         <div class="col-lg">
             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'menu/newEditKategori'; ?>" method="post" enctype="multipart/form-data">
                         <div class="form-group">
                             <input type="hidden" name="id_kategori" class="form-control" value="<?= $datakategori->id_kategori ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Kategori</label>
                             <input type="text" name="kategori" class="form-control" value="<?= $datakategori->kategori ?>">
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