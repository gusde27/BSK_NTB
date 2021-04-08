<?php

namespace App\Controllers;

use App\Models\MhsModel;
use App\Models\KhsModel;
use App\Models\KrsModel;
use App\Models\PtsModel;
use App\Models\PrestasiModel;
use CodeIgniter\Config\Config;

class MhsController extends BaseController
{

    public function index()
    {
        $mhsModel = new MhsModel();
        $ptsModel = new PtsModel();

        $lol = $mhsModel->where('id_pts', session()->get('id'))->get()->getResultArray();

        $profile = $ptsModel->where('id', session()->get('id'))->get()->getResultArray();

        $data = [
            'tittle' => 'Mahasiswa BMB',
            'mahasiswa' => $lol,
            'validation' => \Config\Services::validation(),
            'profile' => $profile
        ];

        return view('pts/mahasiswa', $data);
    }

    public function MhsUpdate()
    {
        // dd($this->request);
        //validation
        // if (!$this->validate([
        //     'id_pts' => 'required',
        //     'nama' => 'required',
        //     'jk' => 'required',
        //     'tempat_lahir' => 'required',
        //     'tanggal_lahir' => 'required',
        //     'alamat' => 'required',
        //     'no_hp' => 'required',
        //     'email' => 'required'
        // ])) {

        //     $validation = \Config\Services::validation();

        //     session()->setFlashdata('pesan', 'Data Mahasiswa gagal diupdate!');

        //     return redirect()->to('detail')->withInput()->with('validation', $validation);
        // }

        $mhsModel = new MhsModel();

        $id = $this->request->getVar('id');

        $mhsModel->save([
            'id' => $id,
            'id_pts' => session()->get('id'),
            //'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'jurusan' => $this->request->getVar('jurusan'),
            'jk' => $this->request->getVar('jk'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
            'email' => $this->request->getVar('email')
        ]);

        session()->setFlashdata('mahasiswa', 'Data Mahasiswa Berhasil diupdate!');

        return redirect()->back();
        return redirect()->to('detail');
    }

    public function MhsUpdateFoto()
    {

        $mhsModel = new MhsModel();

        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $foto = $this->request->getFile('foto_profile');

        $foto->move('file/pt/foto_profile/', 'foto_' . $nama . '.' . $foto->getExtension(), true);

        $mhsModel->save([
            'id' => $id,
            'foto' => 'foto_' . $nama . '.' . $foto->getExtension()
        ]);

        session()->setFlashdata('mahasiswa', 'Data Mahasiswa Berhasil diupdate!');

        return redirect()->back();
        return redirect()->to('detail');
    }

    public function detail($id)
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

        $data = [
            'tittle' => 'Mahasiswa BMB',
            'id_mhs' => $mhs,
            'id_khs' => $khs,
            'id_krs' => $krs,
            'prestasi' => $prestasi,
            'lol' => $id,
            'profile' => $profile
        ];

        return view('pts/detail', $data);
    }

    public function save()
    {
        // dd($this->request);
        //validation
        if (!$this->validate([
            'nama' => 'required',
            'nim' => 'required',
            'jurusan' => 'required',
            'jk' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
            'email' => 'required'
        ])) {

            $validation = \Config\Services::validation();

            session()->setFlashdata('pesan', 'Data gagal ditambahkan!');

            return redirect()->to('mahasiswa')->withInput()->with('validation', $validation);
        }

        $mhsModel = new MhsModel();

        $pts = session()->get('nama_pts');
        $slug = session()->get('slug');

        $mhsModel->save([
            'id_pts' => session()->get('id'),
            'nama' => $this->request->getVar('nama'),
            'nim' => $this->request->getVar('nim'),
            'jurusan' => $this->request->getVar('jurusan'),
            'jk' => $this->request->getVar('jk'),
            'tempat_lahir' => $this->request->getVar('tempat_lahir'),
            'tanggal_lahir' => $this->request->getVar('tanggal_lahir'),
            'alamat' => $this->request->getVar('alamat'),
            'no_hp' => $this->request->getVar('no_hp'),
            'email' => $this->request->getVar('email'),
            'pts' => $pts,
            'slug' => $slug
        ]);

        session()->setFlashdata('pesan', 'Data Mahasiswa Berhasil ditambahkan!');
        
        return redirect()->to('mahasiswa');

        //return view('pts/pts/mahasiswa');
    }

