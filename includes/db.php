<?php 

/*$db['db_host'] = "localhost";
$db['db_user'] = "root";
$db['db_pass'] = "";
$db['db_name'] = "cms";

foreach($db as $key => $value) {
    define(strtoupper($key), $value);
}*/


//CONNECTING TO DB
$connection = mysqli_connect('localhost','root','','cms');

/*if ($connection) {
    echo "We are connected";
}*/

?>