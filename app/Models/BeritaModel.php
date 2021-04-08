<?php

namespace App\Models;

//use CodeIgniter\Models\MhsModel;
use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'berita';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pts', 'judul', 'slug', 'pts', 'deskripsi', 'foto'];
}