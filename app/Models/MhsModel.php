<?php
namespace App\Models;

use CodeIgniter\Model;

class MhsModel extends Model
{
    protected $table = 'mhs';
    protected $primaryKey = 'nim';
    protected $allowedFields =['nim','nama_mhs','angkatan','idprodi','password'];
}