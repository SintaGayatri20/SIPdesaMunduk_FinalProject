<main>

    <!-- slider Area Start-->
    <div class="slider-area ">
        <!-- Mobile Menu -->
        <div class="slider-active">
            <div class="single-slider hero-overly  slider-height d-flex align-items-center" data-background="<?= base_url('vendor/'); ?>assets/img/hero/h1_hero.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-lg-9 col-md-9">
                            <div class="hero__caption">
                                <h1>Find your <span>Next tour!</span> </h1>
                                <p>Where would you like to go?</p>
                            </div>
                        </div>
                    </div>
                    <!-- Search Box -->
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Favourite Places Start -->
    <div class="favourite-place place-padding">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>FEATURED TOURS Packages</span>
                        <h2>Favourite Places</h2>
                    </div>
                </div>
            </div>


            <div class="row">
                <?php foreach ($tempatWisata as $tw) : ?>
                    <a href="<?= $tw['link_berita']; ?>">
                        <div class="col-xl-4 col-lg-4 col-md-6">
                            <div class="single-place mb-30">
                                <div class="place-img">
                                    <img src="<?php echo base_url('assets/media/' . $tw['foto']) ?>" width="150" height="300" alt="">
                                </div>
                                <div class="place-cap">
                                    <div class="place-cap-top">
                                        <h3><a href="#"><?= $tw['keterangan']; ?></a></h3>
                                        <p class="dolor"><?= $tw['tarif']; ?><span>/ Per Person</span></p>
                                    </div>
                                    <div class="place-cap-bottom">
                                        <ul>
                                            <li><i class="far fa-calendar"></i><?= $tw['tgl_upload']; ?></li>
                                            <li>
                                                <a href="<?= $tw['lokasi']; ?>">
                                                    <i style="color: red;" class="fas fa-map-marker-alt"></i>

                                                </a>Get Direction
                                            </li>
                                        </ul>
                                    </div>
                                    <br>
                                    <center><a href="<?= base_url('auth'); ?>" class="btn border-btn">Keep with guide</a></center>
                                </div>
                            </div>
                        </div>
                    </a>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <!-- Favourite Places End -->
    <!-- Video Start Arera -->
    <div class="video-area video-bg pt-200 pb-200" data-background="<?= base_url('vendor/'); ?>assets/img/service/video-bg.jpg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="video-caption text-center">
                        <div class="video-icon">
                            <a class="popup-video" href="https://www.youtube.com/watch?v=IGiL_6U6pxE" tabindex="0"><i class="fas fa-play"></i></a>
                        </div>
                        <p class="pera1">Love where you're going in the perfect time</p>
                        <p class="pera2">Trip is a World Leading Online</p>
                        <p class="pera3"> Travel of Places Meet People and Have Fun</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Start End -->
    <!-- Support Company Start-->
    <div class="support-company-area support-padding fix">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="support-location-img mb-50">
                        <img src="<?= base_url('vendor/'); ?>assets/img/service/support-img.jpg" alt="">
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="right-caption">
                        <!-- Section Tittle -->
                        <div class="section-tittle section-tittle2">
                            <span>About Munduk Village</span>
                            <h2>We are New Generation <br>Support Tourism Munduk Village</h2>
                        </div>
                        <div class="support-caption">
                            <p>Munduk Singaraja Village is a village that must be visited because of its beauty. This village is often dubbed the village above the clouds by visiting tourists.

                                Munduk Singaraja Village was just promoted as a tourist village by Nyoman Bagiarta, a former head of the Tourism Education and Training Center in Denpasar in 1990.
                                The main attraction of Munduk Village is its natural beauty, in this village there are coffee, tea and clove plantations.</p>
                            <div class="select-suport-items">
                                <label class="single-items">Found new places
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="single-items">Nice view
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="single-items">Instagrammable places
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label>
                                <!-- <label class="single-items">
                                    <input type="checkbox" checked="checked active">
                                    <span class="checkmark"></span>
                                </label> -->
                            </div>
                            <a href="<?= base_url('aboutUs') ?>" class="btn border-btn">About us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Support Company End-->
    <!-- Testimonial Start -->
    <!-- Testimonial Start -->
    <div class="testimonial-area testimonial-padding" data-background="<?= base_url('vendor/'); ?>assets/img/testmonial/testimonial_bg.jpg">
        <div class="container ">
            <div class="row d-flex justify-content-center">
                <div class="col-xl-11 col-lg-11 col-md-9">
                    <div class="h1-testimonial-active">
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <div class="testimonial-top-cap">
                                    <img src="<?= base_url('vendor/'); ?>assets/img/icon/testimonial.png" alt="">
                                    <p style="color: #fffc41;">Make your life first get your degree become who you want to be,
                                        travel of places meet people and have fun,
                                        then fall in love, there's plenty of time for that</p>
                                </div>
                            </div>
                        </div>
                        <!-- Single Testimonial -->
                        <div class="single-testimonial text-center">
                            <!-- Testimonial Content -->
                            <div class="testimonial-caption ">
                                <!-- founder -->
                                <div class="testimonial-founder d-flex align-items-center justify-content-center">
                                    <div class="founder-img">
                                        <img src="<?= base_url('vendor/'); ?>assets/img/testmonial/Homepage_testi.png" alt="">
                                    </div>
                                    <div class="founder-text">
                                        <span>Jessya Inn</span>
                                        <p>Co Founder</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->

</main>