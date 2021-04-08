<?php $this->extend('layout/pts'); ?>


<?php $this->section('search'); ?>

<ul class="nav navbar-nav flex-nowrap ml-auto">

    <?php $this->endSection(); ?>

    <?php $this->section('admin'); ?>
    <!-- Page Title Header Starts-->
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Recent News</h3>
    </div>
    <!-- Page Title Header Ends-->

    <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <!-- Berita -->
    <div class="col-sm">
        <div class="card shadow border-left-primary py-2">
            <div class="card-body">
                <div class="col mr-2">
                    <!-- isi -->
                    <!-- Page Title Header Starts-->
                    <div class="d-sm-flex justify-content-between align-items-center mb-3">
                        <div style="font-size: 18px;" class="text-dark mb-0">Data Berita</div>
                    </div>
                    <!-- Page Title Header Ends-->

                    <!-- tambah data -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary mb-4" data-toggle="modal"
                        data-target="#tambah_berita">
                        Tambah Berita
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="tambah_berita" tabindex="-1" role="dialog"
                        aria-labelledby="tambah_berita" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambah_berita">Tambah Berita</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Isi Form-->
                                    <form action="/tambah_berita" method="POST" id="Berita"
                                        enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="Judul">Judul</label>
                                            <input type="text" class="form-control" name="judul" id="judul"
                                                placeholder="Judul Berita" form="Berita">
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="deskripsi" id="deskripsi" form="Berita"
                                                rows="3" placeholder="Tulis Berita"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="Foto">Foto Berita</label>
                                            <input type="file" accept="image/x-png,image/jpg,image/jpeg"
                                                class="form-control" name="foto" id="foto" form="Berita">
                                            <span>Foto Berita (.jpg)</span>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" form="Berita" class="btn btn-sm btn-primary">Tambah</button>
                                </div>
                                </form>
                                <!-- Tutup isi form -->
                            </div>
                        </div>
                    </div>
                    <!-- tutup tambah data -->

                    <!-- Tables -->
                    <div class="table-responsive">
                        <table id="datalol" class="table table-striped table-bordered mt-3" style="color:black;">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; ?>
                                <?php foreach ($berita as $id) : ?>
                                <tr>
                                    <th scope="row" style="text-align: center;">
                                        <?= $a ?>
                                    </th>
                                    <td><?= $id['judul']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#update_berita<?= $a ?>">
                                            Update
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" style="color: none;" id="update_berita<?= $a ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="update_berita"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-xl" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="update_berita">Update
                                                            Berita</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Isi Form-->
                                                        <div class="container">
                                                            <form action="/update_berita" method="POST"
                                                                id="update_berita_<?= $id['id'] ?>"
                                                                enctype="multipart/form-data">
                                                                <?= csrf_field(); ?>
                                                                <div class="row">
                                                                    <div class="col-sm-8">
                                                                        <input type="text" name="id_berita"
                                                                            hidden="true"
                                                                            form="update_berita_<?= $id['id'] ?>"
                                                                            value="<?= $id['id']; ?>">
                                                                        <div class="form-group">
                                                                            <label for="Judul">Judul</label>
                                                                            <input type="text"
                                                                                form="update_berita_<?= $id['id'] ?>"
                                                                                class="form-control" name="judul"
                                                                                value="<?= $id['judul'] ?>"
                                                                                placeholder="Judul Berita">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <textarea class="form-control"
                                                                                name="deskripsi" id="deskripsi"
                                                                                form="update_berita_<?= $id['id'] ?>"
                                                                                rows="13"><?= $id['deskripsi'] ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <div class="form-group">
                                                                                    <label for="Foto">Update
                                                                                        Foto</label>
                                                                                    <img src="<?= base_url('file/pt/foto_berita/' . $id['foto'] . ''); ?>"
                                                                                        width="100%" height="200px"
                                                                                        style="padding-left: 40px; padding-right: 40px;" />
                                                                                    <input type="file"
                                                                                        accept="image/x-png,image/jpg,image/jpeg"
                                                                                        form="update_berita_<?= $id['id'] ?>"
                                                                                        class="form-control" name="foto"
                                                                                        value="<?= $id['foto'] ?>">
                                                                                    <span>Foto Berita (.jpg)</span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-sm btn-primary"
                                                                value="Update" form="update_berita_<?= $id['id'] ?>">
                                                        </div>
                                                        </form>
                                                    </div>
                                                    <!-- Tutup isi form -->
                                                </div>
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#delete_berita<?= $a ?>">
                                            Delete
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" style="color: none;" id="delete_berita<?= $a ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="delete_berita"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="delete_berita">Delete Berita</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Isi Form-->
                                                        <form action="/delete_berita" method="POST"
                                                            id="delete_berita_<?= $id['id'] ?>"
                                                            enctype="multipart/form-data">
                                                            <?= csrf_field(); ?>
                                                            <input type="text" form="delete_berita_<?= $id['id'] ?>"
                                                                name="foto" value="<?= $id['foto'] ?>" hidden="true" />
                                                            <input type="text" form="delete_berita_<?= $id['id'] ?>"
                                                                name="id_berita" value="<?= $id['id'] ?>"
                                                                hidden="true" />
                                                            Apakah Anda Yakin?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-sm btn-danger"
                                                            value="Delete" form="delete_berita_<?= $id['id'] ?>">
                                                    </div>
                                                    </form>
                                                    <!-- Tutup isi form -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- tutup update Berita -->

                                    </td>
                                </tr>
                                <?php $a += 1 ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- tutup Tables -->


                    <!-- tutup isi -->
                </div>
            </div>
        </div>
    </div>
    <!-- tutup Berita -->
    <?php $this->endSection(); ?>