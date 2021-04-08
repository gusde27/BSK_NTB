<?php

namespace App\Controllers;

use App\Models\PtsModel;
use App\Models\PesanModel;
use App\Models\BeritaModel;
use App\Models\MhsModel;

class PagesController extends BaseController
{
    public function beranda()
    {   
        //$ptsModel = new PtsModel();
        //$pts = $ptsModel->where('level', 'pts')->findAll();

        //$newsModel = new BeritaModel();
        //$news = $newsModel->findAll();

        $data = [
            'tittle' => 'List Kampus BMB'
        ];
        
        return view('pages/beranda', $data);
    }


    public function login()
    {
        return view('pages/login');
    }

    public function berita_kegiatan()
    {
        $newsModel = new BeritaModel();
        $news = $newsModel->findAll();

        $data = [
            'news' => $news
        ];

        return view('pages/berita-kegiatan', $data);
    }

    public function kampus_kerjasama()
    {
        $ptsModel = new PtsModel();
        $pts = $ptsModel->where('level', 'pts')->findAll();

        //$newsModel = new BeritaModel();
        //$news = $newsModel->findAll();

        $data = [
            'kampus' => $pts
        ];

        return view('pages/kampus-kerjasama', $data);
    }

    public function tata_cara()
    {
        return view('pages/tata-cara');
    }

    /*
    public function KirimPesan()
    {
        // dd($this->request);
        $validation = \Config\Services::validation();

        //validation
        if (!$this->validate([
            'email' => 'required',
            'pesan' => 'required'
        ])) {

            session()->setFlashdata('pesan', 'Pesan gagal dikirim!');

            return redirect()->back()->withInput()->with('validation', $validation);
        }

        $pesanModel = new PesanModel();

        $pesanModel->save([
            'email' => $this->request->getVar('email'),
            'pesan' => $this->request->getVar('pesan'),
        ]);

        session()->setFlashdata('pesan', 'Pesan Berhasil dikirim!');

        return redirect()->back();
    }
    */

    public function detail_kampus($slug)
    {

        $kampusModel = new PtsModel();
        $kampus = $kampusModel->where('slug', $slug)->get()->getResultArray();

        $mhsModel = new MhsModel();
        $mhs = $mhsModel->where('slug', $slug)->get()->getResultArray();

        //$newsModel = new BeritaModel();
        //$news = $newsModel->findAll();

        $data = [
            'mhs' => $mhs,
            'pts' => $kampus
        ];

        return view('pages/detail-kampus', $data);
    }

    public function detail_berita($slug)
    {

        $beritaModel = new BeritaModel();
        $berita = $beritaModel->where('slug', $slug)->get()->getResultArray();

        //$newsModel = new BeritaModel();
        //$news = $newsModel->findAll();

        $data = [
            'berita' => $berita
        ];

        return view('pages/detail-berita', $data);
    }
    
    //--------------------------------------------------------------------
    public function loginPOST()
    {
        $pts = new PtsModel();
        
        $pass = $this->request->getVar('password');
        
        $cek = $pts->select('id, username, password, nama, jenis, slug, level')->where([
            'username' => $this->request->getVar('username')
        ])->get()->getResultArray();

        //password_verify($pass, $cek[0]['password'])
        
        if (count($cek) == 0) {
            session()->setFlashdata('pesan', 'Username Anda Salah!');

            return redirect()->back();
        } elseif(password_verify($pass, $cek[0]['password'])) {
            $dataSession = [
                'id' => $cek[0]['id'],
                'nama_pts' => $cek[0]['nama'],
                'slug' => $cek[0]['slug'],
                'password' => $cek[0]['password'],
                'jenis_pts' => $cek[0]['jenis'],
                'level' => $cek[0]['level']
            ];
            session()->set($dataSession);

            if (session()->get('level') == "pts") {
                return redirect()->to('dashboard');
            } elseif (session()->get('level') == "admin") {
                return redirect()->to('dashboard-admin');
            }
            

            //return redirect()->to('dashboard');
            // if ($dataSession->get()->getResultArray() == 'pts') {
            //     return redirect()->to('dashboard');
            // }
        } 
        else {
            session()->setFlashdata('pesan', 'Password Anda Salah!');

            return redirect()->back();
        }
    }

    public function logout() {
        
        session()->destroy();

        return redirect()->to('/');
    }
}