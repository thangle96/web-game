<?php 
namespace App\Models;

use App\Library\Database;

class Menu extends Database
{
    private $table = null;
    public function __construct() {
        parent::__construct();
        $this->table = $this->TableName('menu');
    }
    public function menu_parentid($parentid)
    {
        $sql = "SELECT * FROM $this->table WHERE status = '1' AND parentid = '$parentid'";
        return $this->getList($sql);
    }
    public function menu_trash()
    {
        $sql = "SELECT * FROM $this->table WHERE status = '0'";
        return $this->getList($sql);
    }

     //quản trị
     public function menu_admin_index()
     {
         $sql = "SELECT * FROM $this->table where status != '0'";
         return $this->getList($sql);
     }
 
     public function menu_insert($data){
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
 
     public function menu_admin_trash()
     {
         $sql = "SELECT * FROM $this->table where status = '0'";
         return $this->getList($sql);
     }
     public function menu_rowid($id){
         $sql = "SELECT * FROM $this->table WHERE id = '$id'";
         return $this->getRow($sql);
     }
     public function menu_update($date, $id){
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
     public function menu_delete($id){
         $sql = "DELETE FROM $this->table WHERE id = '$id'";
         $this->setQuery($sql);
     }
}
?>