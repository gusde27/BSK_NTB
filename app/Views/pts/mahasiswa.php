<?php $this->extend('layout/pts'); ?>


<?php $this->section('search'); ?>
<ul class="nav navbar-nav flex-nowrap ml-auto">
    <?php $this->endSection(); ?>

    <?php $this->section('admin'); ?>
    <!-- Page Title Header Starts-->
    <div class="d-sm-flex justify-content-between align-items-center mb-4 mt-4">
        <h3 class="text-dark mb-0">Daftar Mahasiswa</h3>
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
                            data-target="#tambah_mhs">
                            Tambah Data Mahasiswa
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="tambah_mhs" tabindex="-1" role="dialog" aria-labelledby="tambah_mhs"
                            aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="tambah_mhs">Tambah Data Mahasiswa</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <!--Error -->
                                        <!--Tutup Error -->
                                        <!-- Isi Form-->
                                        <form action="/mahasiswa" method="POST" id="formadd">
                                            <?= csrf_field(); ?>
                                            <div class="form-group">
                                                <label for="nama">* Nama Lengkap</label>
                                                <input type="text"
                                                    class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : '' ?>"
                                                    name="nama" id="nama" placeholder="Nama Lengkap"
                                                    value="<?= old('nama'); ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nama'); ?>
                                                </div>
                                                <small class="text-muted">
                                                    Nama tidak akan bisa diubah.
                                                </small>
                                            </div>
                                            <div class="form-group">
                                                <label for="nim">* Nomor Induk Mahasiswa</label>
                                                <input type="text"
                                                    class="form-control <?= ($validation->hasError('nim')) ? 'is-invalid' : '' ?>"
                                                    name="nim" id="nim" placeholder="NIM" value="<?= old('nim') ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('nim'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="jurusan">* Jurusan</label>
                                                <input type="text"
                                                    class="form-control <?= ($validation->hasError('jurusan')) ? 'is-invalid' : '' ?>"
                                                    name="jurusan" id="jurusan" placeholder="Jurusan"
                                                    value="<?= old('jurusan') ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('jurusan'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="jk">* Jenis Kelamin</label>
                                                <select
                                                    class="form-control <?= ($validation->hasError('jk')) ? 'is-invalid' : '' ?>"
                                                    id="jk" name="jk">
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label for="tempat_lahir">* Tempat Lahir</label>
                                                <input type="text"
                                                    class="form-control <?= ($validation->hasError('tempat_lahir')) ? 'is-invalid' : '' ?>"
                                                    name="tempat_lahir" id="tempat_lahir" placeholder="Tempat Lahir"
                                                    value="<?= old('tempat_lahir') ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tempat_lahir'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="tanggal_lahir">* Tanggal Lahir</label>
                                                <input type="date"
                                                    class="form-control <?= ($validation->hasError('tanggal_lahir')) ? 'is-invalid' : '' ?>"
                                                    name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir"
                                                    value="<?= old('tanggal_lahir') ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('tanggal_lahir'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">* Alamat</label>
                                                <textarea
                                                    class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : '' ?>"
                                                    name="alamat" id="alamat" rows="3"
                                                    placeholder="Alamat"><?= old('alamat') ?></textarea>
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('alamat'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="no_hp">* No. HP</label>
                                                <input type="text"
                                                    class="form-control <?= ($validation->hasError('no_hp')) ? 'is-invalid' : '' ?>"
                                                    name="no_hp" id="no_hp" placeholder="Nomor HP">
                                                <div class="invalid-feedback" value="<?= old('no_hp') ?>">
                                                    <?= $validation->getError('no_hp'); ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="email">* Email</label>
                                                <input type="email"
                                                    class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>"
                                                    name="email" id="email" placeholder="Email"
                                                    value="<?= old('email') ?>">
                                                <div class="invalid-feedback">
                                                    <?= $validation->getError('email'); ?>
                                                </div>
                                            </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-sm btn-secondary"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" form="formadd"
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
                            <table id="datalol" class="table table-striped table-bordered mt-3" style="color:black;">
                                <thead>
                                    <tr>
                                        <th scope="col" style="text-align:center;">No</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">NIM</th>
                                        <th scope="col">Jurusan</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Aksi</th>
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
                                            <a href="detail/<?= $mhs['id']; ?>">
                                                <button type="button" class="btn btn-sm btn-primary">
                                                    Detail
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                                data-target="#delete_mhs<?= $mhs['id']; ?>">
                                                Delete
                                            </button>
                                            <!-- Modal -->
                                            <div class="modal fade" style="color: none;"
                                                id="delete_mhs<?= $mhs['id']; ?>" tabindex="-1" role="dialog"
                                                aria-labelledby="delete_mhs" aria-hidden="true">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="delete_mhs">Delete Mahasiswa
                                                                (<?= $mhs['nama'] ?>)
                                                            </h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <!-- Isi Form-->
                                                            <form action="/delete_mahasiswa" method="POST"
                                                                id="delete_mhs_<?= $mhs['id']; ?>">
                                                                <?= csrf_field(); ?>
                                                                <input type="text" value="<?= $mhs['id']; ?>"
                                                                    form="delete_mhs_<?= $mhs['id']; ?>" name="id"
                                                                    hidden="true">
                                                                <input type="text" value="<?= $mhs['nama']; ?>"
                                                                    form="delete_mhs_<?= $mhs['id']; ?>" name="nama"
                                                                    hidden="true">
                                                                <input type="text" value="<?= $mhs['foto']; ?>"
                                                                    form="delete_mhs_<?= $mhs['id']; ?>" name="foto"
                                                                    hidden="true">
                                                                <div style="font-size: 20px;">
                                                                    Semua Data Mahasiswa ini Akan <b>Terhapus!</b></br>
                                                                    <b>Apakah Anda Yakin?</b>
                                                                </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-sm btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <input type="submit" class="btn btn-sm btn-danger"
                                                                value="Delete" form="delete_mhs_<?= $mhs['id'] ?>">
                                                        </div>
                                                        </form>
                                                        <!-- Tutup isi form -->
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- tutup delete KRS -->
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