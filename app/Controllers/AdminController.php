<?php

namespace App\Controllers;

use App\Models\PtsModel;
use App\Models\MhsModel;
use App\Models\BeritaModel;
use App\Models\KrsModel;
use App\Models\KhsModel;
use App\Models\PesanModel;
use App\Models\PrestasiModel;

class AdminController extends BaseController
{
    public function index()
    {

        $ptsModel = new PtsModel();
        $profile = $ptsModel->where('id', session()->get('id'))->get()->getResultArray();

        $data = [
            'tittle' => 'Admin Dasboard BMB',
            'profile' => $profile
        ];

        return view('admin/dashboard-admin', $data);
    }

    public function pts()
    {

        $validation = \Config\Services::validation();

        $ptsModel = new PtsModel();
        $profile = $ptsModel->where('id', session()->get('id'))->get()->getResultArray();

        $pts = $ptsModel->where('level', 'pts')->findAll();

        $data = [
            'tittle' => 'Data Perguruan Tinggi',
            'profile' => $profile,
            'pts' => $pts,
            'validation' => $validation
        ];

        return view('admin/pts-admin', $data);
    }

    public function massage()
    {

        $ptsModel = new PtsModel();
        $profile = $ptsModel->where('id', session()->get('id'))->get()->getResultArray();

        $pesanModel = new PesanModel();
        $pesan = $pesanModel->findAll();

        $data = [
            'tittle' => 'Massage BMB',
            'profile' => $profile,
            'pesan' => $pesan
        ];

        return view('admin/massage-admin', $data);
    }

    public function DataMHS($id)
    {

        $ptsModel = new PtsModel();
        $profile = $ptsModel->where('id', session()->get('id'))->get()->getResultArray();

        $mhsModel = new MhsModel();
        $mahasiswa = $mhsModel->where('id_pts', $id)->get()->getResultArray();
        $mhs = $ptsModel->where('id', $id)->get()->getResultArray();

        $data = [
            'tittle' => 'Mahasiswa Perguruan Tinggi',
            'profile' => $profile,
            'mahasiswa' => $mahasiswa,
            'MHS' => $mhs,
            'kampus' => $id
        ];

        return view('admin/data-mhs-admin', $data);
    }

    public function DataRECENT($id)
    {

        $ptsModel = new PtsModel();
        $profile = $ptsModel->where('id', session()->get('id'))->get()->getResultArray();
        $pts = $ptsModel->where('id', $id)->get()->getResultArray();

        $beritaModel = new BeritaModel();
        $news = $beritaModel->where('id_pts', $id)->get()->getResultArray();

        $data = [
            'tittle' => 'Berita Perguruan Tingii',
            'profile' => $profile,
            'pts' => $pts,
            'news' => $news
        ];

        return view('admin/data-recent-admin', $data);
    }


    //post
    public function AdminUpdate()
    {
        $AdminModel = new PtsModel();

        $id = $this->request->getVar('id');
        $jenis = 'Admin';
        $admin = 'Admin';

        $AdminModel->save([
            'id' => $id,
            'nama' => $this->request->getVar('nama_pt'),
            'jenis' => $jenis,
            'deskripsi' => $admin,
            'alamat' => $this->request->getVar('alamat_pt')
        ]);

        session()->setFlashdata('pts', 'Data Admin Berhasil diupdate!');

        return redirect()->to('dashboard-admin');
    }

    public function AdminUpdateFoto()
    {
        $ptsModel = new PtsModel();

        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $foto = $this->request->getFile('foto_admin');

        $foto->move('file/pt/foto_pts/', 'ADMIN_foto_' . $nama . '.' . $foto->getExtension(), true);

        $ptsModel->save([
            'id' => $id,
            'foto' => 'Admin_foto_' . $nama . '.' . $foto->getExtension()
        ]);

        session()->setFlashdata('pts', 'Foto Admin Berhasil diupdate!');

        return redirect()->back();
        return redirect()->to('dashboard-admin');
    }


    public function TambahPTS()
    {
        $AdminModel = new PtsModel();

        $username = $this->request->getVar('user');
        $pass = $this->request->getVar('pass');

        $password = password_hash($pass, PASSWORD_BCRYPT);

        $nama = $this->request->getVar('nama');
        $slug = url_title($this->request->getVar('nama'), '-', true);
        $level = 'pts';

        $AdminModel->save([
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'slug' => $slug,
            'level' => $level
        ]);

        session()->setFlashdata('pts', 'Data Perguruan Tinggi Berhasil ditambah!');

        return redirect()->to('pts-admin');
    }

    public function UpdatePTS()
    {
        $AdminModel = new PtsModel();

        $id = $this->request->getVar('id');
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $nama = $this->request->getVar('nama');
        $jenis = $this->request->getVar('jenis');
        $deskripsi = $this->request->getVar('deskripsi');
        $alamat = $this->request->getVar('alamat');
        $link = $this->request->getVar('link');

        $AdminModel->save([
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'jenis' => $jenis,
            'deskripsi' => $deskripsi,
            'alamat' => $alamat,
            'link' => $link,
        ]);

        session()->setFlashdata('pesan', 'Data Perguruan Tinggi Berhasil diubah!');

        return redirect()->to('pts-admin');
    }

