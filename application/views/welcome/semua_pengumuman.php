<!-- page header
================================================== -->
<section class="page-header page-hero" style="background-image:url(<?php echo base_url(); ?>template/hola-master/images/blog/blog-bg-01.jpg)">

    <div class="row page-header__content">
        <article class="col-full">

            <div class="page-header__info">
                <div class="page-header__cat">
                    <a href="<?php echo base_url('welcome/detail_pengumuman/'.$pengumuman_header['pengumuman_id']) ?>"><?php echo $pengumuman_header['pengumuman_author']; ?></a>
                </div>
                <div class="page-header__date">
                    <?php echo date('F d, Y',strtotime($pengumuman_header['pengumuman_tanggal'])); ?>
                </div>
            </div>
            
            <h1 class="page-header__title">
                <a href="<?php echo base_url('welcome/detail_pengumuman/'.$pengumuman_header['pengumuman_id']) ?>" title="">
                    <?php echo $pengumuman_header['pengumuman_judul']; ?>
                </a>
            </h1>
            <p><?php echo substr(strip_tags($pengumuman_header['pengumuman_deskripsi']),0,100).'...'; ?></p>
            <p>
                <a href="<?php echo base_url('welcome/detail_pengumuman/'.$pengumuman_header['pengumuman_id']) ?>" class="btn btn--stroke page-header__btn">Read More</a>
            </p>
        </article>
    </div>

</section> <!-- end page-header -->


<!-- blog
================================================== -->
<section class="blog-content-wrap">

    <div class="row blog-content">
        <div class="col-full">

            <div class="blog-list block-1-2 block-tab-full">
            	<?php foreach ($pengumuman->result() as $key => $value) : ?>
                <article class="col-block">
                    
                    <div class="blog-date">
                        <a href="<?php echo base_url('welcome/detail_pengumuman/'.$value->pengumuman_id); ?>"><?php echo date('d-m-Y H:i:s',strtotime($value->pengumuman_tanggal)); ?></a>
                    </div>  
                    
                    <h2 class="h01"><a href="<?php echo base_url('welcome/detail_pengumuman/'.$value->pengumuman_id); ?>"><?php echo $value->pengumuman_judul; ?></a></h2>
                    <p>
                    <?php echo substr(strip_tags($value->pengumuman_deskripsi),0,100).'...'; ?>
                    </p>

                    <div class="blog-cat">
                        <a href="<?php echo base_url('welcome/detail_pengumuman/'.$value->pengumuman_id); ?>"><?php echo $value->pengumuman_author; ?></a>
                    </div>

                </article>
            	<?php endforeach; ?>
            </div> <!-- end blog-list -->

        </div> <!-- end col-full -->
    </div> <!-- end blog-content -->

<!--     <div class="row blog-entries-nav">
        <div class="col-full">
            <a href="#0" class="btn btn--stroke">
                <i class="im im-arrow-left"></i>
                Prev
            </a>
            <a href="#0" class="btn btn--stroke">
                Next
                <i class="im im-arrow-right"></i>
            </a>
        </div>
    </div>
 -->
</section> <!-- end blog-content-wrap -->

