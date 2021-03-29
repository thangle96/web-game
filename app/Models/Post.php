<?php

namespace App\Models;

use App\Library\Database;

class Post extends Database
{
    private $table = null;
    public function __construct() 
    {
       parent::__construct() ;
       $this -> table = $this ->TableName ('post');
    }
    public function post_home($args, $limit = 4)
    {
        $strIn = implode(",", $args);
        $sql ="SELECT * FROM $this->table WHERE status='1' AND topid IN ($strIn) LIMIT  $limit";
        return $this->getList($sql);
    }
    public function post_listcatid($args ,$ofset=0,$limit )
    {
        $strIn = implode(",", $args);
        $sql ="SELECT * FROM $this->table WHERE status='1' AND topid IN ($strIn) ORDER BY created_at DESC LIMIT 
        $ofset,$limit";
        return $this->getList($sql);
    }

    public function post_listcatid_count($args)
    {
        $strIn = implode(",", $args);
        $sql ="SELECT * FROM $this->table WHERE status='1' AND topid IN ($strIn) ";
        return count($this->getList($sql));
    }

    public function post_all($ofset=0,$limit )
    {

        $sql ="SELECT * FROM $this->table WHERE status='1' ORDER BY created_at DESC LIMIT 
        $ofset,$limit";
        return $this->getList($sql);
    }

    public function post_all_count()
    {
        $sql ="SELECT * FROM $this->table WHERE status='1' ";
        return count($this->getList($sql));
    }


    //quản trị
    public function post_admin_index()
    {
        $sql = "SELECT * FROM $this->table where status != '0'";
        return $this->getList($sql);
    }

    public function post_insert($data){
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

    public function post_admin_trash()
    {
        $sql = "SELECT * FROM $this->table where status = '0'";
        return $this->getList($sql);
    }
    public function post_rowid($id){
        $sql = "SELECT * FROM $this->table WHERE id = '$id'";
        return $this->getRow($sql);
    }
    public function post_update($date, $id){
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
    public function post_delete($id){
        $sql = "DELETE * FROM $this->table WHERE id = '$id'";
        $this->setQuery($sql);
    }
}