<?php

namespace App\Library;

use App\Library\Config;

class Database extends Config
{
    private $conn="";
    public function __construct() 
    {
      $this->conn = new \mysqli($this->host, $this->user,
      $this->pass, $this->db);
    }
    public function TableName($name)
    {
        return $this->tt.$name;
    }
       // trả về 1 mẫu tin
    protected function getRow($sql)
    {
        $result = $this->conn->query($sql);
        $row = $result ->fetch_assoc(); //Khóa là tên trường
        return $row; 
    }
    // trả về nhiều mẫu tin
    protected function getList($sql)
    {
        $result =  $this->conn->query($sql);
        $data = array();
        while ($row =$result->fetch_assoc())
        {
            $data[]=$row;
        }
        return $data;
    }
    protected function setQuery($sql)
    {
    $this->conn->query($sql);
    }
}
