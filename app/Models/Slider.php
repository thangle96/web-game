<?php 
namespace App\Models;

use App\Library\Database;

class Slider extends Database
{
    private $table = null;
    public function __construct() {
        parent::__construct();
        $this->table = $this->TableName('slider');
    }
    public function slider_position($post)
    {
        $sql = "SELECT * FROM $this->table WHERE status = '1' AND position = '".$post."'";
        return $this->getList($sql);
    }
    public function slider_list()
    {
        $sql = "SELECT * FROM $this->table WHERE status != '0'";
        return $this->getList($sql);
    }
    public function slider_trash()
    {
        $sql = "SELECT * FROM $this->table WHERE status = '0'";
        return $this->getList($sql);
    }
}
?>