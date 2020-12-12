 <footer>
     <!-- Footer Start-->
     <div class="footer-area footer-padding footer-bg" data-background="<?= base_url('vendor/'); ?>assets/img/service/footer_bg.jpg">
         <div class="container">
             <div class="row d-flex justify-content-between">
                 <div class="col-xl-3 col-lg-3 col-md-5 col-sm-6">
                     <div class="single-footer-caption mb-50">
                         <div class="single-footer-caption mb-30">
                             <div class="footer-tittle">
                                 <div class="footer-pera">
                                     <p>Difficult to be happy, life to wander, having some knowledge. Wanna be better from he or she, who knows? for now, just can do some easy activity.</p>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-2 col-lg-3 col-md-3 col-sm-5">
                     <div class="single-footer-caption mb-50">
                         <div class="footer-tittle">
                             <h4>Quick Links</h4>
                             <ul>
                                 <li><a href="<?= base_url('aboutUs/userLoginAbout') ?>">About</a></li>
                                 <li><a href="<?= base_url('kontak/userLoginKontak') ?>"> Contact Us</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-3 col-lg-3 col-md-4 col-sm-7">
                     <div class="single-footer-caption mb-50">
                         <div class="footer-tittle">
                             <h4>Our Social Media</h4>
                             <ul>
                                 <li><a href="#">Instagram</a></li>
                                 <li><a href="#">Facebook</a></li>
                                 <li><a href="#">Twitter</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-3 col-lg-3 col-md-5 col-sm-7">
                     <div class="single-footer-caption mb-50">
                         <div class="footer-tittle">
                             <h4>Contact Person</h4>
                             <ul>
                                 <li><a href="#">WhatsApp</a></li>
                             </ul>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- Footer bottom -->
         <div class="row pt-padding">
             <div class="col-xl-7 col-lg-7 col-md-7">
                 <div class="footer-copy-right">
                     <p>
                         Copyright &copy;2020 Buleleng, Bali
                     </p>
                 </div>
             </div>
             <div class="col-xl-5 col-lg-5 col-md-5">
                 <!-- social -->
                 <div class="footer-social f-right">
                     <a href="#"><i class="fab fa-twitter"></i></a>
                     <a href="#"><i class="fab fa-facebook-f"></i></a>
                     <a href="#"><i class="fab fa-behance"></i></a>
                     <a href="#"><i class="fas fa-globe"></i></a>
                 </div>
             </div>
         </div>
     </div>
     </div>
     <!-- Footer End-->
 </footer>

 <!-- JS here -->

 <!-- All JS Custom Plugins Link Here here -->


 <!-- Jquery, Popper, Bootstrap -->
 <script src="<?= base_url('vendor/'); ?>assets/js/vendor/jquery-1.12.4.min.js"></script>
 <script src="<?= base_url('vendor/'); ?>assets/js/popper.min.js"></script>
 <script src="<?= base_url('vendor/'); ?>assets/js/bootstrap.min.js"></script>
 <!-- Jquery Mobile Menu -->
 <script src="<?= base_url('vendor/'); ?>assets/js/jquery.slicknav.min.js"></script>

 <!-- Jquery Slick , Owl-Carousel Plugins -->
 <script src="<?= base_url('vendor/'); ?>assets/js/owl.carousel.min.js"></script>
 <script src="<?= base_url('vendor/'); ?>assets/js/slick.min.js"></script>
 <!-- One Page, Animated-HeadLin -->
 <script src="<?= base_url('vendor/'); ?>assets/js/wow.min.js"></script>
 <script src="<?= base_url('vendor/'); ?>assets/js/animated.headline.js"></script>
 <script src="<?= base_url('vendor/'); ?>assets/js/jquery.magnific-popup.js"></script>

 <!-- Scrollup, nice-select, sticky -->
 <script src="<?= base_url('vendor/'); ?>assets/js/jquery.scrollUp.min.js"></script>
 <script src="<?= base_url('vendor/'); ?>assets/js/jquery.nice-select.min.js"></script>
 <script src="<?= base_url('vendor/'); ?>assets/js/jquery.sticky.js"></script>

 <!-- contact js -->
 <script src="<?= base_url('vendor/'); ?>assets/js/contact.js"></script>
 <script src="<?= base_url('vendor/'); ?>assets/js/jquery.form.js"></script>
 <script src="<?= base_url('vendor/'); ?>assets/js/jquery.validate.min.js"></script>
 <script src="<?= base_url('vendor/'); ?>assets/js/mail-script.js"></script>
 <script src="<?= base_url('vendor/'); ?>assets/js/jquery.ajaxchimp.min.js"></script>

 <!-- Jquery Plugins, main Jquery -->
 <script src="<?= base_url('vendor/'); ?>assets/js/plugins.js"></script>
 <script src="<?= base_url('vendor/'); ?>assets/js/main.js"></script>

 <script>
     $(document).ready(function() {
         $(".tampil").hide();
         $(".guide").hide();
         $("p").click(function() {
             $(this).hide();
         });

         $("#tes").click(function() {
             //$(this).hide();
         });

         $(".y").click(function() {
             $(".tampil").show();
         });

         $(".n").click(function() {
             $(".tampil").hide();
         });

         $("#sg").click(function() {
             $(".guide").show();
         });

         $("#hg").click(function() {
             $(".guide").hide();
         });


         $("#jp").keyup(function() {
             var harga = <?= $dtTrs->tarif ?>;
             var jp = $("#jp").val();
             var total = parseInt(harga) * parseInt(jp);
             $("#total").val(total);


         });

     });
 </script>

 </body>

 </html>