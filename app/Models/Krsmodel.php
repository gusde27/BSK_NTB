<?php

namespace App\Models;

//use CodeIgniter\Models\MhsModel;
use CodeIgniter\Model;

class KrsModel extends Model
{
    protected $table = 'krs';
    protected $useTimestamps = true;
    protected $allowedFields = ['id_pts', 'id_mhs', 'semester', 'file'];
}