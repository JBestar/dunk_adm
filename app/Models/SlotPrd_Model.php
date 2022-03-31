<?php 
namespace App\Models;

use CodeIgniter\Model;

class SlotPrd_Model extends Model {

    protected $table      = 'slot_prd';
    protected $primaryKey = 'id';

    protected $returnType = 'object'; 


    public function gets($cat){
        return $this->where('cat', $cat)
                    ->orderBy('id', 'ASC')
                    ->findAll(); 
    }


}