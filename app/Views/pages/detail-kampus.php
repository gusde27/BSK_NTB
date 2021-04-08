<?php $this->extend('layout/disain'); ?>

<?php $this->section('content'); ?>


<?php foreach($pts as $p) : ?>
<div id=" main" class="main">
    <div class="home">
        <div class="container">
            <div class="ft-inner align-center">
                <div class="ft-image wow animated" style="visibility: visible;">
                    <img class="img-fluid" src="<?= base_url('file/pt/foto_pts/' . $p['foto'] . ''); ?>" alt="Feature">
                </div>
                <div class="ft-text">
                    <div class="ft-content">
                        <h2><?= $p['nama'] ?></h2>
                        <p><?= $p['link'] ?> </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="yd-cat">
        <div class="container">
            <div class="cat-inner">
                <div class="cat-flex">
                    <div class="cat2">
                        <h4 style="font-size: 20px;">Deskripsi</h4>
                        <h2><?= $p['nama'] ?></h2>
                    </div>
                </div>
                <div class="cat-flex" style="margin: 20px 0px">
                    <p
                        style="white-space: pre-line; font-size: 1rem; line-height: 25px; text-indent: 30px; text-align: justify;">
                        Universitas
                        <?= $p['deskripsi'] ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php endforeach; ?>

    <div class="yd-cat" style="padding-top: 0px;">
        <div class="container">
            <div class="cat-inner">
                <div class="cat-flex">
                    <div class="cat2">
                        <h4 style="font-size: 20px;">Mahasiswa</h4>
                        <h2>Penerima Beasiswa</h2>
                    </div>
                </div>

                <!-- mahasiswa -->
                <?php if(count($mhs)<4) : ?>
                <div class="cat-flex" style="margin: 15px 0px;">
                    <style>
                    .custom-hover:hover {
                        background-color: #fff2e5;
                    }
                    </style>
                    <?php for($j=0;$j<count($mhs);$j++):?>
                    <div class="cat1 ">
                        <div class="cat-item clr2 custom-hover">
                            <div class="cat-icon">
                                <div class="cat-img">
                                    <?php if($mhs[$j]['foto']==''):?>
                                    <div style="height: 100%; text-align: center;">
                                        <p> Foto Tidak Ada</p>
                                    </div>
                                    <?php else :?>
                                    <img src="<?= base_url('file/pt/foto_profile/' . $mhs[$j]['foto'] . ''); ?>"
                                        width="100%">
                                    <?php endif?>
                                </div>
                            </div>
                            <div class="cat-text" style="text-align: center;">
                                <h3><?= $mhs[$j]['nama'] ?></h3>
                                <p><?= $mhs[$j]['jurusan'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endfor?>
                </div>
                <?php endif ?>
                <?php $counter=1; ?>
                <?php $jumlah=intval(count($mhs)/4) ?>
                <?php for ($i=1;$i<=$jumlah;$i++):?>
                <div class="cat-flex" style="margin: 15px 0px;">
                    <style>
                    .custom-hover:hover {
                        background-color: #fff2e5;
                    }
                    </style>
                    <?php for($j=$counter;$j<=($i*4);$j++):?>
                    <div class="cat1 ">
                        <div class="cat-item clr2 custom-hover">
                            <div class="cat-icon">
                                <div class="cat-img">
                                    <?php if($mhs[$j-1]['foto']==''):?>
                                    <div style="height: 100%; text-align: center;">
                                        <p> Foto Tidak Ada</p>
                                    </div>
                                    <?php else :?>
                                    <img src="<?= base_url('file/pt/foto_profile/' . $mhs[$j-1]['foto'] . ''); ?>"
                                        width="100%">
                                    <?php endif?>
                                </div>
                            </div>
                            <div class="cat-text" style="text-align: center;">
                                <h3><?= $mhs[$j-1]['nama'] ?></h3>
                                <p><?= $mhs[$j-1]['jurusan'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endfor?>
                    <?php $counter+=4?>
                </div>
                <?php endfor?>
                <?php if(count($mhs)>4) :?>
                <div class="cat-flex" style="margin: 15px 0px;">
                    <style>
                    .custom-hover:hover {
                        background-color: #fff2e5;
                    }
                    </style>
                    <?php for($j=($jumlah*4)+1;$j<=count($mhs);$j++):?>
                    <div class="cat1">
                        <div class="cat-item clr2 custom-hover">
                            <div class="cat-icon">
                                <div class="cat-img">
                                    <?php if($mhs[$j-1]['foto']==''):?>
                                    <div style="height: 100%; text-align: center;">
                                        <p> Foto Tidak Ada</p>
                                    </div>
                                    <?php else :?>
                                    <img src="<?= base_url('file/pt/foto_profile/' . $mhs[$j-1]['foto'] . ''); ?>"
                                        width="100%">
                                    <?php endif?>
                                </div>
                            </div>
                            <div class="cat-text" style="text-align: center;">
                                <h3><?= $mhs[$j-1]['nama'] ?></h3>
                                <p><?= $mhs[$j-1]['jurusan'] ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endfor?>
                </div>
                <?php endif ?>
                <!-- tutup mahasiswa -->

            </div>
        </div>
    </div>


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