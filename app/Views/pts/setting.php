<?php $this->extend('layout/pts'); ?>


<?php $this->section('search'); ?>

<ul class="nav navbar-nav flex-nowrap ml-auto">

    <?php $this->endSection(); ?>

    <?php $this->section('admin'); ?>
    <!-- Page Title Header Starts-->
    <div class="d-sm-flex justify-content-between align-items-center mb-4 mt-4">
        <h3 class="text-dark mb-0">Ubah Password</h3>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-sm-10">
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
                        <form action="/update_pass_pts" id="update_pass" method="POST">
                            <div class="form-group">
                                <label>Password Lama</label>
                                <input type="text" class="form-control" form="update_pass" name="old_pass"
                                    placeholder="Masukan Password Baru">
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="text" class="form-control" form="update_pass" name="new_pass"
                                    placeholder="Masukan Password Baru">
                            </div>
                            <div class="form-group">
                                <label>Password Baru</label>
                                <input type="text" class="form-control" form="update_pass" name="new_pass2"
                                    placeholder="Masukan Password Baru">
                            </div>

                            <!-- endForeach -->
                            <button type="submit" class="btn btn-sm btn-primary" form="update_pass">Update</button>
                        </form>

                        <!-- tutup isi -->
                    </div>
                </div>
            </div>
        </div>

    </div>
    <?php $this->endSection(); ?>