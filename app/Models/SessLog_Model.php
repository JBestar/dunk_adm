<?php 
namespace App\Models;

use CodeIgniter\Model;

class SessLog_Model extends Model {

    protected $table      = 'sess_log';
    protected $primaryKey = 'log_fid';

    protected $returnType = 'object'; 

    protected $allowedFields = ['log_mb_uid', 'log_ip', 'log_time']; 

    public function add($userData){
        
        $data = [
            'log_mb_uid' => $userData['mb_uid'],
            'log_ip' => $userData['mb_ip_last'],
            'log_time' => date("Y-m-d H:i:s"),
        ];
        
        return $this->insert($data);
    }
}