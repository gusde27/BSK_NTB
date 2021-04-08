<?php $this->extend('layout/disain'); ?>

<?php $this->section('content'); ?>

<?php 
  foreach($berita as $b) :
?>

<div id=" main" class="main">
    <div class="home">
        <div class="container">
            <div style="text-align: center;">
                <img class="img-fluid" src="<?= base_url('file/pt/foto_berita/' . $b['foto'] . ''); ?>" alt="Feature"
                    width="50%">
                <div class="ft-image wow animated" style="visibility: visible;">
                </div>
            </div>
        </div>
    </div>

    <div class="yd-stats">
        <div class="container-s">
            <div class="row text-center">
                <div class="col-sm-12">

                    <div class="intro">
                        <h4><?= explode(" ",$b['created_at'])[0] ?></h4>
                        <h2><?= $b['judul'] ?></h2>
                    </div>

                    <div class="cat-flex" style="margin: 20px 0px">
                        <p
                            style="white-space: pre-line; font-size: 1rem; line-height: 25px; text-indent: 30px; text-align: justify;">
                            <?= $b['deskripsi'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
  endforeach;
?>

    <!-- Footer -->
    <div class="footer">
        <div class="container">
            <div class="row text-center align-items-center">
                <div class="col-lg-4 col-md-3 col-sm-12">
                    <div class="footer-logo">
                        <h2><i class="fa fa-graduation-cap" aria-hidden="true"></i> <b>Beasiswa NTB</b> <br> <span
                                style="font-size:15px">Dalam Negeri</span></h2>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <ul class="footer-menu">
                        <li><a href="#main">B M B</a> </li>
                        <li><a href="#main">B S U</a> </li>
                        <li><a href="#main">B S K</a> </li>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-3 col-sm-12">
                    <div class="footer-links">
                        <ul>
                            <li><a href="#main" style="font-size:25px; color:#999"> <i
                                        class="fab fa-facebook-square"></i> </a> </li>
                            <li><a href="#main" style="font-size:25px; color:#999"> <i class=" fab fa-instagram "></i>
                                </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Scroll To Top -->
            <a id="back-top" class="back-to-top js-scroll-trigger" href="#main"></a>
            <!-- Scroll To Top Ends-->
        </div>
    </div>
</div> <!-- Main -->
</div><!-- Wrapper -->

<?php $this->endSection(); ?>