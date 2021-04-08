<?php $this->extend('layout/admin'); ?>


<?php $this->section('search'); ?>

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
                        <?php if (session()->getFlashdata('pesan')) : ?>
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            <?= session()->getFlashdata('pesan'); ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <?php endif; ?>
                        <!-- isi -->
                        <form action="/" method="POST" id="update_mhs">
                            <?= csrf_field(); ?>
                            <?php //foreach ($profile as $pro) : 
                            ?>
                            <?php foreach ($id_mhs as $d) : ?>
                            <input type="text" name="id" value="<?= $d['id'] ?>" hidden="true" />
                            <div class="form-group">
                                <label for="nama">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap"
                                    form="update_mhs" value="<?= $d['nama']; ?>">
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
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-control" id="jk" name="jk" form="update_mhs">
                                    <option value="<?= $d['jk']; ?>"><?= $d['jk'] ?></option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuasn</option>
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
                        Foto Mahasiswa (<?= $d['nama']; ?>)
                        <?php endforeach; ?>

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
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <div style="font-size: 18px;" class="text-dark mb-0">Data Kartu Hasil Studi</div>
                    </div>
                    <!-- Page Title Header Ends-->

                    <!-- Tables -->
                    <div class="table-responsive">
                        <table class="table table-bordered mt-4" style="color:black;">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">No</th>
                                    <th scope="col" style="text-align:center;">Semester</th>
                                    <th scope="col" style="text-align:center;">IP</th>
                                    <th scope="col">File</th>
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
                                        <form action="/download_khs_admin" method="post" id="download_khs">
                                            <?= csrf_field(); ?>
                                            <input type="text" <?php foreach ($kampus as $k) : ?>
                                                value="<?= $k['nama']; ?>" <?php endforeach; ?> name="nama_pts"
                                                form="download_khs" hidden="true">
                                            <input type="text" <?php foreach ($id_mhs as $mhs) : ?>
                                                value="<?= $mhs['nama']; ?>" <?php endforeach; ?> name="nama"
                                                form="download_khs" hidden="true">
                                            <button type="submit" form="download_khs" class="btn btn-primary btn-sm"
                                                name="nama_file" value="<?= $id['file']; ?>">
                                                <i class="fa fa-download"></i>
                                                <?= $id['file']; ?>
                                            </button>
                                        </form>
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
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <div style="font-size: 18px;" class="text-dark mb-0">Data Kartu Rencana Studi</div>
                    </div>
                    <!-- Page Title Header Ends-->

                    <!-- Tables -->
                    <div class="table-responsive">
                        <table class="table table-bordered mt-4" style="color:black;">
                            <thead>
                                <tr>
                                    <th scope="col" style="text-align:center;">No</th>
                                    <th scope="col" style="text-align:center;">Semester</th>
                                    <th scope="col">File</th>
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
                                        <form action="/download_krs_admin" method="post" id="download_krs">
                                            <?= csrf_field(); ?>
                                            <input type="text" <?php foreach ($kampus as $k) : ?>
                                                value="<?= $k['nama']; ?>" <?php endforeach; ?> name="nama_pts"
                                                form="download_krs" hidden="true">
                                            <input type="text" <?php foreach ($id_mhs as $mhs) : ?>
                                                value="<?= $mhs['nama']; ?>" <?php endforeach; ?> name="nama"
                                                form="download_krs" hidden="true">
                                            <button type="submit" form="download_krs" class="btn btn-primary btn-sm"
                                                name="nama_file" value="<?= $id['file']; ?>">
                                                <i class="fa fa-download"></i>
                                                <?= $id['file']; ?>
                                            </button>
                                        </form>
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
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <div style="font-size: 18px;" class="text-dark mb-0">Data Prestasi</div>
                    </div>
                    <!-- Page Title Header Ends-->

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
                                        <form action="/download_prestasi_admin" method="post" id="download_prestasi">
                                            <?= csrf_field(); ?>
                                            <input type="text" <?php foreach ($kampus as $k) : ?>
                                                value="<?= $k['nama']; ?>" <?php endforeach; ?> name="nama_pts"
                                                form="download_prestasi" hidden="true">
                                            <input type="text" <?php foreach ($id_mhs as $mhs) : ?>
                                                value="<?= $mhs['nama']; ?>" <?php endforeach; ?> name="nama"
                                                form="download_prestasi" hidden="true">
                                            <button type="submit" form="download_prestasi"
                                                class="btn btn-primary btn-sm" name="nama_file"
                                                value="<?= $id['file']; ?>">
                                                <i class="fa fa-download"></i>
                                                <?= $id['file']; ?>
                                            </button>
                                        </form>
                                    </td>
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