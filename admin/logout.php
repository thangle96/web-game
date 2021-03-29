<?php
session_start();
require_once('../app/Helpers/functions.php');
unset ($_SESSION["useradmin"]);
unset ($_SESSION["id"]);
unset ($_SESSION["fullname"]);
unset ($_SESSION["img"]);
redirect("login.php");