<?php

namespace App\Models;

//use CodeIgniter\Models\MhsModel;
use CodeIgniter\Model;

class MhsModel extends Model
{
    protected $table = 'mhs';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pts', 'nama', 'nim', 'jurusan', 'alamat', 'jk', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'email', 'foto', 'pts', 'slug'];
}