    public function DeletePTS()
    {
        helper('filesystem');
        
        $ptsModel = new PtsModel();
        $mhsModel = new MhsModel();
        $khsModel = new KhsModel();
        $krsModel = new KrsModel();
        $prestasiModel = new PrestasiModel();

        $id_pts = $this->request->getVar('id');
        $dir = $this->request->getVar('nama_pts');

        $ptsModel->delete($this->request->getVar('id'));
        $mhsModel->where('id_pts', $id_pts)->delete();
        $khsModel->where('id_pts', $id_pts)->delete();
        $krsModel->where('id_pts', $id_pts)->delete();
        $prestasiModel->where('id_pts', $id_pts)->delete();

        if($this->request->getVar('foto') == '' && !is_dir($dir)){
            
            session()->setFlashdata('pesan', 'Data Mahasiswa Berhasil dihapus!');
            
            return redirect()->back();
        } 
        elseif(is_dir($dir) && $this->request->getVar('foto') != '')
        {
            delete_files($dir, TRUE);
            
            $dir_foto = 'file/pt/foto_pts/' . $this->request->getVar('foto') . '';
            unlink($dir_foto);
            
            rmdir($dir);

            session()->setFlashdata('pesan', 'Data Mahasiswa Berhasil dihapus!');
            
            return redirect()->back();
        }
        elseif(!is_dir($dir) && $this->request->getVar('foto') != '')
        {
            $dir_foto = 'file/pt/foto_pts/' . $this->request->getVar('foto') . '';
            unlink($dir_foto);

            session()->setFlashdata('pesan', 'Data Mahasiswa Berhasil dihapus!');
            
            return redirect()->back();
        }
        elseif(is_dir($dir) && $this->request->getVar('foto') == '')
        {
            delete_files($dir, TRUE);
            rmdir($dir);

            session()->setFlashdata('pesan', 'Data Perguruan Tinggi Berhasil dihapus!');
            
            return redirect()->back();
        }
    }

    public function DeleteBERITA()
    {
        $beritaModel = new BeritaModel();
        $id = $this->request->getVar('id');
        $foto = $this->request->getVar('foto');

        $beritaModel->delete($id);
        unlink('file/pt/foto_berita/' . $foto);

        session()->setFlashdata('pts', 'Data Berita Berhasil dihapus');

        return redirect()->back();
    }

    //Mahasiswa
    public function MhsDetail($id_pts, $id)
    {
        $mhsModel = new MhsModel();
        $khsModel = new KhsModel();
        $krsModel = new KrsModel();
        $ptsModel = new PtsModel();
        $PrestasiModel = new PrestasiModel();

        $khs = $khsModel->where('id_mhs', $id)->get()->getResultArray();
        $mhs = $mhsModel->where('id', $id)->get()->getResultArray();
        $krs = $krsModel->where('id_mhs', $id)->get()->getResultArray();
        $prestasi = $PrestasiModel->where('id_mhs', $id)->get()->getResultArray();

        $profile = $ptsModel->where('id', session()->get('id'))->get()->getResultArray();

        $kampus = $ptsModel->where('id', $id_pts)->get()->getResultArray();

        $data = [
            'tittle' => 'Mahasiswa Perguruan Tinggi Admin',
            'id_mhs' => $mhs,
            'id_khs' => $khs,
            'id_krs' => $krs,
            'prestasi' => $prestasi,
            'lol' => $id,
            'profile' => $profile,
            'kampus' => $kampus
        ];

        return view('admin/detail-mhs-admin', $data);
    }

    //massage
    public function massageDelete()
    {
        $pesanModel = new PesanModel();
        $id = $this->request->getVar('id');

        $pesanModel->delete($id);

        session()->setFlashdata('pesan', 'Data Pesan Berhasil dihapus');

        return redirect()->back();
    }

    public function massageBalas()
    {

        $emaildia = $this->request->getVar('email');
        $balas = $this->request->getVar('balas');
        $pesan = $this->request->getVar('pesan');

        $email = \Config\Services::email();

        $email->setFrom('gusdechang24@gmail.com', 'Admin BMB');
        $email->setTo($emaildia);

        $email->setSubject('Beasiswa Miskin Berprestasi');
        $email->setMessage('<h1>Admin Beasiswa Miskin Berprestasi</h1> <b>Berikut pesan anda :</b> ' . $pesan . '<b> Berikut Balasan dari pesan anda :</b> ' . $balas . '');

        if ($email->send()) {
            session()->setFlashdata('pesan', 'Data Pesan Berhasil dikirim');
        } else {
            session()->setFlashdata('pesan', 'Data Pesan gagal dikirim, pastikan mengnonaktifkan keamanan untuk semestara waktu di akun Gmail');
        }

        return redirect()->back();
    }

    //DOWNLOAD
    public function KhsDownload()
    {
        $file = $this->request->getVar('nama_file');
        $path = '' . $this->request->getVar('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/khs/' . $file;
        if (file_exists($path)) {
            http_response_code(200);
            header('Content-Length: ' . filesize($path));
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $file . '"');
            readfile($path);
            exit;
        }
    }

    public function KrsDownload()
    {
        $file = $this->request->getVar('nama_file');
        $path = '' . $this->request->getVar('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/krs/' . $file;
        if (file_exists($path)) {
            http_response_code(200);
            header('Content-Length: ' . filesize($path));
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $file . '"');
            readfile($path);
            exit;
        }
    }

    public function PrestasiDownload()
    {
        $file = $this->request->getVar('nama_file');
        $path = '' . $this->request->getVar('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/prestasi/' . $file;
        if (file_exists($path)) {
            http_response_code(200);
            header('Content-Length: ' . filesize($path));
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $file . '"');
            readfile($path);
            exit;
        }
    }

}