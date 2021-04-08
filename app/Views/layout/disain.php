<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Beasiswa Stimulan Kerjasama NTB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Connect Multipurpose  Landing Page Template Template">
    <meta name="keywords" content="Connect HTML Template, Connect Landing Page Template,  Landing Page Template">
    <link href="<?= base_url('assets/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" media="all" />

    <link rel="icon" href="<?=base_url('assets/logo-bmb.png')?>" type="image/gif">

    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,600,700,800,900%7COpen+Sans:300,400,500"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('assets/css/animate.css') ?>"> <!-- Resource style -->
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.carousel.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/owl.theme.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/ionicons.min.css') ?>"> <!-- Resource style -->
    <link href="<?= base_url('assets/css/stylesheet.css') ?>" rel="stylesheet" type="text/css" media="all" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
        integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
</head>

<body class="boxed-layout">
    <div class="wrapper">
        <!-- Navbar Section -->
        <nav class="navbar navbar-expand-md navbar-light bg-light fixed-top wt-border">
            <div class="container">
                <a class="navbar-brand" href="#"> <i class="fa fa-graduation-cap" aria-hidden="true"></i>
                    <b>Beasiswa</b> <br> <span style="font-size:15px">Stimulan Kerjasama</span> </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/">Beranda</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/berita-kegiatan">Berita
                                dan Kegiatan</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/tata-cara">Tata Cara</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/kampus-kerjasama">Kampus
                                Kerjasama</a></li>
                        <li><a class="btn-nav js-scroll-trigger" href="/login" style="margin-right: 10px;">Login</a>
                        </li>
                        <li><a class="btn-nav js-scroll-trigger" href="https://www.beasiswantbdalamnegeri.org"> <i
                                    class="fas fa-undo    "></i> Back</a>
                        </li>

                    </ul>
                </div>
        </nav><!-- Navbar End -->

        <!-- ini isinya lur -->
        <?php $this->renderSection('content') ?>
        <!-- tutup isinya -->

        <!-- Jquery and Js Plugins -->
        <script src="<?= base_url('assets/js/jquery-2.1.1.js') ?>"></script>
        <script src="<?= base_url('assets/js/popper.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/jquery.validate.min.js') ?>"></script>
        <script src="<?= base_url('assets/js/plugins.js') ?>"></script>
        <script src="<?= base_url('assets/js/custom.js') ?>"></script>
</body>

</html>