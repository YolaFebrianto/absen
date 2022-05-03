   <!-- home
   ================================================== -->
   <section id="home" class="s-home page-hero target-section" data-parallax="scroll" data-image-src="<?php echo base_url(); ?>template/hola-master/images/HEADER IMAGE.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="overlay"></div>
        <div class="shadow-overlay"></div>

        <div class="home-content">

            <div class="row home-content__main">

<!--                 <h3>Hello There</h3>

                <h1>
                    I am Jonathan Doe. <br>
                    I am a graphic & UI/UX <br>
                    designer based in Somewhere.
                </h1> -->
<!-- 
                <div class="home-content__buttons">
                    <a href="#works" class="smoothscroll btn btn--stroke">
                        Galeri
                    </a>
                    <a href="#about" class="smoothscroll btn btn--stroke">
                        Pengumuman
                    </a>
                </div> -->

                <div class="home-content__scroll">
                    <a href="#about" class="scroll-link smoothscroll">
                        <span>Scroll Down</span>
                    </a>
                </div>

            </div>

        </div> <!-- end home-content -->

        <ul class="home-social">
            <li>
                <a href="#"><i class="im im-facebook" aria-hidden="true"></i><span>Facebook</span></a>
            </li>
            <li>
                <a href="#"><i class="im im-twitter" aria-hidden="true"></i><span>Twiiter</span></a>
            </li>
            <li>
                <a href="#"><i class="im im-instagram" aria-hidden="true"></i><span>Instagram</span></a>
            </li>
            <li>
                <a href="#"><i class="im im-behance" aria-hidden="true"></i><span>Behance</span></a>
            </li>
            <li>
                <a href="#"><i class="im im-pinterest" aria-hidden="true"></i><span>Pinterest</span></a>
            </li>
        </ul> 
        <!-- end home-social -->

    </section> <!-- end s-home -->


    <!-- about
    ================================================== -->
    <section id="about" class="s-about target-section">
        
        <div class="row narrow section-intro has-bottom-sep">
            <div class="col-full text-center">
                <h3>Sekilas Tentang Desa</h3>
                <h1>Profil Desa</h1>
                <p class="lead">INI DATA PROFIL DESA Lorem ipsum Dolor adipisicing nostrud et aute Excepteur amet commodo ea dolore irure esse Duis nulla sint fugiat cillum ullamco proident aliquip quis qui voluptate dolore veniam Ut laborum non est in officia.</p>
            </div>
        </div>

        <div class="row about-content">

            <div class="col-six tab-full left">
                <h3>POTENSI DESA</h3>

                <p>INI DATA POTENSI DETA. Lorem ipsum Ut eiusmod ex magna sit dolor esse adipisicing minim ad cupidatat eu veniam nostrud mollit laboris sunt magna velit culpa consectetur nostrud consectetur labore sed do.</p>

                <p>
                Lorem ipsum Nisi officia Duis irure voluptate dolor commodo pariatur occaecat aliquip adipisicing voluptate Ut in qui ea sint occaecat in commodo in in in incididunt ut sunt in Ut Duis in ut ex qui anim cupidatat cupidatat ex in non dolore labore ea amet cillum ea qui dolor nisi sed velit mollit exercitation ex fugiat labore in deserunt culpa laborum culpa anim dolore laboris amet irure mollit proident velit fugiat aute ea elit magna consequat qui officia quis elit Duis dolor esse cupidatat tempor proident voluptate aliqua ex cupidatat do eiusmod veniam irure laborum ut magna nostrud dolore ullamco commodo elit sit magna aliqua laborum veniam officia dolor.	
                </p>
            </div>

            <div class="col-six tab-full right">
                <h3>Sejarah Desa</h3>
                <p>INI DATA SEJARAH DESA. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </div>

        </div> <!-- end about-content -->

        <!-- <div class="row about-content about-content--buttons">

            <div class="col-six tab-full left">
                <a href="#0" class="btn btn--primary full-width">Download My CV</a>
            </div>
            <div class="col-six tab-full right">
                <a href="#0" class="btn full-width">Hire Me Now</a>
            </div>

        </div -->> <!-- end about-content buttons -->

        <div class="row about-content about-content--timeline" id="pengumuman">

            <div class="col-full text-center">
                <h3>Pengumuman & Agenda</h3>
            </div>

            <div class="col-six tab-full left">
                <div class="timeline">
                	<?php 
                		foreach($pengumuman->result() as $key => $value): 
                	?>
                    <div class="timeline__block">
                        <div class="timeline__bullet"></div>
                        <div class="timeline__header">
                            <p class="timeline__timeframe"><?php echo date('d-m-Y H:i:s',strtotime($value->pengumuman_tanggal)); ?></p>
                            <h3><?php echo $value->pengumuman_judul; ?></h3>
                            <h5><?php echo $value->pengumuman_author; ?></h5>
                        </div>
                        <div class="timeline__desc">
                            <p><?php echo $value->pengumuman_deskripsi; ?></p>
                        </div>
                    </div> <!-- end timeline__block -->
                	<?php
                		endforeach; 
                	?>
                </div> <!-- end timeline -->
            </div> <!-- end left -->

            <div class="col-six tab-full right">
                <div class="timeline">
                	<?php 
                		foreach($agenda->result() as $key => $value): 
                	?>
                    <div class="timeline__block">
                        <div class="timeline__bullet"></div>
                        <div class="timeline__header">
                            <p class="timeline__timeframe"><?php echo date('d-m-Y H:i:s',strtotime($value->agenda_tanggal)); ?></p>
                            <h3><?php echo $value->agenda_nama; ?></h3>
                            <h5><?php echo $value->agenda_author; ?></h5>
                        </div>
                        <div class="timeline__desc">
                            <p><?php echo $value->agenda_deskripsi; ?></p>
                        </div>
                    </div> <!-- end timeline__block -->
                	<?php
                		endforeach; 
                	?>
                </div> <!-- end timeline -->
            </div> <!-- end right -->

        </div> <!-- end about-content timeline -->

    </section> <!-- end about -->
    

    <!-- works
    ================================================== -->
    <section id="works" class="s-works target-section">

        <div class="row narrow section-intro has-bottom-sep">
            <div class="col-full">
                <h3>Galeri</h3>
                <h1>Galeri Kegiatan Desa</h1>
                
                <p class="lead">FOTO KEGIATAN DI DESA ... MULAI DARI KEGIATAN BERSIH DESA, KARANG TARUNA, DLL. Lorem ipsum Dolor adipisicing nostrud et aute Excepteur amet commodo ea dolore irure esse Duis nulla sint fugiat cillum ullamco proident aliquip quis qui voluptate dolore veniam Ut laborum non est in officia.</p>
            </div>
        </div>

        <div class="row masonry-wrap">
            <div class="masonry">
            	<?php foreach ($galeri->result() as $key => $value) : ?>
                <div class="masonry__brick">
                    <div class="item-folio">

                        <div class="item-folio__thumb">
                            <a href="<?php echo base_url(); ?>template/hola-master/images/<?php echo $value->galeri_gambar; ?>" class="thumb-link" title="The Beetle Car" data-size="1050x700">
                                <img src="<?php echo base_url(); ?>template/hola-master/images/<?php echo $value->galeri_gambar; ?>" 
                                     srcset="<?php echo base_url(); ?>template/hola-master/images/<?php echo $value->galeri_gambar; ?> 1x" alt="">
                                <span class="shadow-overlay"></span>
                            </a>
                        </div>

                        <div class="item-folio__text">
                            <h3 class="item-folio__title">
                                <?php echo $value->galeri_judul; ?>
                            </h3>
                            <p class="item-folio__cat">
                                <?php echo date('d-m-Y H:i:s',strtotime($value->galeri_tanggal)); ?>
                            </p>
                        </div>

                        <a href="#" class="item-folio__project-link" title="Project link">
                            <i class="im im-link"></i>
                        </a>

                        <div class="item-folio__caption">
                            <p><?php echo date('d-m-Y H:i:s',strtotime($value->galeri_tanggal)); ?></p>
                        </div>

                    </div> <!-- end item-folio -->
                </div> <!-- end masonry__brick -->
                <?php endforeach; ?>
            </div>
        </div> <!-- end masonry -->

    </section> <!-- end works -->



    <!-- testimonials
    ================================================== -->
    <!-- <div class="s-testimonials">

        <div class="overlay"></div>

        <div class="row testimonials-header">
            <div class="col-full">
                <h1 class="h02">What People Say.</h1>
            </div>
        </div>

        <div class="row testimonials">

            <div class="col-full testimonials__slider">

                <div class="testimonials__slide">
                    <img src="<?php echo base_url(); ?>template/hola-master/images/avatars/user-01.jpg" alt="Author image" class="testimonials__avatar">
                    <p>Qui ipsam temporibus quisquam velMaiores eos cumque distinctio nam accusantium ipsum. 
                    Laudantium quia consequatur molestias delectus culpa facere hic dolores aperiam. Accusantium quos qui praesentium corpori.</p>
                    <div class="testimonials__author h06">
                        Tim Cook
                        <span>CEO, Apple</span>
                    </div>
                </div>

                <div class="testimonials__slide">
                    <img src="<?php echo base_url(); ?>template/hola-master/images/avatars/user-05.jpg" alt="Author image" class="testimonials__avatar">
                    <p>Excepturi nam cupiditate culpa doloremque deleniti repellat. Veniam quos repellat voluptas animi adipisci.
                    Nisi eaque consequatur. Quasi voluptas eius distinctio. Atque eos maxime. Qui ipsam temporibus quisquam vel.</p>
                    <div class="testimonials__author h06">
                        Sundar Pichai
                        <span>CEO, Google</span>
                    </div>
                </div>

                <div class="testimonials__slide">
                    <img src="<?php echo base_url(); ?>template/hola-master/images/avatars/user-02.jpg" alt="Author image" class="testimonials__avatar">
                    <p>Repellat dignissimos libero. Qui sed at corrupti expedita voluptas odit. Nihil ea quia nesciunt. Ducimus aut sed ipsam.  
                    Autem eaque officia cum exercitationem sunt voluptatum accusamus. Quasi voluptas eius distinctio.</p>
                    <div class="testimonials__author h06">
                        Satya Nadella
                        <span>CEO, Microsoft</span>
                    </div>
                </div>
                
            </div> 

        </div> 
    </div>  -->
    <!-- end s-testimonials -->


    <!-- blog
    ================================================== -->
    <section id="blog" class="s-blog target-section">

        <div class="row narrow section-intro has-bottom-sep">
            <div class="col-full">
                <h3>Berita</h3>
                <h1>Berita Terbaru.</h1>
                <p class="lead">Berisi berita terbaru seputar Desa</p>
            </div>
        </div>

        <div class="row blog-content">
            <div class="col-full">

                <div class="blog-list block-1-2 block-tab-full">
                	<?php foreach($berita->result() as $key=>$value): ?>
                    <article class="col-block">
                                
                        <div class="blog-date">
                            <a href="<?php echo base_url('welcome/detail_berita/'.$value->tulisan_id); ?>"><?php echo date('F d, Y',strtotime($value->tulisan_tanggal)); ?></a>
                        </div>  
                        
                        <h2 class="h01"><a href="<?php echo base_url('welcome/detail_berita/'.$value->tulisan_id); ?>"><?php echo $value->tulisan_judul; ?></a></h2>
                        <p>
                        <?php echo substr(strip_tags($value->tulisan_isi),0,200).'...'; ?>
                        </p>

                        <div class="blog-cat">
                                <a href="<?php echo base_url('welcome/detail_berita/'.$value->tulisan_id) ?>"><?php echo $value->tulisan_kategori_nama; ?></a>
                        </div>

                        
                    </article>
               		<?php endforeach; ?>
                </div> <!-- end blog-list -->

            </div> <!-- end col-full -->
        </div> <!-- end blog-content -->

    </section> <!-- end s-blog -->


    <!-- s-cta
    ================================================== -->
    <section class="s-cta">
        
        <div class="row narrow cta">

            <div class="col-full cta__content">

                <h2 class="h01"><a href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT">SEKILAS TENTANG WEB DESA</a></h2>

                <p class="lead">
                Looking for an awesome and reliable webhosting? Try <a href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT">DreamHost</a>.
                Get <span>$50 off</span> when you sign up with the promocode <span>styleshout</span>.
                </p>

                <!-- <div class="cta__action">
                    <a class="btn btn--primary btn--large" href="http://www.dreamhost.com/r.cgi?287326|STYLESHOUT">Sign Up Now</a>
                </div>	 -->

            </div>

        </div> <!-- end cta -->
        
    </section>


    <!-- s-stats
    ================================================== -->
    <section id="stats" class="s-stats">
        <div class="row block-1-4 block-tab-1-2 block-mob-full stats">

            <div class="col-block stats__col ">
                <div class="stats__count">
                    <?php echo $jml_agenda; ?>
                </div>
                <h4>Agenda</h4>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count">
                    <?php echo $jml_pengumuman; ?>
                </div>
                <h4>Pengumuman</h4>
            </div>
            <div class="col-block stats__col stats__col--highlight">
                <div class="stats__upsign">
                    <a href="#"><i class="im im-arrow-up" aria-hidden="true"></i></a>
                </div>
                <div class="stats__count">
                    <?php echo $jml_berita; ?>
                </div>
                <h4>Berita</h4>
            </div>
            <div class="col-block stats__col">
                <div class="stats__count">
                    <?php echo $jml_galeri; ?>
                </div>
                <h4>Galeri Kegiatan</h4> 
            </div>

        </div>
    </section> <!-- end s-stats -->


    <!-- s-stats
    ================================================== -->
    <section id="contact" class="s-contact target-section">

        <div class="overlay"></div>

        <div class="row narrow section-intro">
            <div class="col-full">
                <h3>Contact</h3>
                <h1>Say Hello.</h1>
                
                <p class="lead">Lorem ipsum Dolor adipisicing nostrud et aute Excepteur amet commodo ea dolore irure esse Duis nulla sint fugiat cillum ullamco proident aliquip quis qui voluptate dolore veniam Ut laborum non est in officia.</p>
            </div>
        </div>

        <div class="row contact__main">
            <div class="col-eight tab-full contact__form">
                <form name="contactForm" id="contactForm" method="post" action="">
                    <fieldset>
    
                    <div class="form-field">
                        <input name="contactName" type="text" id="contactName" placeholder="Name" value="" minlength="2" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactEmail" type="email" id="contactEmail" placeholder="Email" value="" required="" aria-required="true" class="full-width">
                    </div>
                    <div class="form-field">
                        <input name="contactSubject" type="text" id="contactSubject" placeholder="Subject" value="" class="full-width">
                    </div>
                    <div class="form-field">
                        <textarea name="contactMessage" id="contactMessage" placeholder="message" rows="10" cols="50" required="" aria-required="true" class="full-width"></textarea>
                    </div>
                    <div class="form-field">
                        <button class="full-width btn--primary">Submit</button>
                        <div class="submit-loader">
                            <div class="text-loader">Sending...</div>
                            <div class="s-loader">
                                <div class="bounce1"></div>
                                <div class="bounce2"></div>
                                <div class="bounce3"></div>
                            </div>
                        </div>
                    </div>
    
                    </fieldset>
                </form>

                <!-- contact-warning -->
                <div class="message-warning">
                    Something went wrong. Please try again.
                </div> 
            
                <!-- contact-success -->
                <div class="message-success">
                    Your message was sent, thank you!<br>
                </div>
                        
            </div>
            <div class="col-four tab-full contact__infos">
                <h4 class="h06">Phone</h4>
                <p>Phone: (+63) 555 1212<br>
                Mobile: (+63) 555 0100<br>
                Fax: (+63) 555 0101
                </p>

                <h4 class="h06">Email</h4>
                <p>someone@holawebsite.com<br>
                info@holawebsite.com
                </p>

                <h4 class="h06">Address</h4>
                <p>
                1600 Amphitheatre Parkway<br>
                Mountain View, CA<br>
                94043 US
                </p>
            </div>

        </div>

    </section> <!-- end s-contact -->