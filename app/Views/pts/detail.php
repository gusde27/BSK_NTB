<?php $this->extend('layout/pts'); ?>


<?php $this->section('search'); ?>
<a href="/mahasiswa">
    <span class="fa fa-arrow-circle-left"> Back</span>
</a>
<ul class="nav navbar-nav flex-nowrap ml-auto">
    <?php $this->endSection(); ?>

    <?php $this->section('admin'); ?>
    <!-- Page Title Header Starts-->
    <div class="d-sm-flex justify-content-between align-items-center mb-4 mt-4">
        <?php foreach ($id_mhs as $d) : ?>
        <h3 class="text-dark mb-0">Detail Mahasiswa (<?= $d['nama']; ?>)</h3>
        <?php endforeach; ?>
    </div>
    <!-- Page Title Header Ends-->
    <!-- card content 1 -->
    <div class="row">
        <div class="col-sm-8">
            <div class="card shadow border-left-primary py-2">
                <div class="card-body">
                    <div class="col mr-2">
                        <?php if (session()->getFlashdata('mahasiswa')) : ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('mahasiswa'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                        <!-- isi -->
                        <form action="/update_mhs" method="POST" id="update_mhs">
                            <?= csrf_field(); ?>
                            <?php //foreach ($profile as $pro) : 
                            ?>
                            <?php foreach ($id_mhs as $d) : ?>
                            <input type="text" name="id" value="<?= $d['id'] ?>" hidden="true" />
                            <div class="form-group">
                                <p>
                                    <b>
                                        <?= $d['nama']; ?>
                                    </b>
                                </p>
                            </div>
                            <div class="form-group">
                                <label for="nim">NIM</label>
                                <input type="text" class="form-control" name="nim" id="nim" form="update_mhs"
                                    placeholder="NIM" value="<?= $d['nim']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" class="form-control" name="jurusan" id="jurusan" form="update_mhs"
                                    placeholder="Jurusan" value="<?= $d['jurusan']; ?>">
                            </div>
                            <div class=" form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-control" id="jk" name="jk" form="update_mhs">
                                    <option value="<?= $d['jk']; ?>"><?= $d['jk'] ?></option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="nama">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                                    form="update_mhs" placeholder="Tempat Lahir" value="<?= $d['tempat_lahir']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir"
                                    form="update_mhs" placeholder="Tanggal Lahir" value="<?= $d['tanggal_lahir']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea class="form-control" name="alamat" id="alamat" form="update_mhs"
                                    rows="3"><?= $d['alamat']; ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="nama">No. HP</label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" placeholder="Nomor HP"
                                    form="update_mhs" value="<?= $d['no_hp']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="nama">Email</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                    form="update_mhs" value="<?= $d['email']; ?>">
                            </div>
                            <!-- foreach -->
                            <button type="submit" class="btn btn-sm btn-primary" form="update_mhs">Simpan</button>
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
                        <img src="<?= base_url('file/pt/foto_profile/' . $d['foto'] . ''); ?>" width="100%"
                            height="200px" />
                        <form action="/update_fotoMhs" method="POST" id="fotoMhs" enctype="multipart/form-data">
                            <label for="foto_profile">Update</label>
                            <input type="text" form="fotoMhs" value="<?= $d['id'] ?>" name="id" hidden="form">
                            <input type="text" form="fotoMhs" value="<?= $d['nama'] ?>" name="nama" hidden="form">
                            <?php endforeach; ?>
                            <div class="form-group mt-2">
                                <input type="file" accept="image/x-png,image/jpg,image/jpeg" class="form-control-file"
                                    form="fotoMhs" name="foto_profile" id="foto_profile">
                            </div>
                            <div class="form-group mt-2">
                                <button type="submit" class="btn btn-sm btn-primary" form="fotoMhs">Simpan</button>
                            </div>
                        </form>
                        <!-- tutup isi -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- tutup card content 1 -->
    <!-- Page Title Header Starts-->
    <div class="d-sm-flex justify-content-between align-items-center mb-4 mt-4">
        <?php foreach ($id_mhs as $d) : ?>
        <h3 class="text-dark mb-0">File Mahasiswa (<?= $d['nama']; ?>)</h3>
        <?php endforeach; ?>
    </div>
    <!-- Page Title Header Ends-->
    <!-- button file -->
    <!--
    <p>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#khs" aria-expanded="false"
            aria-controls="khs">
            KHS
        </button>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#krs" aria-expanded="false"
            aria-controls="krs">
            KRS
        </button>
        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#prestasi"
            aria-expanded="false" aria-controls="prestasi">
            Prestasi
        </button>
    </p>
    -->
    <!-- tutup button file -->
    <?php if (session()->getFlashdata('pesan')) : ?>
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
        <?= session()->getFlashdata('pesan'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php endif; ?>
    <!-- KHS -->
    <div class="col-sm">
        <div class="card shadow border-left-primary py-2">
            <div class="card-body">
                <div class="col mr-2">
                    <!-- isi -->
                    <!-- Page Title Header Starts-->
                    <div class="d-sm-flex justify-content-between align-items-center mb-3">
                        <div style="font-size: 18px;" class="text-dark mb-0">Data Kartu Hasil Studi</div>
                    </div>
                    <!-- Page Title Header Ends-->

                    <!-- tambah data -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_khs">
                        Tambah Data KHS
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="tambah_khs" tabindex="-1" role="dialog" aria-labelledby="tambah_khs"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambah_khs">Tambah Data KHS</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Isi Form-->
                                    <form action="/upload_khs" method="POST" id="KHS" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <?php foreach ($id_mhs as $d) : ?>
                                        <input type="text" name="nama" form="KHS" value="<?= $d['nama']; ?>"
                                            hidden="true" />
                                        <?php endforeach; ?>
                                        <input type="text" name="id_mhs" form="KHS" value="<?= $lol; ?>"
                                            hidden="true" />
                                        <div class="form-group">
                                            <label for="semester">semester</label>
                                            <input type="text" class="form-control" name="semester" id="semester"
                                                placeholder="Semester KHS" form="KHS">
                                        </div>
                                        <div class="form-group">
                                            <label for="ip">IP</label>
                                            <input type="text" class="form-control" name="ip" id="ip"
                                                placeholder="IP KHS" form="KHS">
                                        </div>
                                        <div class="form-group">
                                            <label for="file">File KHS</label>
                                            <input type="file" accept="application/pdf" class="form-control" name="file"
                                                id="file" form="KHS">
                                            <span>File KHS (.PDF)</span>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" form="KHS" class="btn btn-sm btn-primary">Tambah</button>
                                </div>
                                </form>
                                <!-- Tutup isi form -->
                            </div>
                        </div>
                    </div>
                    <!-- tutup tambah data -->

                    <!-- Tables -->
                    <div class="table-responsive">
                        <table class="table table-bordered mt-4" style="color:black;">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">No</th>
                                    <th scope="col" style="text-align:center;">Semester</th>
                                    <th scope="col" style="text-align:center;">IP</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; ?>
                                <?php foreach ($id_khs as $id) : ?>
                                <tr>
                                    <th scope="row" style="text-align: center;">
                                        <?= $a ?>
                                    </th>
                                    <td style="text-align:center;"><?= $id['semester']; ?></td>
                                    <td style="text-align:center;"><?= $id['ip']; ?></td>
                                    <td>
                                        <form action="/download_khs" method="post" id="download_khs">
                                            <?= csrf_field(); ?>
                                            <input type="text" name="nama" form="download_khs"
                                                <?php foreach ($id_mhs as $d) : ?> value="<?= $d['nama']; ?>"
                                                <?php endforeach; ?> hidden="true" />
                                            <button type="submit" class="btn btn-primary btn-sm" name="nama_file"
                                                value="<?= $id['file']; ?>">
                                                <i class="fa fa-download"></i>
                                                <?= $id['file']; ?>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#update_khs<?= $a ?>">
                                            Update
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" style="color: none;" id="update_khs<?= $a ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="update_khs" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="update_khs">Update Data KHS</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Isi Form-->
                                                        <form action="/update_khs" method="POST"
                                                            id="update_khs_<?= $id['id'] ?>"
                                                            enctype="multipart/form-data">
                                                            <?= csrf_field(); ?>
                                                            <input type="text" name="nama"
                                                                form="update_khs_<?= $id['id']; ?>"
                                                                <?php foreach ($id_mhs as $d) : ?>
                                                                value="<?= $d['nama']; ?>" <?php endforeach; ?>
                                                                hidden="true" />
                                                            <input type="text" form="update_khs_<?= $id['id'] ?>"
                                                                name="id" value="<?= $id['id'] ?>" hidden="true" />
                                                            <div class="form-group">
                                                                <label for="Semester">Semester</label>
                                                                <input type="text" form="update_khs_<?= $id['id'] ?>"
                                                                    class="form-control" name="semester"
                                                                    value="<?= $id['semester'] ?>"
                                                                    placeholder="semester KHS">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="IP">IP</label>
                                                                <input type="text" form="update_khs_<?= $id['id'] ?>"
                                                                    class="form-control" name="ip" placeholder="IP KHS"
                                                                    value="<?= $id['ip'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="File">File KHS</label>
                                                                <input type="file" accept="application/pdf"
                                                                    form="update_khs_<?= $id['id'] ?>"
                                                                    class="form-control" name="file"
                                                                    value="<?= $id['file'] ?>">
                                                                <span>File KHS (.PDF)</span>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-sm btn-primary"
                                                            value="Update" form="update_khs_<?= $id['id'] ?>">
                                                    </div>
                                                    </form>
                                                    <!-- Tutup isi form -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- tutup update KHS -->

                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#delete_khs<?= $a ?>">
                                            Delete
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" style="color: none;" id="delete_khs<?= $a ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="delete_khs" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="delete_khs">Delete Data KHS</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Isi Form-->
                                                        <form action="/delete_khs" method="POST"
                                                            id="delete_khs_<?= $id['id'] ?>"
                                                            enctype="multipart/form-data">
                                                            <?= csrf_field(); ?>
                                                            <input type="text" form="delete_khs_<?= $id['id'] ?>"
                                                                name="id" value="<?= $id['id'] ?>" hidden="true" />
                                                            <input type="text" name="nama"
                                                                form="delete_khs_<?= $id['id'] ?>"
                                                                <?php foreach ($id_mhs as $d) : ?>
                                                                value="<?= $d['nama']; ?>" <?php endforeach; ?>
                                                                hidden="true" />
                                                            <input type="text" form="delete_khs_<?= $id['id'] ?>"
                                                                name="file" value="<?= $id['file'] ?>" hidden="true" />
                                                            Apakah Anda Yakin?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-sm btn-danger"
                                                            value="Delete" form="delete_khs_<?= $id['id'] ?>">
                                                    </div>
                                                    </form>
                                                    <!-- Tutup isi form -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- tutup delete KRS -->
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
    <!-- tutup KHS -->
    &nbsp;
    <!-- KRS -->
    <div class="col-sm">
        <div class="card shadow border-left-primary py-2">
            <div class="card-body">
                <div class="col mr-2">
                    <!-- isi -->
                    <!-- Page Title Header Starts-->
                    <div class="d-sm-flex justify-content-between align-items-center mb-3">
                        <div style="font-size: 18px;" class="text-dark mb-0">Data Kartu Rencana Studi</div>
                    </div>
                    <!-- Page Title Header Ends-->

                    <!-- tambah data -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah_krs">
                        Tambah Data KRS
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="tambah_krs" tabindex="-1" role="dialog" aria-labelledby="tambah_krs"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="tambah_krs">Tambah Data KHS</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Isi Form-->
                                    <form action="/upload_krs" method="POST" id="KRS" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <?php foreach ($id_mhs as $d) : ?>
                                        <input type="text" name="nama" form="KRS" value="<?= $d['nama']; ?>"
                                            hidden="true" />
                                        <?php endforeach; ?>
                                        <input type="text" name="id_mhs" form="KRS" value="<?= $lol; ?>"
                                            hidden="true" />
                                        <div class="form-group">
                                            <label for="semester">semester</label>
                                            <input type="text" class="form-control" name="semester" id="semester"
                                                placeholder="Semester KRS" form="KRS">
                                        </div>
                                        <div class="form-group">
                                            <label for="file">File KRS</label>
                                            <input type="file" accept="application/pdf" class="form-control" name="file"
                                                id="file" form="KRS">
                                            <span>File KRS (.PDF)</span>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <button type="submit" form="KRS" class="btn btn-sm btn-primary">Tambah</button>
                                </div>
                                </form>
                                <!-- Tutup isi form -->
                            </div>
                        </div>
                    </div>
                    <!-- tutup tambah data -->

                    <!-- Tables -->
                    <div class="table-responsive">
                        <table class="table table-bordered mt-4" style="color:black;">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">No</th>
                                    <th scope="col" style="text-align:center;">Semester</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; ?>
                                <?php foreach ($id_krs as $id) : ?>
                                <tr>
                                    <th scope="row" style="text-align: center;">
                                        <?= $a ?>
                                    </th>
                                    <td style="text-align:center;"><?= $id['semester']; ?></td>
                                    <td>
                                        <form action="/download_krs" method="post" id="download_krs">
                                            <?= csrf_field(); ?>
                                            <input type="text" name="nama" form="download_krs"
                                                <?php foreach ($id_mhs as $d) : ?> value="<?= $d['nama']; ?>"
                                                <?php endforeach; ?> hidden="true" />
                                            <button type="submit" class="btn btn-primary btn-sm" name="nama_file"
                                                value="<?= $id['file']; ?>" form="download_krs">
                                                <i class="fa fa-download"></i>
                                                <?= $id['file']; ?>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#update_krs<?= $a ?>">
                                            Update
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" style="color: none;" id="update_krs<?= $a ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="update_krs" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="update_khs">Update Data KRS</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Isi Form-->
                                                        <form action="/update_krs" method="POST"
                                                            id="update_krs_<?= $id['id'] ?>"
                                                            enctype="multipart/form-data">
                                                            <?= csrf_field(); ?>
                                                            <input type="text" name="nama"
                                                                form="update_krs_<?= $id['id'] ?>"
                                                                <?php foreach ($id_mhs as $d) : ?>
                                                                value="<?= $d['nama']; ?>" <?php endforeach; ?>
                                                                hidden="true" />
                                                            <input type="text" form="update_krs_<?= $id['id'] ?>"
                                                                name="id" value="<?= $id['id'] ?>" hidden="true" />
                                                            <div class="form-group">
                                                                <label for="Semester">Semester</label>
                                                                <input type="text" form="update_krs_<?= $id['id'] ?>"
                                                                    class="form-control" name="semester"
                                                                    value="<?= $id['semester'] ?>"
                                                                    placeholder="semester KRS">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="File">File KRS</label>
                                                                <input type="file" accept="application/pdf"
                                                                    form="update_krs_<?= $id['id'] ?>"
                                                                    class="form-control" name="file"
                                                                    value="<?= $id['file'] ?>">
                                                                <span>File KRS (.PDF)</span>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-sm btn-primary"
                                                            value="Update" form="update_krs_<?= $id['id'] ?>">
                                                    </div>
                                                    </form>
                                                    <!-- Tutup isi form -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- tutup update KHS -->

                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#delete_krs<?= $a ?>">
                                            Delete
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" style="color: none;" id="delete_krs<?= $a ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="delete_krs" aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="delete_krs">Delete Data KHS</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Isi Form-->
                                                        <form action="/delete_krs" method="POST"
                                                            id="delete_krs_<?= $id['id'] ?>"
                                                            enctype="multipart/form-data">
                                                            <?= csrf_field(); ?>
                                                            <input type="text" name="nama"
                                                                form="delete_krs_<?= $id['id'] ?>"
                                                                <?php foreach ($id_mhs as $d) : ?>
                                                                value="<?= $d['nama']; ?>" <?php endforeach; ?>
                                                                hidden="true" />
                                                            <input type="text" form="delete_krs_<?= $id['id'] ?>"
                                                                name="id" value="<?= $id['id'] ?>" hidden="true" />
                                                            <input type="text" form="delete_krs_<?= $id['id'] ?>"
                                                                name="file" value="<?= $id['file'] ?>" hidden="true" />
                                                            Apakah Anda Yakin?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-sm btn-danger"
                                                            value="Delete" form="delete_krs_<?= $id['id'] ?>">
                                                    </div>
                                                    </form>
                                                    <!-- Tutup isi form -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- tutup delete KRS -->
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
    <!-- Tutup KRS-->
    &nbsp;
    <!-- Prestasi -->
    <div class="col-sm">
        <div class="card shadow border-left-primary py-2">
            <div class="card-body">
                <div class="col mr-2">
                    <!-- isi -->
                    <!-- Page Title Header Starts-->
                    <div class="d-sm-flex justify-content-between align-items-center mb-3">
                        <div style="font-size: 18px;" class="text-dark mb-0">Data Prestasi</div>
                    </div>
                    <!-- Page Title Header Ends-->

                    <!-- tambah data -->
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                        data-target="#Tambah_prestasi<?= $a ?>">
                        Tambah Data Prestasi
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" style="color: none;" id="Tambah_prestasi<?= $a ?>" tabindex="-1"
                        role="dialog" aria-labelledby="Tambah_prestasi" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="Tambah_prTambah">Tambah Data
                                        Prestasi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <!-- Isi Form-->
                                    <form action="/upload_prestasi" method="POST" id="Tambah_prestasi"
                                        enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <?php foreach ($id_mhs as $d) : ?>
                                        <input type="text" name="nama" form="Tambah_prestasi" value="<?= $d['nama']; ?>"
                                            hidden="true" />
                                        <?php endforeach; ?>
                                        <input type="text" form="Tambah_prestasi" value="<?= $lol; ?>" name="id_mhs"
                                            hidden="true" />
                                        <div class="form-group">
                                            <label for="Nama Prestasi">Nama Prestasi</label>
                                            <input type="text" form="Tambah_prestasi" class="form-control" name="nama_p"
                                                placeholder="Nama Prestasi">

                                        </div>
                                        <div class="form-group">
                                            <label for="jenis Prestasi">Jenis Prestasi</label>
                                            <input type="text" form="Tambah_prestasi" class="form-control" name="jenis"
                                                placeholder="Jenis Prestasi">

                                        </div>
                                        <div class="form-group">
                                            <label for="Tingkat Prestasi">Tingkat
                                                Prestasi</label>
                                            <input type="text" form="Tambah_prestasi" class="form-control"
                                                name="tingkat" placeholder="Tingkat Prestasi">

                                        </div>
                                        <div class="form-group">
                                            <label for="File">File Prestasi</label>
                                            <input type="file" accept="application/pdf" form="Tambah_prestasi"
                                                class="form-control" name="file">
                                            <span>File Prestasi (.PDF)</span>
                                        </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary"
                                        data-dismiss="modal">Close</button>
                                    <input type="submit" class="btn btn-sm btn-primary" value="Tambah"
                                        form="Tambah_prestasi">
                                </div>
                                </form>
                                <!-- Tutup isi form -->
                            </div>
                        </div>
                    </div>
                    <!-- tutup UPLOAD Prestasi -->

                    <!-- Tables -->
                    <div class="table-responsive">
                        <table class="table table-bordered mt-4" style="color:black;">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">No</th>
                                    <th scope="col" style="text-align:center;">Nama Prestasi</th>
                                    <th scope="col">Jenis</th>
                                    <th scope="col">Tingkat</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $a = 1; ?>
                                <?php foreach ($prestasi as $id) : ?>
                                <tr>
                                    <th scope="row" style="text-align: center;">
                                        <?= $a ?>
                                    </th>
                                    <td style="text-align:center;"><?= $id['nama_p']; ?></td>
                                    <td style="text-align:center;"><?= $id['jenis']; ?></td>
                                    <td style="text-align:center;"><?= $id['tingkat']; ?></td>
                                    <td>
                                        <form action="/download_prestasi" method="post" id="download_prestasi">
                                            <?= csrf_field(); ?>
                                            <input type="text" name="nama" form="download_prestasi"
                                                <?php foreach ($id_mhs as $d) : ?> value="<?= $d['nama']; ?>"
                                                <?php endforeach; ?> hidden="true" />
                                            <button type="submit" class="btn btn-primary btn-sm" name="nama_file"
                                                value="<?= $id['file']; ?>" form="download_prestasi">
                                                <i class="fa fa-download"></i>
                                                <?= $id['file']; ?>
                                            </button>
                                        </form>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal"
                                            data-target="#update_prestasi<?= $a ?>">
                                            Update
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" style="color: none;" id="update_prestasi<?= $a ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="update_prestasi"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="update_prestasi">Update Data
                                                            Prestasi</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Isi Form-->
                                                        <form action="/update_prestasi" method="POST"
                                                            id="update_prestasi_<?= $id['id'] ?>"
                                                            enctype="multipart/form-data">
                                                            <?= csrf_field(); ?>
                                                            <input type="text" name="nama"
                                                                form="update_prestasi_<?= $id['id'] ?>"
                                                                <?php foreach ($id_mhs as $d) : ?>
                                                                value="<?= $d['nama']; ?>" <?php endforeach; ?>
                                                                hidden="true" />
                                                            <input type="text" form="update_prestasi_<?= $id['id'] ?>"
                                                                name="id" value="<?= $id['id'] ?>" hidden="true" />
                                                            <div class="form-group">
                                                                <label for="Nama Prestasi">Nama Prestasi</label>
                                                                <input type="text"
                                                                    form="update_prestasi_<?= $id['id'] ?>"
                                                                    class="form-control" name="nama_p"
                                                                    value="<?= $id['nama_p'] ?>"
                                                                    placeholder="Nama Prestasi">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="jenis Prestasi">Jenis Prestasi</label>
                                                                <input type="text"
                                                                    form="update_prestasi_<?= $id['id'] ?>"
                                                                    class="form-control" name="jenis"
                                                                    value="<?= $id['jenis'] ?>"
                                                                    placeholder="Jenis Prestasi">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="Tingkat Prestasi">Tingkat
                                                                    Prestasi</label>
                                                                <input type="text"
                                                                    form="update_prestasi_<?= $id['id'] ?>"
                                                                    class="form-control" name="tingkat"
                                                                    value="<?= $id['tingkat'] ?>"
                                                                    placeholder="Tingkat Prestasi">

                                                            </div>
                                                            <div class="form-group">
                                                                <label for="File">File Prestasi</label>
                                                                <input type="file" accept="application/pdf"
                                                                    form="update_prestasi_<?= $id['id'] ?>"
                                                                    class="form-control" name="file"
                                                                    value="<?= $id['file'] ?>">
                                                                <span>File Prestasi (.PDF)</span>
                                                            </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-sm btn-primary"
                                                            value="Update" form="update_prestasi_<?= $id['id'] ?>">
                                                    </div>
                                                    </form>
                                                    <!-- Tutup isi form -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- tutup update Prestasi -->

                                        <button type="button" class="btn btn-sm btn-danger" data-toggle="modal"
                                            data-target="#delete_prestasi<?= $a ?>">
                                            Delete
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" style="color: none;" id="delete_prestasi<?= $a ?>"
                                            tabindex="-1" role="dialog" aria-labelledby="delete_prestasi"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="delete_prestasi">Delete Data KHS
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- Isi Form-->
                                                        <form action="/delete_prestasi" method="POST"
                                                            id="delete_prestasi_<?= $id['id'] ?>"
                                                            enctype="multipart/form-data">
                                                            <?= csrf_field(); ?>
                                                            <input type="text" name="nama"
                                                                form="delete_prestasi_<?= $id['id'] ?>"
                                                                <?php foreach ($id_mhs as $d) : ?>
                                                                value="<?= $d['nama']; ?>" <?php endforeach; ?>
                                                                hidden="true" />
                                                            <input type="text" form="delete_prestasi_<?= $id['id'] ?>"
                                                                name="id" value="<?= $id['id'] ?>" hidden="true" />
                                                            <input type="text" form="delete_prestasi_<?= $id['id'] ?>"
                                                                name="file" value="<?= $id['file'] ?>" hidden="true" />
                                                            Apakah Anda Yakin?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-secondary"
                                                            data-dismiss="modal">Close</button>
                                                        <input type="submit" class="btn btn-sm btn-danger"
                                                            value="Delete" form="delete_prestasi_<?= $id['id'] ?>">
                                                    </div>
                                                    </form>
                                                    <!-- Tutup isi form -->
                                                </div>
                                            </div>
                                        </div>
                                        <!-- tutup delete Prestasi -->
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
    <!-- tutup Prestasi -->
    <?php $this->endSection(); ?>