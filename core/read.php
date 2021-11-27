<?php

    include_once('../includes/config.php');

    $pdo = new Database();
    $pdo->getConnection();

    echo "<pre>";print_r($pdo->read());

?>