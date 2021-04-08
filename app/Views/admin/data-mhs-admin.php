<?php $this->extend('layout/admin'); ?>


<?php $this->section('search'); ?>
<a href="/pts-admin">
    <span class="fa fa-arrow-circle-left"> Back</span>
</a>
<ul class="nav navbar-nav flex-nowrap ml-auto">
    <?php $this->endSection(); ?>

    <?php $this->section('admin'); ?>
    <!-- Page Title Header Starts-->
    <div class="d-sm-flex justify-content-between align-items-center mb-4 mt-4">
        <?php foreach ($MHS as $mhs) : ?>
        <h3 class="text-dark mb-0">Daftar Mahasiswa (<?= $mhs['nama']; ?>)</h3>
        <?php endforeach; ?>
    </div>
    <!-- Page Title Header Ends-->
    <div class="row">
        <div class="col-sm">
            <div class="card shadow border-left-primary py-2">
                <div class="card-body">
                    <div class="col mr-2">
                        <!-- isi -->
                        <?php if (session()->getFlashdata('pts')) : ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('pts'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>

                        <!-- Table -->
                        <?php $i = 1; ?>
                        <div class="table-responsive">
                            <table id="datalol" class="table table-bordered mt-4" style="color:black;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align:center;">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($mahasiswa as $mhs) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?= $i++; ?></th>
                                        <td><?= $mhs['nama'] ?></td>
                                        <td><?= $mhs['nim'] ?></td>
                                        <td><?= $mhs['jurusan'] ?></td>
                                        <td><?= $mhs['alamat'] ?></td>
                                        <td><?= $mhs['jk'] ?></td>
                                        <td><?= $mhs['email'] ?></td>
                                        <td>
                                            <a href="/detail-mhs-admin/<?= $kampus; ?>/<?= $mhs['id']; ?>">
                                                <button type="submit" class="btn btn-sm btn-primary">
                                                    Detail
                                                </button>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Tutup Table -->


                        <!-- tutup isi -->
                    </div>
                </div>
            </div>
        </div>


    </div>
    <?php $this->endSection(); ?>