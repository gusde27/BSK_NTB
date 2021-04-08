<?php

namespace App\Models;

//use CodeIgniter\Models\MhsModel;
use CodeIgniter\Model;

class PtsModel extends Model
{
    protected $table = 'pts';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'nama', 'slug', 'jenis', 'deskripsi', 'alamat', 'foto', 'link', 'level'];
}