<?php 
namespace App\Models;

use App\Library\Database;

class Card extends Database
{
    private $table = null;
    public function __construct() {
        parent::__construct();
        $this->table = $this->TableName('card');
    }
    public function card_insert($data){
        $strf = '';
        $strv = '';
        foreach($data as $f=>$v)
        {
            $strf .=$f.", " ;
            $strv .="'$v', " ;
        }
        $strf = rtrim($strf);
        $strf = rtrim($strf, ',');
        $strv = rtrim($strv);
        $strv = rtrim($strv, ',');
        $sql = "INSERT INTO $this->table($strf) VALUES ($strv)";
        echo $sql;
        $this->setQuery($sql);
    }
    public function card_admin_trash()
    {
        $sql = "SELECT * FROM $this->table where status = '0'";
        return $this->getList($sql);
    }
    public function card_admin_index()
    {
        $sql = "SELECT * FROM $this->table where status != 0 ORDER by id ASC";
        return $this->getList($sql);
    }

    public function card_admin_update($date, $id){
        $strset = '';
        foreach($date as $f=>$v)
        {
            $strset .=$f."='$v', " ;
        }
        $strset = rtrim($strset);
        $strset = rtrim($strset, ',');
        $sql = "UPDATE $this->table SET $strset WHERE id = '$id'";
        $this->setQuery($sql);

    }
    public function card_delete($id){
        $sql = "DELETE FROM $this->table WHERE id = '$id'";
        $this->setQuery($sql);
    }

    public function card_rowid($id){
        $sql = "SELECT * FROM $this->table WHERE id = '$id'";
        return $this->getRow($sql);
    }
    public function get_card($seri)
    {
        $sql = "SELECT * FROM $this->table WHERE seri = '".$seri."'";
        return $this->getRow($sql);
    }
    public function card_update($seri)
    {
        $sql = "UPDATE  $this->table SET status = 2 WHERE seri = '".$seri."'";
        $this->setQuery($sql);
    }
    public function generateCode($len){
        $code          = "";
        $characters       = "abcdefghijklmnopqrstuvwxyz0123456789";
        $charactersLength = strlen($characters);
        for ($i = 0; $i < $len; $i++) {
             $code .= $characters[rand(0,$charactersLength-1)];
        }
        return $code;
    }
}
?>