<?php $this->extend('layout/admin'); ?>


<?php $this->section('search'); ?>

<ul class="nav navbar-nav flex-nowrap ml-auto">

    <?php $this->endSection(); ?>

    <?php $this->section('admin'); ?>
    <!-- Page Title Header Starts-->
    <div class="d-sm-flex justify-content-between align-items-center mb-4">
        <h3 class="text-dark mb-0">Data Massage BMB</h3>
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

                        <!-- Table -->
                        <?php $i = 1; ?>
                        <div class="table-responsive">
                            <table id="datalol" class="table table-bordered mt-4" style="color:black;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align:center;">No</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Pesan</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pesan as $p) : ?>
                                    <tr>
                                        <th scope="row" style="text-align: center;"><?= $i++; ?></th>
                                        <td><?= $p['email'] ?></td>
                                        <td><?= $p['pesan'] ?></td>
                                        <td>
                                            <!--balas-->
                                            <button type="button" class="btn btn-sm btn-primary mb-2"
                                                data-toggle="modal" data-target="#balas_pesan<?= $i ?>">
                                                Balas
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" style="color: none;" id="balas_pesan<?= $i ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="balas_pesan"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="balas_pesan">Balas Pesan
                                                                (<?= $p['email'] ?>)</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Isi Form-->
                                                            <form action="/balas-pesanAdmin" method="POST"
                                                                id="balas_p_<?= $p['id'] ?>">
                                                                <?= csrf_field(); ?>
                                                                <input hidden="true" type="text"
                                                                    value="<?= $p['email']; ?>"
                                                                    form="balas_p_<?= $p['id'] ?>" name="email">
                                                                <input hidden="true" type="text"
                                                                    value="<?= $p['pesan']; ?>"
                                                                    form="balas_p_<?= $p['id'] ?>" name="pesan">
                                                                <div class="form-group">
                                                                    <textarea class="form-control" type="text"
                                                                        form="balas_p_<?= $p['id'] ?>" name="balas"
                                                                        rows="12"></textarea>
                                                                </div>
                                                                <!-- tutup isi form -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-sm btn-primary"
                                                                value="Balas" form="balas_p_<?= $p['id'] ?>">
                                                        </div>
                                                        </form>
                                                        <!-- Tutup isi form -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!---tutup balas-->

                                            <!--delete-->
                                            <button type="button" class="btn btn-sm btn-danger mb-2" data-toggle="modal"
                                                data-target="#delete_pesan<?= $i ?>">
                                                Delete
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" style="color: none;" id="delete_pesan<?= $i ?>"
                                                tabindex="-1" role="dialog" aria-labelledby="delete_pesan"
                                                aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="delete_pesan">Delete Pesan</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Isi Form-->
                                                            <form action="/delete-pesanAdmin" method="POST"
                                                                id="delete_p_<?= $p['id'] ?>">
                                                                <?= csrf_field(); ?>
                                                                <input type="text" form="delete_p_<?= $p['id'] ?>"
                                                                    name="id" value="<?= $p['id'] ?>" hidden="true" />
                                                                Apakah Anda Yakin?
                                                                <!-- tutup isi form -->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-sm btn-danger"
                                                                value="Delete" form="delete_p_<?= $p['id'] ?>">
                                                        </div>
                                                        </form>
                                                        <!-- Tutup isi form -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!---tutup delete-->
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