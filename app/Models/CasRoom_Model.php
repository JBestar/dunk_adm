<?php 
namespace App\Models;

use CodeIgniter\Model;

class CasRoom_Model extends Model {

    protected $table      = 'casino_room';
    protected $primaryKey = 'fid';
    protected $allowedFields = ['tid', 'name', 'nid', 'open', 'history', 'dealer', 'updated']; 
    protected $getFields = ['fid', 'tid', 'name', 'nid', 'open', 'history', 'dealer', 'updated']; 

    protected $returnType = 'object'; 
    
    public function gets(){
        
        $where = "open = '".STATE_ACTIVE."' ";
        
        return $this->select($this->getFields)
                    ->where($where)
                    ->orderBy('name', 'ASC')
                    ->findAll(); 
    }

}