    public function KhsUpload()
    {
        
        $khsModel = new KhsModel();

        $semester = $this->request->getVar('semester');
        $fileKHS = $this->request->getFile('file');
        $fileKHS->move('' . session()->get('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/khs/', 'khs_semester_' . $semester . '_' . $this->request->getVar('nama') . '.' . $fileKHS->getExtension(), true);

        $id_mhs = $this->request->getVar('id_mhs');
        $id_pts = session()->get('id');

        $khsModel->save([
            'id_pts' => $id_pts,
            'id_mhs' => $id_mhs,
            'semester' => $semester,
            'ip' => $this->request->getVar('ip'),
            'file' => 'khs_semester_' . $semester . '_' . $this->request->getVar('nama') . '.' . $fileKHS->getExtension()
        ]);

        session()->setFlashdata('pesan', 'Data KHS Berhasil ditambahkan!');
        return redirect()->back();
    }

    //DOWNLOAD
    public function KhsDownload()
    {
        $file = $this->request->getVar('nama_file');
        $path = '' . session()->get('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/khs/' . $file;
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
        $path = '' . session()->get('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/krs/' . $file;
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
        $path = '' . session()->get('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/prestasi/' . $file;
        if (file_exists($path)) {
            http_response_code(200);
            header('Content-Length: ' . filesize($path));
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . $file . '"');
            readfile($path);
            exit;
        }
    }

    //TUTUP DOWNLOAD

    public function KhsUpdate()
    {

        if ($this->request->getFile('file') != '') {

            $khsModel = new KhsModel();
            $semester = $this->request->getVar('semester');
            $id = $this->request->getVar('id');

            $this->request->getFile('file')->move('' . session()->get('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/khs/', 'khs_semester_' . $semester . '_' . $this->request->getVar('nama') . '.' . $this->request->getFile('file')->getExtension(), true);

            $khsModel->save([
                'id' => $id,
                'semester' => $semester,
                'ip' => $this->request->getVar('ip'),
                'file' => 'khs_semester_' . $semester . '_' . $this->request->getVar('nama') . '.' . $this->request->getFile('file')->getExtension()
            ]);

            session()->setFlashdata('pesan', 'Data KHS Berhasil diupdate!');

            return redirect()->back();
            return redirect()->to('detail');
        } else {

            $khsModel = new KhsModel();
            $semester = $this->request->getVar('semester');
            $id = $this->request->getVar('id');

            $khsModel->save([
                'id' => $id,
                'semester' => $semester,
                'ip' => $this->request->getVar('ip')
            ]);

            session()->setFlashdata('pesan', 'Data KHS Berhasil diupdate!');

            return redirect()->back();
            return redirect()->to('detail');
        }
    }

    public function KhsDelete()
    {
        $khsModel = new KhsModel();
        $file = $this->request->getVar('id');
        $namaFILE = $this->request->getVar('file');
        $khsModel->delete($this->request->getVar('id'));
        unlink('' . session()->get('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/khs/' . $namaFILE);

        session()->setFlashdata('pesan', 'Data KHS Berhasil dihapus');

        return redirect()->back();
    }


    //KRS
    public function KrsUpload()
    {
        $krsModel = new KrsModel();

        $fileKHS = $this->request->getFile('file');
        $semester = $this->request->getVar('semester');
        $id_mhs = $this->request->getVar('id_mhs');

        $id_pts = session()->get('id');

        $fileKHS->move('' . session()->get('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/krs/', 'krs_semester_' . $semester . '_' . $this->request->getVar('nama') . '.' . $fileKHS->getExtension(), true);

        $krsModel->save([
            'id_pts' => $id_pts,
            'id_mhs' => $id_mhs,
            'semester' => $semester,
            'file' => 'krs_semester_' . $semester . '_' . $this->request->getVar('nama') . '.' . $fileKHS->getExtension()
        ]);

        session()->setFlashdata('pesan', 'Data KRS Berhasil ditambahkan!');

        return redirect()->back();
    }

    public function KrsUpdate()
    {
        if ($this->request->getFile('file') != '') {

            $krsModel = new KrsModel();

            $semester = $this->request->getVar('semester');
            $id = $this->request->getVar('id');

            $this->request->getFile('file')->move('' . session()->get('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/krs/', 'krs_semester_' . $semester . '_' . $this->request->getVar('nama') . '.' . $this->request->getFile('file')->getExtension(), true);

            $krsModel->save([
                'id' => $id,
                'semester' => $semester,
                'file' => 'krs_semester_' . $semester . '_' . $this->request->getVar('nama') . '.' . $this->request->getFile('file')->getExtension()
            ]);

            session()->setFlashdata('pesan', 'Data KRS Berhasil diupdate!');

            return redirect()->back();
            return redirect()->to('detail');
        } else {

            $krsModel = new KrsModel();

            $semester = $this->request->getVar('semester');
            $id = $this->request->getVar('id');

            $krsModel->save([
                'id' => $id,
                'semester' => $semester
            ]);

            session()->setFlashdata('pesan', 'Data KRS Berhasil diupdate!');

            return redirect()->back();
            return redirect()->to('detail');
        }
    }

    public function KrsDelete()
    {
        $krsModel = new KrsModel();

        $namaFIle = $this->request->getVar('file');
        $krsModel->delete($this->request->getVar('id'));
        unlink('' . session()->get('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/krs/' . $namaFIle);

        session()->setFlashdata('pesan', 'Data KRS Berhasil dihapus!');

        return redirect()->back();
    }

    //KRS
    public function PrestasiUpload()
    {
        $PrestasiModel = new PrestasiModel();

        $fileKHS = $this->request->getFile('file');
        $nama_p = $this->request->getVar('nama_p');
        $jenis = $this->request->getVar('jenis');
        $tingkat = $this->request->getVar('tingkat');
        $id_mhs = $this->request->getVar('id_mhs');

        $id_pts = session()->get('id');

        $fileKHS->move('' . session()->get('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/prestasi/', 'Prestasi_' . $nama_p . '_' . $this->request->getVar('nama') . '.' . $fileKHS->getExtension(), true);

        $PrestasiModel->save([
            'id_pts' => $id_pts,
            'id_mhs' => $id_mhs,
            'nama_p' => $nama_p,
            'jenis' => $jenis,
            'tingkat' => $tingkat,
            'file' => 'Prestasi_' . $nama_p . '_' . $this->request->getVar('nama') . '.' . $fileKHS->getExtension()
        ]);

        session()->setFlashdata('pesan', 'Data Prestasi Berhasil ditambahkan!');

        return redirect()->back();
    }

    public function PrestasiUpdate()
    {
        if ($this->request->getFile('file') != '') {

            $PrestasiModel = new PrestasiModel();

            $nama_p = $this->request->getVar('nama_p');
            $jenis = $this->request->getVar('jenis');
            $tingkat = $this->request->getVar('tingkat');

            $id = $this->request->getVar('id');

            $this->request->getFile('file')->move('' . session()->get('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/prestasi/', 'Prestasi_' . $nama_p . '_' . $this->request->getVar('nama') . '.' . $this->request->getFile('file')->getExtension(), true);

            $PrestasiModel->save([
                'id' => $id,
                'nama_p' => $nama_p,
                'jenis' => $jenis,
                'tingkat' => $tingkat,
                'file' => 'Prestasi_' . $nama_p . '_' . $this->request->getVar('nama') . '.' . $this->request->getFile('file')->getExtension()
            ]);

            session()->setFlashdata('pesan', 'Data KRS Berhasil diupdate!');

            return redirect()->back();
            return redirect()->to('detail');
        } else {

            $PrestasiModel = new PrestasiModel();

            $nama_p = $this->request->getVar('nama_p');
            $jenis = $this->request->getVar('jenis');
            $tingkat = $this->request->getVar('tingkat');

            $id = $this->request->getVar('id');

            $PrestasiModel->save([
                'id' => $id,
                'nama_p' => $nama_p,
                'jenis' => $jenis,
                'tingkat' => $tingkat
            ]);

            session()->setFlashdata('pesan', 'Data KRS Berhasil diupdate!');

            return redirect()->back();
            return redirect()->to('detail');
        }
    }

    public function PrestasiDelete()
    {
        $PrestasiModel = new PrestasiModel();
        $file = $this->request->getVar('id');
        $namaFIle = $this->request->getVar('file');
        $PrestasiModel->delete($this->request->getVar('id'));
        unlink('' . session()->get('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama') . '/prestasi/' . $namaFIle);

        session()->setFlashdata('pesan', 'Data Prestasi Berhasil dihapus!');

        return redirect()->back();
    }

    public function Delete_Mahasiswa()
    {
        helper('filesystem');
        
        $mhsModel = new MhsModel();
        $khsModel = new KhsModel();
        $krsModel = new KrsModel();
        $prestasiModel = new PrestasiModel();

        $id_mhs = $this->request->getVar('id');

        $mhsModel->delete($this->request->getVar('id'));
        $khsModel->where('id_mhs', $id_mhs)->delete();
        $krsModel->where('id_mhs', $id_mhs)->delete();
        $prestasiModel->where('id_mhs', $id_mhs)->delete();
        
        $dir = session()->get('nama_pts') . '/mahasiswa/' . $this->request->getVar('nama');

        if($this->request->getVar('foto') == '' && !is_dir($dir)){
            
            session()->setFlashdata('pesan', 'Data Mahasiswa Berhasil dihapus!');
            
            return redirect()->back();
        } 
        elseif(is_dir($dir) && $this->request->getVar('foto') != '')
        {
            delete_files($dir, TRUE);
            
            $dir_foto = 'file/pt/foto_profile/' . $this->request->getVar('foto') . '';
            unlink($dir_foto);
            
            rmdir($dir);

            session()->setFlashdata('pesan', 'Data Mahasiswa Berhasil dihapus!');
            
            return redirect()->back();
        }
        elseif(!is_dir($dir) && $this->request->getVar('foto') != '')
        {
            $dir_foto = 'file/pt/foto_profile/' . $this->request->getVar('foto') . '';
            unlink($dir_foto);

            session()->setFlashdata('pesan', 'Data Mahasiswa Berhasil dihapus!');
            
            return redirect()->back();
        }
        elseif(is_dir($dir) && $this->request->getVar('foto') == '')
        {
            delete_files($dir, TRUE);
            
            rmdir($dir);

            session()->setFlashdata('pesan', 'Data Mahasiswa Berhasil dihapus!');
            
            return redirect()->back();
        }
        
    }
}