<article class="blog-single">

    <!-- page header/blog hero
    ================================================== -->
    <div class="page-header page-header--single page-hero" style="background-image:url(<?php echo base_url(); ?>template/hola-master/images/<?php echo $berita['tulisan_gambar']; ?>)">
    
        <div class="row page-header__content narrow">
            <article class="col-full">
                <div class="page-header__info">
                    <div class="page-header__cat">
                        <a href="#0"><?php echo $berita['tulisan_kategori_nama']; ?></a>
                    </div>
                </div>
                <h1 class="page-header__title">
                    <a href="#0" title="">
                        <?php echo $berita['tulisan_judul']; ?>
                    </a>
                </h1>
                <ul class="page-header__meta">
                    <li class="date"><?php echo date('F d, Y',strtotime($berita['tulisan_tanggal'])); ?></li>
                    <li class="author">
                        By
                        <span><?php echo $berita['tulisan_author']; ?></span>
                    </li>
                </ul>
                
            </article>
        </div>

    </div> <!-- end page-header -->

    <div class="row blog-content">
        <div class="col-full blog-content__main">

            <?php echo $berita['tulisan_isi']; ?>

            <p class="blog-content__tags">
                <span>Post Tags</span>

                <span class="blog-content__tag-list">
                    <a href="#0">
                		<?php echo $berita['tulisan_kategori_nama']; ?>
                	</a>
                </span>

            </p>

            <div class="blog-content__pagenav">
                <div class="blog-content__nav">
                    <div class="blog-content__prev">
                        <a href="#0" rel="prev">
                            <span>Previous Post</span>
                            Tips on Minimalist Design 
                        </a>
                    </div>
                    <div class="blog-content__next">
                        <a href="#0" rel="next">
                            <span>Next Post</span>
                            Less Is More 
                        </a>
                    </div>
                </div>

                <div class="blog-content__all">
                    <a href="<?php echo base_url('welcome/semua_berita'); ?>" class="btn btn--primary">
                        View All Post
                    </a>
                </div>
            </div>

        </div><!-- end blog-content__main -->
    </div> <!-- end blog-content -->

</article>
