<?php 
namespace App\Models;

use CodeIgniter\Model;

class Block_Model extends Model {

    protected $table      = 'block_list';
    protected $primaryKey = 'block_fid';

    protected $returnType = 'object'; 


}