<?php

namespace App\Models;

use App\Library\Database;

class Contact extends Database
{
    private $table = null;
    public function __construct() 
    {
       parent::__construct() ;
       $this -> table = $this ->TableName ('contact');
    }

    public function contact_insert($data)
    {
        $strf = "";
        $strv = "";
        foreach ($data as $f => $v){
            $strf .=$f . ", ";
            $strv .="'" . $v . "', ";
        }
        $strf = rtrim($strf);
        $strf = rtrim($strf,',');
        $strv = rtrim($strv);
        $strv = rtrim($strv,',');
        $sql = "INSERT INTO $this->table($strf) VALUES ($strv)";
        $this->setQuery($sql);
    }

    public function contact_admin_index()
    {
        $sql = "SELECT * FROM $this->table where status != 0 ORDER by id ASC";
        return $this->getList($sql);
    }


    public function contact_admin_trash()
    {
        $sql = "SELECT * FROM $this->table where status = '0'";
        return $this->getList($sql);
    }
    public function contact_rowid($id){
        $sql = "SELECT * FROM $this->table WHERE id = '$id'";
        return $this->getRow($sql);
    }
    public function contact_update($date, $id){
        $strset = '';
        foreach($date as $f=>$v)
        {
            $strset .=$f."='$v', " ;
        }
        $strset = rtrim($strset);
        $strset = rtrim($strset, ',');
        $sql = "UPDATE $this->table SET $strset WHERE id = '$id'";
        echo $sql;
        $this->setQuery($sql);

    }
    public function contact_delete($id){
        $sql = "DELETE FROM $this->table WHERE id = '$id'";
        $this->setQuery($sql);
    }
    
    
}