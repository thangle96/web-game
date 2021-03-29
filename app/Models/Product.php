<?php

namespace App\Models;

use App\Library\Database;

class Product extends Database
{
    private $table = null;

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->TableName('product');
    }

    public function product_home($arr, $limit = 4)
    {
        $str = implode(',', $arr);
        $sql = "SELECT * FROM $this->table WHERE status = '1' AND catid in ($str) LIMIT $limit ";
        return $this->getList($sql);
    }

    public function product_listcatid($arr, $offset = 0, $limit)
    {
        $str = implode(',', $arr);
        $sql = "SELECT * FROM $this->table WHERE status = '1' AND catid in ($str) ORDER BY created_at DESC LIMIT  $offset, $limit";
        return $this->getList($sql);
    }

    public function product_listcatid_count($arr)
    {
        $str = implode(',', $arr);
        $sql = "SELECT * FROM $this->table WHERE status = '1' AND catid in ($str)";
        return count($this->getList($sql));
    }

    public function product_all($offset = 0, $limit)
    {
        $sql = "SELECT * FROM $this->table WHERE status = '1' ORDER BY created_at DESC LIMIT  $offset, $limit";
        return $this->getList($sql);
    }

    public function product_detail($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = $id";
        return $this->getList($sql);
    }

    public function product_all_count()
    {
        $sql = "SELECT * FROM $this->table WHERE status = '1'";
        return count($this->getList($sql));
    }

    public function product_admin_index()
    {
        $category_table = $this->TableName('category');
        $sql = "SELECT $this->table.*, $category_table.name AS catname FROM $this->table 
        INNER JOIN $category_table on $this->table.catid=$category_table.id
        WHERE $this->table.status != '0'";
        //echo $sql;
        return $this->getList($sql);
    }

    public function product_admin_trash()
    {
        $category_table = $this->TableName('category');
        $sql = "SELECT $this->table.*, $category_table.name AS catname FROM $this->table 
        INNER JOIN $category_table on $this->table.catid=$category_table.id
        WHERE $this->table.status = '0'";
        //echo $sql;
        return $this->getList($sql);
    }

    public function product_rowid($id)
    {
        $sql = "SELECT * FROM $this->table WHERE id = '$id'";
        return $this->getRow($sql);
    }

    public function product_insert($data)
    {
        $strf = '';
        $strv = '';
        foreach ($data as $f => $v) {
            $strf .= $f . ", ";
            $strv .= "'$v', ";
        }
        $strf = rtrim($strf);
        $strf = rtrim($strf, ',');
        $strv = rtrim($strv);
        $strv = rtrim($strv, ',');
        $sql = "INSERT INTO $this->table($strf) VALUES ($strv)";
        $this->setQuery($sql);

    }

    public function product_update($date, $id)
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

    public function product_delete($id)
    {
        $sql = "DELETE FROM $this->table WHERE id = '$id'";
        $this->setQuery($sql);
    }

    public function product_cat_name($id)
    {
        $sql = "SELECT `nts_category`.`name` 
                FROM `nts_category` 
                JOIN `nts_product` 
                ON `nts_product`.`catid` = `nts_category`.`id` 
                WHERE `nts_product`.`id` = $id";
        return $this->getRow($sql);

    }

    public function product_similiar($id)
    {
        $sql = "SELECT * FROM $this->table WHERE `catid` = (SELECT `catid` FROM $this->table WHERE `id` = $id) LIMIT 4";
        return $this->getList($sql);
    }
    function product_row($args = [])
    {
        $strWhere = "";
        if ($args != null) {
            //Thiết lập điều kiện truy vấn theo trạng thái
            if (array_key_exists('status', $args)) {
                $strWhere .= "status='" . $args['status'] . "'";
            }

            //Truy vấn dựa vào id
            if (array_key_exists('id', $args)) {
                if ($strWhere == "") {
                    $strWhere .= "id='" . $args['id'] . "'";
                } else {
                    $strWhere .= " AND id='" . $args['id'] . "'";
                }
            }
            //Truy vấn dựa vào id
            if (array_key_exists('catid', $args)) {
                if ($strWhere == "") {
                    $strWhere .= "catid='" . $args['catid'] . "'";
                } else {
                    $strWhere .= " AND catid='" . $args['catid'] . "'";
                }
            }
            //Truy vấn dựa vào islugd
            if (array_key_exists('slug', $args)) {
                if ($strWhere == "") {
                    $strWhere .= "slug='" . $args['slug'] . "'";
                } else {
                    $strWhere .= " AND slug='" . $args['slug'] . "'";
                }
            }
        }
        //Kiểm tra có điều kiện hay không
        if ($strWhere != "") {
            $strWhere = " WHERE $strWhere";
        }
        $sql = "SELECT * FROM $this->table $strWhere LIMIT 1";
        return $this->getRow($sql);
    }

}

?>