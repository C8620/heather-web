<?php
    $server="sql149.main-hosting.eu";
    $db_username="u102579217_oathh";
    $db_password="N9YqxqoLO8C4pJsptq";

    $con = mysql_connect($server,$db_username,$db_password);
    if(!$con){
        die("can't connect".mysql_error());
    }
    mysql_select_db('u102579217_oathh',$con);
?>