<?php

namespace App\Library;

class Route
{
    public function __construct($page = null)
    {
        $pathView = '';
        if ($page == null) {
            $pathView = 'views/frontend/';
            if (!isset($_REQUEST['option'])) {
                $pathView .= "home.php";
            } else {
                $pathView .= ($_REQUEST['option']);
                if (isset($_REQUEST['id'])) {
                    $pathView .= "-details.php";
                } else {
                    if (isset($_REQUEST['cat'])) {
                        $pathView .= "-category.php";
                    } else {
                        $pathView .= ".php";
                    }
                }
            }
        } else {
            $pathView = '../views/backend/';
            if (isset($_REQUEST['option'])) {
                $pathView .= $_REQUEST['option'] . '/';
                if (isset($_REQUEST['cat'])) {
                    $pathView .= $_REQUEST['cat'] . ".php";
                } else {
                    $pathView .="index.php";
                }
            } else {
                $pathView .= "dashboard/index.php";
            }
        }
        require_once($pathView);
    }
}
