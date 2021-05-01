<?php

namespace App\Models;

use App\Library\Database;
use FilterIterator;

class Users extends Database
{
  private $table = null;
  public function __construct()
  {
    parent::__construct();
    $this->table = $this->TableName('user');
  }
  public function user_row($username)
  {
    if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
      $sql = "SELECT * FROM $this->table WHERE email = '$username' AND access = '1'";
    } else {
      $sql = "SELECT * FROM $this->table WHERE username = '$username' AND access = '1' ";
    }
    return $this->getRow($sql);
  }

  public function check()
  {
    $sql = "SELECT * FROM $this->table ";
    return $this->getRow($sql);
  }

  public function user_detail($id)
  {
    $sql = "SELECT * FROM $this->table WHERE id = $id";
    return $this->getRow($sql);
  }
  public function user_update($date, $id)
  {
    $strset = '';
    foreach ($date as $f => $v) {
      $strset .= $f . "='$v', ";
    }
    $strset = rtrim($strset);
    $strset = rtrim($strset, ',');
    $sql = "UPDATE $this->table SET $strset WHERE id = '$id'";
    $this->setQuery($sql);
  }

  public function card_update_dev($id)
  {
    $sql = "UPDATE  $this->table SET access = 2, money = (money - 500000) WHERE id = '" . $id . "'";
    $this->setQuery($sql);
  }

  public function user_insert($data)
  {
    $strf = "";
    $strv = "";
    foreach ($data as $f => $v) {
      $strf .= $f . ", ";
      $strv .= "'" . $v . "', ";
    }
    $strf = rtrim($strf);
    $strf = rtrim($strf, ',');
    $strv = rtrim($strv);
    $strv = rtrim($strv, ',');
    $sql = "INSERT INTO $this->table($strf) VALUES ($strv)";
    $this->setQuery($sql);
  }
}
