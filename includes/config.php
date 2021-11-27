<?php
    // $db_user = 'root';
    // $db_password = '';
    // $db_name = 'users_api';

    $db_user = 'mP0ewlSNqi';
    $db_password = 'KoLhWQe5cI';
    $db_name = 'mP0ewlSNqi';

    $db = new PDO('mysql:host=remotemysql.com;dbname='.$db_name.';charset=utf8',$db_user,$db_password);

    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
    $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY,true);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $con=mysqli_connect("remotemysql.com", $db_user, $db_password, $db_name);
    if(mysqli_connect_errno()){
    echo "Connection Fail".mysqli_connect_error();
}
?>