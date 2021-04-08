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
        <?php foreach ($pts as $p) : ?>
        <h3 class="text-dark mb-0">Daftar Mahasiswa (<?= $p['nama']; ?>)</h3>
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
                                        <th scope="col">Judul</th>
                                        <th scope="col">Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($news as $n) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?= $i++; ?></th>
                                        <td><?= $n['judul'] ?></td>
                                        <td>
                                            <!-- Modal berita -->
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                                data-target="#berita<?= $n['id']; ?>">
                                                Detail
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="berita<?= $n['id']; ?>" tabindex="-1"
                                                role="dialog" aria-labelledby="beritaLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="beritaLabel">Recent News
                                                                (<?= $n['judul']; ?>)
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- isi -->
                                                            <div class="container">
                                                                <div class="row">
                                                                    <!-- update berita --->
                                                                    <div class="col-sm-8">
                                                                        <div class="form-group">
                                                                            <label for="berita">Judul</label>
                                                                            <input type="text" class="form-control"
                                                                                id="berita" name="berita" form="berita"
                                                                                placeholder="Judul"
                                                                                value="<?= $n['judul'] ?>">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="berita">Deskripsi</label>
                                                                            <textarea type="text" rows="12"
                                                                                class="form-control" id="berita"
                                                                                name="'berita" form="berita"
                                                                                placeholder="Judul"><?= $n['deskripsi'] ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-sm-4">
                                                                        <div class="card">
                                                                            <div class="card-body">
                                                                                <img src="<?= base_url('file/pt/foto_berita/' . $n['foto'] . ''); ?>"
                                                                                    width="100%" height="250px" />
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <!-- tutup update berita -->
                                                                </div>
                                                            </div>

                                                            <!-- tutup isi -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <!-- delete berita -->
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                data-toggle="modal"
                                                                data-target="#delete<?= $n['id']; ?>">
                                                                Delete
                                                            </button>

                                                            <!-- Modal -->
                                                            <div class="modal fade" id="delete<?= $n['id']; ?>"
                                                                tabindex="-1" role="dialog"
                                                                aria-labelledby="deleteLabel" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="deleteLabel">
                                                                                Delete (<?= $n['judul']; ?>)
                                                                            </h5>
                                                                            <button type="button" class="close"
                                                                                data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Apakah Anda Yakin?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button"
                                                                                class="btn btn-secondary"
                                                                                data-dismiss="modal">Close</button>
                                                                            <form action="/delete-berita-admin"
                                                                                id="delete-berita<?= $n['id'] ?>"
                                                                                method="POST">
                                                                                <?= csrf_field(); ?>
                                                                                <input type="text"
                                                                                    form="delete-berita<?= $n['id'] ?>"
                                                                                    hidden="true"
                                                                                    value="<?= $n['id']; ?>" name="id">
                                                                                <input type="text"
                                                                                    form="delete-berita<?= $n['id'] ?>"
                                                                                    hidden="true"
                                                                                    value="<?= $n['foto']; ?>"
                                                                                    name="foto">
                                                                                <button type="submit"
                                                                                    form="delete-berita<?= $n['id'] ?>"
                                                                                    class="btn btn-danger">Delete</button>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- tutup delete berita -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tutup modal berita -->
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