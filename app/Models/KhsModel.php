<?php

namespace App\Models;

//use CodeIgniter\Models\MhsModel;
use CodeIgniter\Model;

class KhsModel extends Model
{
    protected $table = 'khs';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pts', 'id_mhs', 'semester', 'ip', 'file'];
}