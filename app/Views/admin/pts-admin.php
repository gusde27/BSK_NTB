<?php $this->extend('layout/admin'); ?>


<?php $this->section('search'); ?>

<ul class="nav navbar-nav flex-nowrap ml-auto">

    <?php $this->endSection(); ?>

    <?php $this->section('admin'); ?>
    <!-- Page Title Header Starts-->
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Data Perguruan Tinggi</h3>
    </div>
    <!-- Page Title Header Ends-->

    <div class="row">
        <div class="col-sm">
            <div class="card shadow border-left-primary py-2">
                <div class="card-body">
                    <div class="col mr-2">
                        <!-- isi -->
                        <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                        <!-- tambah data -->

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-sm btn-primary mb-4" data-toggle="modal"
                            data-target="#tambah_pts">
                            Tambah Data Perguruan Tinggi
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="tambah_pts" tabindex="-1" role="dialog" aria-labelledby="tambah_pts"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambah_pts">Tambah Data Perguruan Tinggi</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!--Error -->
                                        <!--Tutup Error -->
                                        <!-- Isi Form-->
                                        <form action="/tambah_pts" method="POST" id="tambah_pt">
                                            <?= csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" name="user" form="tambah_pt" class="form-control"
                                                    id="user" placeholder="Username">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="text" name="pass" form="tambah_pt" class="form-control"
                                                    id="pass" placeholder="Password">
                                            </div>
                                            <div class="form-group">
                                                <label for="pass">Nama Perguruan Tinggi</label>
                                                <input type="text" name="nama" form="tambah_pt" class="form-control"
                                                    id="nama" placeholder="Nama Perguruan Tinggi">
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" form="tambah_pt"
                                            class="btn btn-sm btn-primary">Tambah</button>
                                    </div>
                                    </form>
                                    <!-- Tutup isi form -->
                                </div>
                            </div>
                        </div>
                        <!-- tutup tambah data -->

                        <!-- Table -->
                        <?php $i = 1; ?>
                        <div class="table-responsive">
                            <table id="datalol" class="table table-bordered mt-4" style="color:black; font-size:15px;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align:center;">No</th>
                                        <th scope="col">Nama Perguruan Tinggi</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pts as $p) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?= $i++; ?></th>
                                        <td><?= $p['nama'] ?></td>
                                        <td>
                                            <!-- update -->
                                            <button type="button" class="btn btn-sm btn-primary mb-2"
                                                data-toggle="modal" data-target="#detail_pts<?= $i ?>">
                                                Update
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" style="color: none;" id="detail_pts<?= $i ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="detail_pts"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="detail_pts">Detail Perguruan
                                                                Tinggi</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Isi Form-->
                                                            <form action="/update_ptsAdmin" method="POST"
                                                                id="detail_pts_<?= $p['id'] ?>">
                                                                <?= csrf_field(); ?>
                                                                <input type="text" form="detail_pts_<?= $p['id'] ?>"
                                                                    name="id" value="<?= $p['id'] ?>" hidden="true" />
                                                                <div class="form-group">
                                                                    <label for="username">Username</label>
                                                                    <input type="text" form="detail_pts_<?= $p['id'] ?>"
                                                                        class="form-control" name="username"
                                                                        value="<?= $p['username'] ?>"
                                                                        placeholder="username">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="password">Password</label>
                                                                    <input type="text" form="detail_pts_<?= $p['id'] ?>"
                                                                        class="form-control" name="password"
                                                                        value="<?= $p['password'] ?>"
                                                                        placeholder="password">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="nama">Nama Perguruan Tinggi</label>
                                                                    <input type="text" form="detail_pts_<?= $p['id'] ?>"
                                                                        class="form-control" name="nama"
                                                                        value="<?= $p['nama'] ?>" placeholder="nama">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="jenis">Jenis</label>
                                                                    <input type="text" form="detail_pts_<?= $p['id'] ?>"
                                                                        class="form-control" name="jenis"
                                                                        value="<?= $p['jenis'] ?>" placeholder="jenis">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="deskripsi">Deskripsi</label>
                                                                    <textarea type="text" rows="5"
                                                                        form="detail_pts_<?= $p['id'] ?>"
                                                                        class="form-control" name="deskripsi"
                                                                        placeholder="deskripsi"><?= $p['deskripsi'] ?></textarea>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="alamat">Alamat</label>
                                                                    <input type="text" form="detail_pts_<?= $p['id'] ?>"
                                                                        class="form-control" name="alamat"
                                                                        value="<?= $p['alamat'] ?>"
                                                                        placeholder="alamat">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="link">Link Website</label>
                                                                    <input class="form-control" name="link" id="link"
                                                                        form="detail_pts_<?= $p['id'] ?>"
                                                                        value="<?= $p['link'] ?>"
                                                                        placeholder="Link Website">
                                                                </div>
                                                                <!-- tutup isi form -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-sm btn-primary"
                                                                value="Update" form="detail_pts_<?= $p['id'] ?>">
                                                        </div>
                                                        </form>
                                                        <!-- Tutup isi form -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tutup update -->

                                            <!--delete-->
                                            <button type="button" class="btn btn-sm btn-danger mb-2" data-toggle="modal"
                                                data-target="#delete_pts<?= $i ?>">
                                                Delete
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" style="color: none;" id="delete_pts<?= $i ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="delete_pts"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="delete_pts">Delete Perguruan
                                                                Tinggi</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Isi Form-->
                                                            <form action="/delete_ptsAdmin" method="POST"
                                                                id="delete_pt_<?= $p['id'] ?>">
                                                                <?= csrf_field(); ?>
                                                                <input type="text" form="delete_pt_<?= $p['id'] ?>"
                                                                    name="id" value="<?= $p['id'] ?>" hidden="true" />
                                                                <input type="text" form="delete_pt_<?= $p['id'] ?>"
                                                                    name="nama_pts" value="<?= $p['nama'] ?>"
                                                                    hidden="true" />
                                                                <input type="text" form="delete_pt_<?= $p['id'] ?>"
                                                                    name="foto" value="<?= $p['foto'] ?>"
                                                                    hidden="true" />
                                                                Apakah Anda Yakin?
                                                                <!-- tutup isi form -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-sm btn-danger"
                                                                value="Delete" form="delete_pt_<?= $p['id'] ?>">
                                                        </div>
                                                        </form>
                                                        <!-- Tutup isi form -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!---tutup delete-->

                                            <!-- recent news -->

                                            <!-- tutup recent news -->

                                            <!-- mahasiswa -->
                                            <a href="mahasiswa-admin/<?= $p['id']; ?>">
                                                <button type="button" class="btn btn-sm btn-primary mb-2">
                                                    Mahasiswa
                                                </button>
                                            </a>
                                            <!-- tutup mahasiswa -->
                                            <!-- recent news -->
                                            <a href="recent-news-admin/<?= $p['id']; ?>">
                                                <button type="button" class="btn btn-sm btn-primary mb-2">
                                                    Recent News
                                                </button>
                                            </a>
                                            <!-- tutup recent news -->
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