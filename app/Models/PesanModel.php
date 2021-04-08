<?php

namespace App\Models;

//use CodeIgniter\Models\MhsModel;
use CodeIgniter\Model;

class PesanModel extends Model
{
    protected $table = 'pesan';
    protected $useTimestamps = true;
    protected $allowedFields = ['email', 'pesan'];
}