<?php $this->extend('layout/pts'); ?>


<?php $this->section('search'); ?>

<ul class="nav navbar-nav flex-nowrap ml-auto">

    <?php $this->endSection(); ?>

    <?php $this->section('admin'); ?>
    <!-- Page Title Header Starts-->
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Dashboard</h3>
    </div>
    <!-- Page Title Header Ends-->

    <!-- item pertama -->
    <div class="row">
        <div class="col-md col-xl mb">
            <div class="card shadow border-left-primary py-2">
                <a href="<?= base_url('mahasiswa'); ?>">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col mr-2">
                                <div class="text-uppercase text-primary font-weight-bold text-xs mb-1">
                                    <span>MAHASISWA</span>
                                </div>
                                <div class="text-dark font-weight-bold h5 mb-0"><span></span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-database fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        &nbsp;
        <div class="col-md col-xl mb">
            <div class="card shadow border-left-info py-2">
                <a href="<?= base_url('/berita'); ?>">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col mr-2">
                                <div class="text-uppercase text-info font-weight-bold text-xs mb-1">
                                    <span>RECENT NEWS</span>
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="text-dark font-weight-bold h5 mb-0 mr-3"><span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <!-- tutup item pertama -->
    </div>
    <!-- tutup slide pertama -->
    <!-- Page Title Header Starts-->
    <div class="d-sm-flex justify-content-between align-items-center mb-4 mt-4">
        <h3 class="text-dark mb-0">Profile</h3>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-sm-8">
            <div class="card shadow border-left-primary py-2">
                <div class="card-body">
                    <div class="col mr-2">
                        <?php if (session()->getFlashdata('pts')) : ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('pts'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                        <!-- isi -->
                        <form action="/update_pts" id="update_pts" method="POST">
                            <?php foreach ($profile as $pro) : ?>
                            <input type="text" value="<?= $pro['id']  ?>" hidden="true" name="id" form="update_pts">
                            <div class="form-group">
                                <label style="font-size: 18px;"><?= $pro['nama'] ?></label>
                            </div>
                            <div class="form-group">
                                <label for="jenis_pt">Jenis Perguruan Tinggi</label>
                                <select class="form-control" id="jenis_pt" name="jenis_pt" form="update_pts">
                                    <option value="<?= $pro['jenis'] ?>"><?= $pro['jenis'] ?></option>
                                    <option value="Swasta">Swasta</option>
                                    <option value="Negeri">Negeri</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_pt">Deskripsi</label>
                                <textarea class="form-control" name="deskripsi_pt" id="deskripsi_pt" form="update_pts"
                                    rows="15"><?= $pro['deskripsi'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi_pt">Alamat</label>
                                <textarea class="form-control" name="alamat_pt" id="alamat_pt" form="update_pts"
                                    rows="4"><?= $pro['alamat'] ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="link">Link Website</label>
                                <input class="form-control" name="link" id="link" form="update_pts"
                                    value="<?= $pro['link'] ?>" placeholder="Link Website">
                            </div>
                            <!-- endForeach -->
                            <button type="submit" class="btn btn-sm btn-primary" form="update_pts">Simpan</button>
                        </form>

                        <!-- tutup isi -->
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="card shadow border-left-info py-2">
                <div class="card-body">
                    <div class="col mr-2">
                        <!-- isi -->
                        <img src="<?= base_url('file/pt/foto_pts/' . $pro['foto'] . ''); ?>" width="100%"
                            height="200px" />
                        <form action="/update_fotoPts" method="POST" id="fotoPts" enctype="multipart/form-data">
                            <label for="foto_profile">Update</label>
                            <input type="text" form="fotoPts" value="<?= $pro['id'] ?>" name="id" hidden="true">
                            <input type="text" form="fotoPts" value="<?= $pro['nama'] ?>" name="nama" hidden="true">
                            <?php endforeach; ?>
                            <div class="form-group mt-2">
                                <input type="file" accept="image/x-png,image/jpg,image/jpeg" class="form-control-file"
                                    form="fotoPts" name="foto_pts" id="foto_pts">
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-sm btn-primary" form="fotoPts">Simpan</button>
                            </div>
                        </form>
                        <!-- tutup isi -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php $this->endSection(); ?>