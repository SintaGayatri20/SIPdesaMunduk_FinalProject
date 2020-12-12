 <!-- Begin Page Content -->
 <div class="container-fluid">

     <!-- Page Heading -->
     <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>



     <div class="row">
         <div class="col-lg">

             <div class="content-wrapper">
                 <section class="content">
                     <form action="<?php echo base_url() . 'menu/newUpdateSubMenu'; ?>" method="post">

                         <div class="form-group">
                             <input type="hidden" name="id_s" class="form-control" value="<?= $subMenu->id ?>">
                             <select name="menu_id" id="form-control" class="form-control">

                                 <?php foreach ($userMenu as $um) :

                                        $idSM = $subMenu->menu_id;
                                        $idUM = $um->menu_id;
                                        if ($idSM == $idUM) {
                                    ?>

                                     <?php } ?>

                                     <option value=<?php echo $um->id ?>><?php echo $um->menu ?></option>

                                 <?php endforeach; ?>


                             </select>
                         </div>
                         <div class="form-group">
                             <label for="">Title</label>
                             <input type="text" name="title" class="form-control" value="<?= $subMenu->title ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Url</label>
                             <input type="text" name="url" class="form-control" value="<?= $subMenu->url ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Icon</label>
                             <input type="text" name="icon" class="form-control" value="<?= $subMenu->icon ?>">
                         </div>
                         <div class="form-group">
                             <label for="">Is Active</label>
                             <input type="text" name="is_active" class="form-control" value="<?= $subMenu->is_active ?>">
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