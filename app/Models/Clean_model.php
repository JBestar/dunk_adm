<?php
namespace App\Models;
use CodeIgniter\Model;

class Clean_model extends Model {
	
    function __construct()
    {
        parent::__construct();

    }


    //디비정리
    function cleanDb(){
        $tmNow = time();
        $strDate = date('Y-m-d', strtotime("-2 months", $tmNow));
        
        $strSql = " DELETE FROM bet_casino WHERE bet_time < '".$strDate."' ";
        $this -> db -> query($strSql);
        
        $strSql = " DELETE FROM bet_powerball WHERE bet_time < '".$strDate."' ";
        $this -> db -> query($strSql);
        
        $strSql = " DELETE FROM bet_powerladder WHERE bet_time < '".$strDate."' ";
        $this -> db -> query($strSql);
        
        $strSql = " DELETE FROM bet_kenoladder WHERE bet_time < '".$strDate."' ";
        $this -> db -> query($strSql);
        
        $strSql = " DELETE FROM board_notice WHERE notice_time_create < '".$strDate."'  AND notice_type != '1' ";
        $this -> db -> query($strSql);
        

        $strSql = " DELETE FROM member_charge WHERE charge_time_require < '".$strDate."' ";
        $this -> db -> query($strSql);
        
        $strSql = " DELETE FROM member_exchange WHERE exchange_time_require < '".$strDate."' ";
        $this -> db -> query($strSql);
        
        $strSql = " DELETE FROM money_history WHERE money_update_time < '".$strDate."' ";
        $this -> db -> query($strSql);
        
        $strSql = " DELETE FROM transfer_history WHERE money_update_time < '".$strDate."' ";
        $this -> db -> query($strSql);
                
        $strSql = " DELETE FROM round_powerball WHERE round_date < '".$strDate."' ";
        $this -> db -> query($strSql);

        $strSql = " DELETE FROM round_powerladder WHERE round_date < '".$strDate."' ";
        $this -> db -> query($strSql);

        $strSql = " DELETE FROM round_kenoladder WHERE round_date < '".$strDate."' ";
        $this -> db -> query($strSql);

        $this->builder->truncate("sessions");
        
        return 1;
    }
    //디비초기화
    function initDb(){


        $this->builder->truncate("bet_casino");
        $this->builder->truncate("bet_powerball");
        $this->builder->truncate("bet_powerladder");
        $this->builder->truncate("bet_kenoladder");
        $this->builder->truncate("board_notice");
        $this->builder->truncate("member_charge");
        $this->builder->truncate("member_exchange");
        $this->builder->truncate("money_history");
        $this->builder->truncate("transfer_history");
        $this->builder->truncate("sessions");
        return 1;
    }

}