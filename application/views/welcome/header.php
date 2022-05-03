<!DOCTYPE html>
<!--[if lt IE 9 ]><html class="no-js oldie" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Web Desa</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/hola-master/css/base.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/hola-master/css/vendor.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>template/hola-master/css/main.css">

    <!-- script
    ================================================== -->
    <script src="<?php echo base_url(); ?>template/hola-master/js/modernizr.js"></script>
    <script src="<?php echo base_url(); ?>template/hola-master/js/pace.min.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>template/hola-master/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?php echo base_url(); ?>template/hola-master/favicon.ico" type="image/x-icon">

</head>

<body id="top">

    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="header-logo">
            <a class="site-logo" href="<?php echo base_url(); ?>" style="color:white;">NAMA DESA</a>
        </div>

        <nav class="header-nav-wrap">
            <ul class="header-nav">
                <li class="current"><a href="<?php echo base_url(); ?>#home" title="home">Home</a></li>
                <li><a href="<?php echo base_url(); ?>#about" title="about">Profil</a></li>
                <li><a href="<?php echo base_url('welcome/semua_pengumuman'); ?>">Pengumuman</a></li>
                <li><a href="<?php echo base_url('welcome/semua_agenda'); ?>">Agenda</a></li>
                <li><a href="<?php echo base_url(); ?>#works" title="works">Galeri</a></li>
                <li><a href="<?php echo base_url('welcome/semua_berita'); ?>">Berita</a></li>
                <li><a href="<?php echo base_url(); ?>#contact" title="contact">Contact</a></li>
            </ul>
        </nav>

        <a class="header-menu-toggle" href="#0"><span>Menu</span></a>

    </header> <!-- end s-header -->

