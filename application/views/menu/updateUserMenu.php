 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



     <div class="row">
         <div class="col-lg">

             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'menu/newUpdateMenu'; ?>" method="post">

                         <div class="form-group">
                             <input type="hidden" name="id" class="form-control" value="<?= $usermenu->id ?>">
                             <label for="">Menu</label>
                             <input type="text" name="menu" class="form-control" value="<?= $usermenu->menu ?>">
                         </div>
                         <button type="submit" class="btn btn-primary">Update</button>

                         <button type="reset" class="btn btn-danger" onclick="Cancel('cancel');">Cancel</button>


                     </form>
                 </section>
             </div>

         </div>
     </div>

 </div>
 <!-- /.container-fluid -->