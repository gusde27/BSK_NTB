<?php

namespace App\Models;

//use CodeIgniter\Models\MhsModel;
use CodeIgniter\Model;

class PrestasiModel extends Model
{
    protected $table = 'prestasi';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pts', 'id_mhs', 'nama_p', 'jenis', 'tingkat', 'file'];
}