<?php

namespace App\Models;

use CodeIgniter\Model;

class MahasiswaModel extends Model
{
    protected $table            = 'mahasiswa';
    
    protected $primaryKey       = 'id';
    
    protected $useAutoIncrement = true;
    
    protected $returnType       = 'object';
    
    protected $useSoftDeletes   = false;
    
    protected $allowedFields    = ['nim', 'nama', 'jurusan', 'angkatan'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
