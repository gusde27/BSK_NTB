<?php

namespace App\Controllers;

use App\Models\PtsModel;
use App\Models\BeritaModel;

class PtsController extends BaseController
{

    public function index()
    {
        $ptsModel = new PtsModel();
        $lol = $ptsModel->where('id', session()->get('id'))->get()->getResultArray();

        $data = [
            'tittle' => 'Admin PTS BMB',
            'profile' => $lol
        ];

        return view('pts/dashboard', $data);
    }

    public function setting()
    {
        $ptsModel = new PtsModel();
        $lol = $ptsModel->where('id', session()->get('id'))->get()->getResultArray();

        $data = [
            'tittle' => 'Admin PTS BMB',
            'profile' => $lol
        ];

        return view('pts/setting', $data);
    }

    //UPDATE PASSWORD
    public function update_pass()
    {   

        $ptsModel = new PtsModel();

        $old_pass = password_verify($this->request->getVar('old_pass'), session()->get('password'));

        if($old_pass == session()->get('password')) {

            $new_pass = $this->request->getVar('new_pass');
            $new_pass2 = $this->request->getVar('new_pass2');
                
            if($new_pass == $new_pass2) {
        
                $ptsModel->save([
                    'id' => session()->get('id'),
                    'password' => password_hash($new_pass, PASSWORD_BCRYPT)
                ]);
        
                session()->setFlashdata('pts', 'Password Berhasil diupdate! Silahkan Logout jika ingin mengganti password lagi');

                return redirect()->to('setting');
            } else {
                session()->setFlashdata('pts', 'Pastikan Memasukan Password Yang Sama');

                return redirect()->to('setting');
            }

        } else {
            session()->setFlashdata('pts', 'Password Lama Tidak Sesuai!');

            return redirect()->to('setting');
        }
    }

    //BERITA
    public function berita()
    {
        $beritaModel = new BeritaModel();
        $ptsModel = new PtsModel();

        $berita = $beritaModel->where('id_pts', session()->get('id'))->get()->getResultArray();
        $profile = $ptsModel->where('id', session()->get('id'))->get()->getResultArray();

        $data = [
            'tittle' => 'Admin PTS BMB',
            'profile' => $profile,
            'berita' => $berita,
            'id' => session()->get('id')
        ];

        return view('pts/berita', $data);
    }

    public function beritaTambah()
    {
        // dd($this->request);
        //validation
        $validation = \Config\Services::validation();

        if (!$this->validate([
            'judul' => 'required',
            'deskripsi' => 'required'
        ])) {

            session()->setFlashdata('pesan', 'Data Berita gagal ditambahkan!');

            return redirect()->to('berita')->withInput()->with('validation', $validation);
        }

        $beritaModel = new BeritaModel();

        $judul = $this->request->getVar('judul');
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $nama = session()->get('nama_pts');

        $fileFoto = $this->request->getFile('foto');
        $fileFoto->move('file/pt/foto_berita/', 'Berita_' . $nama . '_' . $judul . '.' . $fileFoto->getExtension(), true);

        $id_pts = session()->get('id');
        $pts = session()->get('nama_pts');

        $beritaModel->save([
            'id_pts' => $id_pts,
            'judul' => $judul,
            'slug' => $slug,
            'pts' => $pts,
            'deskripsi' => $this->request->getVar('deskripsi'),
            'foto' => 'Berita_' . $nama . '_' . $judul . '.' . $fileFoto->getExtension()
        ]);

        session()->setFlashdata('pesan', 'Data Berita Berhasil ditambahkan!');

        return redirect()->to('berita')->with('validation', $validation);
    }

    public function beritaUpdate()
    {
        // dd($this->request);
        //validation
        $validation = \Config\Services::validation();

        // if (!$this->validate([
        //     'judul' => 'required',
        //     'deskripsi' => 'required',
        //     'foto' => 'required'
        // ])) {

        //     session()->setFlashdata('pesan', 'Data Berita gagal diubah!');

        //     return redirect()->to('berita')->withInput()->with('validation', $validation);
        // }
        if ($this->request->getFile('foto') != '') {

            $beritaModel = new BeritaModel();

            $id_berita = $this->request->getVar('id_berita');
            $judul = $this->request->getVar('judul');
            $slug = url_title($this->request->getVar('judul'), '-', true);
            $nama = session()->get('nama_pts');

            $fileFoto = $this->request->getFile('foto');
            $fileFoto->move('file/pt/foto_berita/', 'Berita_' . $nama . '_' . $judul . '.' . $fileFoto->getExtension(), true);

            $id_pts = session()->get('id');
            $pts = session()->get('nama_pts');

            $beritaModel->save([
                'id' => $id_berita,
                'id_pts' => $id_pts,
                'judul' => $judul,
                'slug' => $slug,
                'pts' => $pts,
                'deskripsi' => $this->request->getVar('deskripsi'),
                'foto' => 'Berita_' . $nama . '_' . $judul . '.' . $fileFoto->getExtension()
            ]);

            session()->setFlashdata('pesan', 'Data Berita Berhasil diubah!');

            return redirect()->to('berita')->with('validation', $validation);
        } else {

            $beritaModel = new BeritaModel();

            $id_berita = $this->request->getVar('id_berita');
            $judul = $this->request->getVar('judul');
            $slug = url_title($this->request->getVar('judul'), '-', true);
            $nama = session()->get('nama_pts');

            $id_pts = session()->get('id');
            $pts = session()->get('nama_pts');

            $beritaModel->save([
                'id' => $id_berita,
                'id_pts' => $id_pts,
                'judul' => $judul,
                'slug' => $slug,
                'pts' => $pts,
                'deskripsi' => $this->request->getVar('deskripsi')
            ]);

            session()->setFlashdata('pesan', 'Data Berita Berhasil diubah!');

            return redirect()->to('berita')->with('validation', $validation);
        }
    }

    public function beritaDelete()
    {
        $beritaModel = new BeritaModel();
        $file = $this->request->getVar('id_berita');
        $namaFoto = $this->request->getVar('foto');
        $beritaModel->delete($file);
        unlink('file/pt/foto_berita/' . $namaFoto);

        session()->setFlashdata('pesan', 'Data Berita Berhasil dihapus');

        return redirect()->back();
    }



    //TUTUP BERITA

    public function PtsUpdate()
    {
        $ptsModel = new PtsModel();

        $id = $this->request->getVar('id');

        $ptsModel->save([
            'id' => $id,
            //'nama' => $this->request->getVar('nama_pt'),
            'jenis' => $this->request->getVar('jenis_pt'),
            'deskripsi' => $this->request->getVar('deskripsi_pt'),
            'alamat' => $this->request->getVar('alamat_pt'),
            'link' => $this->request->getVar('link')
        ]);

        session()->setFlashdata('pts', 'Data PTS Berhasil diupdate!');

        return redirect()->to('dashboard');
    }

    public function PtsUpdateFoto()
    {
        $ptsModel = new PtsModel();

        $id = $this->request->getVar('id');
        $nama = $this->request->getVar('nama');
        $foto = $this->request->getFile('foto_pts');

        $foto->move('file/pt/foto_pts/', 'PTS_foto_' . $nama . '.' . $foto->getExtension(), true);

        $ptsModel->save([
            'id' => $id,
            'foto' => 'PTS_foto_' . $nama . '.' . $foto->getExtension()
        ]);

        session()->setFlashdata('pts', 'Data PTS Berhasil diupdate!');

        return redirect()->back();
        return redirect()->to('dashboard');
    }
}